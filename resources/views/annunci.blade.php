<x-layout pageTitle="{{ $titlePage }}">


    <div class="container-fluid dist-container min-vh-100">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="categorie-border-box px-2">
                    <div class="text-start mt-3">
                        <form action="{{ route('search') }}" method="get">
                            <input class="form-control mt-3" type="text" name="q" value="{{ old('q') }}"
                                placeholder="Cerca...">
                            <button type="submit" class="btn btn-secondary mt-1">{{__('ux.annunciSearch')}}</button>
                        </form>
                    </div>
                    <div class="dropdown my-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('ux.annunciCategories')}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('articlesByCategory', [$category->categoryName, $category->id]) }}">
                                        {{ $category->categoryName }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row mx-3">
                    @foreach ($articles as $article)
                        <div class="col-12 col-md-6 my-3">
                            <x-productcard id="{{ $article->id }}" img="{{ $article->images[0]->getUrl(300, 150) }}"
                                title="{{ $article->title }}" author="{{ $article->author }}"
                                category="{{ $article->category->categoryName }}" price="{{ $article->price }}"
                                description="{{ $article->description }}"
                                date="{{ date('d-m-Y', strtotime($article->created_at)) }}" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>

</x-layout>
