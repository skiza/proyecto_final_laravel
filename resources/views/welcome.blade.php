@extends('www.layouts.default')

@section('title','Fit&Up')

@section('style_links')
<link rel="stylesheet" href="{{ asset('vendor/owl/css/owl.carousel.min.css') }}">
@endsection

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 main__title">
            <h1>{{ trans('web.welcome') }}</br>Fit&Up</h1>
            Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. 
            Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, 
            sunt in culpa qui officia deserunt mollit anim id est laborum.</br></br>
           
         </div>
    </div>
        <!--<section class="lightgrey_bg" id="features">-->
        <!--    <div class="container">-->
        <!--        <div class="main_title mt_wave a_center">-->
        <!--            <h2>How to use</h2>-->
        <!--        </div>-->

        <!--        <div class="row">-->
        <!--            <div class="col-md-7">-->
        <!--                <div data-slider-id="features" id="features_slider" class="owl-carousel">-->
        <!--                    <div><img src="img/1.jpg" class="img-responsive" alt="Image"></div>-->
        <!--                    <div><img src="img/2.jpg" class="img-responsive" alt="Image"></div>-->
        <!--                    <div><img src="img/3.jpg" class="img-responsive" alt="Image"></div>-->
        <!--                    <div><img src="img/4.jpg" class="img-responsive" alt="Image"></div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-5">-->
        <!--                <div class="owl-thumbs" data-slider-id="features">-->
        <!--                    <div class="owl-thumb-item">-->
        <!--                        <span class="media-left"><i class="flaticon-food"></i></span>-->
        <!--                        <div class="media-body">-->
        <!--                            <h5>Step 1</h5>-->
        <!--                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="owl-thumb-item">-->
        <!--                        <span class="media-left"><i class="flaticon-person"></i></span>-->
        <!--                        <div class="media-body">-->
        <!--                            <h5>Step 2</h5>-->
        <!--                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="owl-thumb-item">-->
        <!--                        <span class="media-left"><i class="flaticon-business"></i></span>-->
        <!--                        <div class="media-body">-->
        <!--                            <h5>Step 3</h5>-->
        <!--                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="owl-thumb-item">-->
        <!--                        <span class="media-left"><i class="flaticon-beach"></i></span>-->
        <!--                        <div class="media-body">-->
        <!--                            <h5>Step 4</h5>-->
        <!--                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section> -->
</div>
@endsection

@section('scripts')
   <script type="text/javascript" src="{{ asset('vendor/owl/js/owl.carousel.thumbs.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('vendor/owl/js/owl.carousel.min.js') }}"></script>
   
   <script type="text/javascript">
       $(function(){
             /*========== AWESOME FEATURESS ==========*/
            var sliderId = $('#features_slider'); // Slider ID
            sliderId.owlCarousel({
                thumbs: true,
                thumbsPrerendered: true,
                items: 1,
                loop: true,
                autoplay: true,
                dots: false,
                nav: false,
            });
           //https://codepen.io/washaweb/pen/KVRxRW
       });
      
   </script>
@endsection