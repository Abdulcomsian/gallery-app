<!DOCTYPE html>
<html>
	<head>
		<title>Pinterest-like layouts with freewall</title>
		<meta content="text/html; charset=utf-8" http-equiv="content-type">
		<meta name="description" content="Freewall demo for pinterest-like layout" />
		<meta name="keywords" content="javascript, dynamic, grid, layout, jquery plugin, pinterest like layouts" />
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<!-- or -->
        <!-- <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script> -->
                  <!-- Link Swiper's CSS -->
          <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
          />

          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
    .grid-item { width: 200px; }
.grid-item--width2 { width: 400px; }


* { box-sizing: border-box; }

/* force scrollbar */
html { overflow-y: scroll; }

body { font-family: sans-serif; }

/* ---- grid ---- */

.swiper {
  height: 100%;
}

.swiper-slide {
  display: flex;
  align-items: center;
  justify-content: center;
}

.swiper img{
  height: 100%;
}

.grid {
  background: #DDD;
}

/* clear fix */
.grid:after {
  content: '';
  display: block;
  clear: both;
}

/* ---- .grid-item ---- */

.grid-sizer,
.grid-item {
  width: 33.333%;
}

.grid-item {
  float: left;
}

.grid-item img {
  display: block;
  max-width: 100%;
}

 .Img_wrapper{
              width: 100%;
              height: 100%;
              justify-content: center;
              align-items: center;
              background-color: #000;
              position: fixed;
              top: 0;
              left: 0;
              z-index: 999;
              display: none;
            }
            #closeModel{
              position: absolute;
              top: 0;
              right: 10px;
              font-size: 2rem;
              color: #fff;
              cursor: pointer;
              padding: 10px;
              z-index: 99999;
              transition: .2s;
            }
            #closeModel:hover{
              transform: scale(1.1);
            }
            #closeModel i{
              cursor: pointer;
            }

</style>
	</head>
	<body>
        <div class="grid">
        <div class="grid-sizer"></div>
        @for($i=0;$i<=count($photos);$i++)
                 <div class="grid-item">
                 <img src="{{$photos[$i]->web ?? ''}}" id="{{$i}}" style="    padding: 20px 18px;width:100%; margin-bottom: 12px"/>
                </div>
            @endfor 
        </div>


                <div class="Img_wrapper">
                      <!-- Swiper -->
                      <div class="swiper mySwiper h-100">
                        <div class="swiper-wrapper">
                          @foreach($photos as $photo)
                              <div class="swiper-slide">
                                <img src="{{$photo->web}}"/>                                  
                              </div>
                              @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                         <div class="swiper-pagination"></div>
                      </div>
                      <span id="closeModel">
                         <i class="fa-solid fa-xmark"></i>
                      </span>
                    </div>


       <script>
      // init Masonry
        var $grid = $('.grid').masonry({
          itemSelector: '.grid-item',
          percentPosition: true,
          columnWidth: '.grid-sizer'
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
          $grid.masonry();
        });  

       </script>

                <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        keyboard: {
          enabled: true,
        },
        //  pagination: {
        //   el: ".swiper-pagination",
        //   clickable: true,
        // },
      });
    </script>

            <script>
              $('img').click(function(){
                setTimeout(() => {
                  $('.Img_wrapper').css('display','flex');
                }, 200);
                swiper.slideTo($(this).attr('id'), 0, false);
              })
              $('#closeModel').click(function(){
                // fadeout
                $('.Img_wrapper').fadeOut();
                setTimeout(() => {
                  $('.Img_wrapper').css('display','none');
                }, 200);
              })
            </script>
	</body>
</html>
