<x-layout pageTitle="Annunci da revisionare">
    <div class="container min-vh-100">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="mt-5 mb-5
                 text-center">{{__('ux.revisorMainTitle')}}</h1>
            </div>
            @if ($articles)
                <div class=" col-10 border border-white">
                    <div class="row pt-3">
                        <div class="col-12">
                            <h2 class="">{{__('ux.revisorArticleNumber')}}{{ $articles->id }} - {{ $articles->title }}</h2>
                        </div>
                    </div>
                    @foreach ($articles->images as $image)
                        <div class="container">
                            <div class="row pt-3">
                                <div class="col-5">
                                    <img src="{{ $image->getUrl(300, 150) }}" alt="immagini prodotti">
                                </div>
                                <div class="col-5">
                                    <h4>{{__('ux.revisorFilter')}}</h4>
                                    <ul>
                                        <li>{{__('ux.revisorFilterAdults')}} {{ $image->adult }}</li>
                                        <li>{{__('ux.revisorFilterDeceptive')}} {{ $image->spoof }}</li>
                                        <li>{{__('ux.revisorFilterMedic')}} {{ $image->medical }}</li>
                                        <li>{{__('ux.revisorFilterViolence')}} {{ $image->violence }}</li>
                                        <li>{{__('ux.revisorFilterRacy')}} {{ $image->racy }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 d-flex vw-100 d-flex flex-column">
                                    <h4>{{__('ux.revisorFilterLabel')}}</h4>
                                    <p class="d-flex">{{ $image->labels }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-3 mb-3 border border-white"></div>
                    <h3>{{__('ux.revisorAuthor')}} {{ $articles->author }}</h3>
                    <h4>{{__('ux.revisorCategory')}} {{ $articles->category->categoryName }}</h4>
                    <h5>{{__('ux.revisorPubblication')}} {{ date('d-m-Y', strtotime($articles->created_at)) }}</h5>
                    <p>{{ $articles->description }}</p>

                    <div class="row mt-5 mb-3 text-center justify-content-center">
                        <div class="col-md-4 ">
                            <form action="{{ route('revisorReject', $articles->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">{{__('ux.revisorRefuse')}}</button>
                            </form>
                        </div>
            @endif
            @if ($artCount > 0)
                <div class="col-md-4 d-flex justify-content-center">
                    <form action="{{ route('revisorUndo') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">{{__('ux.revisorUndo')}}</button>
                    </form>
                </div>
            @endif
            @if ($articles)
                <div class="col-md-4 ">
                    <form action="{{ route('revisorAccept', $articles->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">{{__('ux.revisorAccept')}}</button>
                    </form>
                </div>
        </div>
    </div>
@else
    <h2 class="text-success text-center mt-5">{{__('ux.revisorGoodJob')}}</h2>
    @endif
    </div>
    </div>
</x-layout>
