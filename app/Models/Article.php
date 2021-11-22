<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
	use Searchable;
    
    protected $fillable = [
		'id',
        'title',
        'author',
        'category_id',
		'price',
        'description',
        'img',
        // 'img2',
        // 'img3',
        // 'img4',
        // 'img5',
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

	public function images() {
		return $this->hasMany(AnnouncementImage::class);
	}

    static public function ToBeRevisionedCount()
    {
        return Article::where('is_accepted', null)->count();
    }
	// descrive quali campi del modello rendere ricercabili
	public function toSearchableArray()
    {
        $array = [
			'id' => $this->id,
			'title' => $this->title,
			'author' => $this->author,
			'description' => $this->description,
		];

        // Customize the data array...

        return $array;
    }
}
