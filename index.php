<?php include("conexion.php"); ?>
<?php include ("include/header.php"); ?>
<div class="col-md-7 mx-auto">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/foto1.jpg" alt="" width="20%"  >
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/foto3.jpg" alt="" width="20%"  >
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/foto5.jpg" alt="" width="20%" >
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/foto4.jpg" alt="" width="20%" >
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/foto2.jpg" alt="" width="20%" >
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>     
<?php include ("include/footer.php"); ?>

