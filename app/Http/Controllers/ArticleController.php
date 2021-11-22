<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use App\Mail\revisorFormMail;
use App\Models\AnnouncementImage;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
// use App\Jobs\GoogleVisionSafeSearchImage;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ArticleRequest;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newArticleView(Request $request)
    {
        $categories = Category::all();
        $titlePage = "Crea il tuo annuncio!";

		// creare una variabile che contiene il secret
		$uniqueSecret = request()->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));

		

		// passare nel compact il valore del secret
        return view('newAnnuncio', compact('titlePage', 'categories', 'uniqueSecret'));
    }

    public function newArticleSubmit(ArticleRequest $request)
    {
        $user = Auth::user();
        $article = Article::create(
            [
                'title' => $request->input('title'),
                'author' => Auth::user()->name,
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category'),
                // 'img' => $request->file('img')->store('/public/img'),
            ]
        );

		// ottengo il secret dalla request
		$uniqueSecret = $request->input('uniqueSecret');
		// ottengo le immagini salvate nella cartella temporanea chiamata col nome del secret
		$images = session()->get("images.{$uniqueSecret}", []);
		$removedImages = session()->get("removedImages.{$uniqueSecret}", []);

		$images = array_diff($images, $removedImages);

		foreach ($images as $image) {
            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName = "public/article/{$article->id}/{$fileName}";
            Storage::move($image, $newFileName);




            $i->file = $newFileName;
            $i->article_id = $article->id;
            $i->save();


            GoogleVisionSafeSearchImage::withChain([

                new GoogleVisionSafeSearchImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 300, 150,),
                new ResizeImage($i->file, 150, 150,),
                new ResizeImage($i->file, 400, 300,),

            ])->dispatch($i->id);
        }
		// elimina le immagini temporanee
		File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route("homepage"))->with('message', 'Il tuo articolo è stato pubblicato con successo');
    }

	// upload delle immagini con dropzone.js
	public function uploadImage(Request $request) {
		$uniqueSecret = $request->input('uniqueSecret');
		$filename = $request->file('file')->store("public/temp/{$uniqueSecret}");

		dispatch(new ResizeImage($filename, 120, 120));

		session()->push("images.{$uniqueSecret}", $filename);

		return response()->json(
			[
				'id' => $filename,
			]
		);
	}

	public function removeImage(Request $request) {
		$uniqueSecret = $request->input('uniqueSecret');
		$filename = $request->input('id');
		session()->push("removedImages.{$uniqueSecret}", $filename);

		Storage::delete($filename);
		return response()->json('ok');

	}

	public function getImages($uniqueSecret) {
		$images = session()->get("images.{$uniqueSecret}", []);
		$removedImages = session()->get("removedImages.{$uniqueSecret}", []);

		$images = array_diff($images, $removedImages);

		$data = [];
		
		foreach ($images as $image) {
			$data[] = [
				'id' => $image,
				'src' => AnnouncementImage::getUrlByFilePath($image, 120, 120),
			];
		}

		return response()->json($data);
	}

    public function revisorSignUp()
    {
        return view('revisorSignUp');
    }

    public function revisorSignUpSubmit(Request $request)
    {

        $email = $request->input('email');
        $user = $request->input('user');
        $description = $request->input('description');

        $userRequest = User::where('email', $email)
                            ->first();
        $userRequest->has_requested = true;
        $userRequest->save();

        $contact = compact('user', 'description');

        Mail::to($request->user())->send(new revisorFormMail($contact));

        return redirect(route('homepage'))->with('message', 'Grazie per averci contattato, sarai ricontattato al più PRESTO possibile');
    }
}
