<html>
	<head>

		<title>Gallery</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
  	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="gallery/css/bootstrap-image-gallery.min.css">
		  	<link href="css/general.css" rel="stylesheet">

		  	<div class="container alert alert-info">
		  	
  			<h1>Gallery</h1>
  			<p>Click on an image to enlarge</p>
			</div>
	</head>
	
	<body>

	<?php require_once('navbar_main.php');?>

<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
<div id="links" align="center">
    <a href="images/pic1.jpg" title="Freshers Party 2012 Batch" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Banana">
    </a>
    <a href="images/pic2.jpg" title="Workshop" data-gallery>
        <img height="150" src="images/pic2.jpg" alt="Apple">
    </a>
    <a href="images/pic1.jpg" title="Caption3" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Orange">
    </a>
    <a href="images/pic1.jpg" title="Freshers Party 2012 Batch" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Banana">
    </a>
    <a href="images/pic2.jpg" title="Workshop" data-gallery>
        <img height="150" src="images/pic2.jpg" alt="Apple">
    </a>
    <a href="images/pic1.jpg" title="Caption3" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Orange">
    </a>
    <a href="images/pic1.jpg" title="Freshers Party 2012 Batch" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Banana">
    </a>
    <a href="images/pic2.jpg" title="Workshop" data-gallery>
        <img height="150" src="images/pic2.jpg" alt="Apple">
    </a>
    <a href="images/pic1.jpg" title="Caption3" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Orange">
    </a>
    <a href="images/pic1.jpg" title="Freshers Party 2012 Batch" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Banana">
    </a>
    <a href="images/pic2.jpg" title="Workshop" data-gallery>
        <img height="150" src="images/pic2.jpg" alt="Apple">
    </a>
    <a href="images/pic1.jpg" title="Caption3" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Orange">
    </a>
    <a href="images/pic1.jpg" title="Freshers Party 2012 Batch" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Banana">
    </a>
    <a href="images/pic2.jpg" title="Workshop" data-gallery>
        <img height="150" src="images/pic2.jpg" alt="Apple">
    </a>
    <a href="images/pic1.jpg" title="Caption3" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Orange">
    </a>
    <a href="images/pic1.jpg" title="Freshers Party 2012 Batch" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Banana">
    </a>
    <a href="images/pic2.jpg" title="Workshop" data-gallery>
        <img height="150" src="images/pic2.jpg" alt="Apple">
    </a>
    <a href="images/pic1.jpg" title="Caption3" data-gallery>
        <img height="150" src="images/pic1.jpg" alt="Orange">
    </a>
</div>
</div>


<script src="//code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="gallery/js/bootstrap-image-gallery.min.js"></script>
	</body>
</html>