<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <?php
  require "connection.php";
  require "include.php";
  ?>

  <style>
    .text-truncate-container {
      width: 250px;
    }

    .text-truncate-container p {
      -webkit-line-clamp: 3;
      display: -webkit-box;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .testimonial-group > .row {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }
    .testimonial-group > .row > .col-auto {
      display: inline-block;
    }
  </style>
</head>

<body>
  <?php require "header.php";?>
  <div class="container">
    <div id="carouselProducts" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselProducts" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselProducts" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselProducts" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <img class="card-img-left flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_184e1f24f10%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_184e1f24f10%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-3">
                <a class="text-dark" href="#">Title 3</a>
              </h3>
              <div class="mb-2">36.25 €</div>
              <p class="card-text mb-auto w-100 h-100" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Il testo (dal latino textus, "tessuto", "tram
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <img class="card-img-left flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_184e1f24f10%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_184e1f24f10%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-3">
                <a class="text-dark" href="#">Title 3</a>
              </h3>
              <div class="mb-2">36.25 €</div>
              <p class="card-text mb-auto w-100 h-100" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Il testo (dal latino textus, "tessuto", "tram
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <img class="card-img-left flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_184e1f24f10%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_184e1f24f10%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.1953125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-3">
                <a class="text-dark" href="#">Title 3</a>
              </h3>
              <div class="mb-2">36.25 €</div>
              <p class="card-text mb-auto w-100 h-100" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Il testo (dal latino textus, "tessuto", "tram
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselProducts" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselProducts" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(100%);"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="row justify-content-md-center">
      <div class="col-3">
        <h2>Buy again:</h2>
        <div class="row">
          <div class="col-auto">
            <img src="image/gift.png" height="100" width="100">
          </div>
          <div class="col-auto">
            <img src="image/blaster.png" height="100" width="100">
          </div>
        </div>
        <div class="row">
          <div class="col-auto">
            <img src="image/house.png" height="100" width="100">
          </div>
          <div class="col-auto">
            <img src="image/tshirt.png" height="100" width="100">
          </div>
        </div>
      </div>
    
      <div class="col-3 text-center">
        <h2>Evaluate your purchase:</h2>
        <div class="">
            <img src="image/house.png" height="120" width="120">
          <div class="caption">
            <img src="image/stars.png" height="70" width="70"> <!-- Da riposizionare -->
          </div>
        </div>
      </div>

      <div class="col-3 text-center">
        <h2>Shopping cart:</h2>
        <div class="">
          <img class="rounded-circle" src="image/alien-shopping.jpg" height="200" width="200">
        </div>
      </div>
    </div>
    
    <div class="testimonial-group text-center">
      <h2>Categories:</h2>
      <div class="row">
        <div class="col-auto">
          <img src="image/gift.png" height="100" width="100">
          <h5 class="fw-normal">Offert</h5>
        </div>
        <div class="col-auto">
          <img src="image/blaster.png" height="100" width="100">
          <h5 class="fw-normal">Technology</h5>
        </div>
        <div class="col-auto">
          <img src="image/house.png" height="100" width="100">
          <h5 class="fw-normal">House tools</h5>
        </div>
        <div class="col-auto">
          <img src="image/tshirt.png" height="100" width="100">
          <h5 class="fw-normal">Fashion</h5>
        </div>
        <div class="col-auto">
          <img src="image/ufo.png" height="100" width="100">
          <h5 class="fw-normal">Vehicle</h5>
        </div>
        <div class="col-auto">
          <img src="image/food.png" height="100" width="100">
          <h5 class="fw-normal">Food</h5>
        </div>
        <div class="col-auto">
          <img src="image/art.png" height="100" width="100">
          <h5 class="fw-normal">Art</h5>
        </div>
      </div>
    </div>
    <?php require "footer.php" ?>
  </div>
</body>

</html>