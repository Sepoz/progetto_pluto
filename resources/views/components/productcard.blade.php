
<!-- <div class="card-box vh-100">
    <div class="card-thumbnail">
        <img src="{{ Storage::url($img) }}" class="img-fluid" alt="">
    </div>
    <h3 class="mt-3"><a href="#" class="mt-2 text-black">{{$title }}</a></h3>
    <p class="text-secondary card-text">{{$description }}. <br><i>Autore: {{ $author }} </i><br>Categoria: {{$category}}<br><i class="fs-3">€ {{$price}} </i><br> Pubblicato il: {{$date}} </p>
    <div class="text-center marg-btn">

      <a href="{{route('articleDetails', compact('title', 'id'))}}" class="button text-white">Dettagli</a>
    </div>
</div> -->

<div class="bbb_deals bg-white tessera">          
    <div class="bbb_deals_slider_container">
        <div class=" bbb_deals_item text-start">
          <div class="bbb_deals_image text-center"><img src="{{ $img }}" style="height: 150px;" style="width: 100px;" alt=""></div>
          <div class="bbb_deals_content">
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                  <div class="bbb_deals_item_category"><a href="#">{{__('ux.productcardAuthor')}} {{ $author }}</a></div>
                  
              </div>
              <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                  <div class="bbb_deals_item_name">{{$title }}<br>€ {{$price}}</div>
                  
              </div>
              <div class="available">
                <div class="available_bar"><span style="width:17%">{{$description }}.</span></div>
                  <div class="available_line d-flex flex-row justify-content-start">
                      <div class="available_title">{{__('ux.productcardCategory')}} {{$category}} <br>{{__('ux.productcardPublished')}} {{$date}}</div>
                      <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <div class="text-center mt-auto ">
      <a class="btn vitobtn btn-lg m-0 mt-4" href="{{route('articleDetails', compact('title', 'id'))}}">
        <span>{{__('ux.productcardDetails')}}</span>
      </a>
    </div>
</div>
