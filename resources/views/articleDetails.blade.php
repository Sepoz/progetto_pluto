<x-layout pageTitle="{{ $title }} - Dettagli">
<!-- container principale della pagina dentro x-layout  -->
<div class="container min-vh-100">
 <!-- container della prima parte contenuti  -->   
 <div class="container row justify-content-center sectionartpostnavbar ">  
 
 <div class="row sectionartdetails2 ">
      <!-- glide immagini articleDetail -->
    <div class="glide">
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides">
				@foreach ($articleDetail->images as $image)
					<li class="glide__slide">
						<img src="{{ $image->getUrl(300, 150) }}" alt="immagini prodotti">
					</li>
				@endforeach
			</ul>
		</div>
		<div data-glide-el="controls">
			<button data-glide-dir="<">{{__('ux.detailsBackward')}}</button>
			<button data-glide-dir=">">{{__('ux.detailsForward')}}</button>
		</div>
	</div>
 </div>
     <!-- informazioni dettaglio oggetto in vendita -->
    <div class= "col-3">
        <h4 class="card-title">{{__('ux.detailsTitle')}} {{ $articleDetail->title }}</h4>
        <h5 class="card-title">{{__('ux.detailsAuthor')}} {{ $articleDetail->author }}</h5>
        <h6 class="card-title">{{__('ux.detailsCategory')}} {{ $articleDetail->category->categoryName }}</h6>
        <h6 class="card-title">{{__('ux.detailsPrice')}} € {{ $articleDetail->price }}</h6>
        {{-- funzione di formattazione della data --}}
        <p>{{__('ux.detailsDate')}} {{ date('d-m-Y', strtotime($articleDetail->created_at)) }}</p>
        <p class="card-text">{{ $articleDetail->description }}</p>
    </div>
    
  </div>
 </div>
<!-- 
</div>
</div>
</div>
</div>

<div class="sectionartfooter">
</div>

 <!-- Vecchio Footer Antonella cambiato-->
 <!-- <footer class="text-center text-lg-start btn-main  text-muted">     
 <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="f_widget company_widget wow fadeInLeft">
                        <h3>Rimani Aggiornato!</h3>
                        <p>Non perdere nessun annuncio</p>

                        <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                        <button class="btn btn-footer btn_get btn_get_two" type="submit">Iscriviti Alla
                            Newsletter</button>
                        <p class="mchimp-errmessage" style="display: none;"></p>
                        <p class="mchimp-sucmessage" style="display: none;"></p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div>
                        <h3>Aiuto</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Termini e condizoni</a></li>
                            <li><a href="#">Documentazione</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 justify-content-end">

                    <h3>Seguici Su!</h3>

                    <div class="col-lg-8 col-md-6 justify-content-end">
                        <h3 class="f-title f_600 t_color f_size_18 mt-3">Dove Siamo</h3>
                        <p>Via Sparano 5,Bari 0805487593</p>
                    </div>
                </div>
            </div>
        </div> -->

        

        </footer>
<!-- fine del container principale della pagina dentro x-layout -->

       
    
</x-layout>
