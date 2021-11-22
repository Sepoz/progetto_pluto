 <div class="col-12 col-md-4">
    <div class="card mx-3 my-3" style="width: 18rem;">
        <img src="{{$img }}" alt="immagine articolo">
        <div class="card-body">
            <h4 class="card-title">{{$title }}</h4>
            <h5 class="card-title">Autore: {{ $author }}</h5>
            <h6 class="card-title">Categoria: {{$category}}</h6>
            <h6 class="card-title"> € {{$price}}</h6>
            {{-- funzione di formattazione della data --}}
            <p>Data pubblicazione: {{$date}}</p>
            <p class="card-text">{{$description }}</p>
            <a class="btn btn-primary" href="{{route('articleDetails', compact('title', 'id'))}}">Visualizza Dettagli</a>
            </form>
        </div>
    </div>
</div>