<?php include ('includes/mainheader.html');?>


<!--header-->
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
<!--          Slider Image-->
          <div class="carousel-item active" style="background-image: url('img/carousel1.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

<!--          Slider Image-->
          <div class="carousel-item" style="background-image: url('img/carousel2.jpg')">
            <div class="carousel-caption d-none d-md-block">
                <p>
                    "Hello World! test"
                </p>
            </div>
          </div>

<!--          Slider Image-->
          <div class="carousel-item" style="background-image: url('img/carousel3.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>
    </header>

<?php include ('includes/mainfooter.html');?>
