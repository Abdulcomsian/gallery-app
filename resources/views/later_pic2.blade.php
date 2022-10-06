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
<style>
    .grid-item { width: 200px; }
.grid-item--width2 { width: 400px; }


* { box-sizing: border-box; }

/* force scrollbar */
html { overflow-y: scroll; }

body { font-family: sans-serif; }

/* ---- grid ---- */

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
	</body>
</html>
