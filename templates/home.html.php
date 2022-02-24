
    <div id="carouselExampleCaptions" class="carousel slide p-0 pb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="/images/slider1.jpg" class="img-fluid w-100" alt="..." style="max-height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="/images/slider2.jpg" class="img-fluid w-100" alt="..." style="max-height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="/images/slider3.jpg" class="img-fluid w-100" alt="..." style="max-height: 80vh;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

   
<div class="container py-5">

    <div class="row">
    <h2 class="mt-4">Current Auctions</h2>
            <?php foreach($currentAuctions as $currentAuction) : ?>
                <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <?=$currentAuction->name?>
                    </div>
                  <img src="../images/photo.jpg" class="img-fluid" alt="..." style="max-height: 250px;">
                  <div class="card-body  bg-dark text-light">
                    <p class="card-text"><?=$currentAuction->city?></p>
                    <a href="/auction/items?id=<?=$currentAuction->id?>" class="btn btn-primary">View</a>
                  </div>
                </div>
            </div>
            <?php endforeach ?>        
    </div>   
    
    <div class="row my-5">
        <h2 class="mt-4">Upcoming Auctions</h2>
            <?php foreach($upcomingAuctions as $upcomingAuction) : ?>
                <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <?=$upcomingAuction->name?>
                    </div>
                  <img src="../images/photo.jpg" class="img-fluid" alt="..." style="max-height: 250px;">
                  <div class="card-body  bg-dark text-light">
                    <p class="card-text"><?=$upcomingAuction->city?></p>
                    <a href="/auction/items?id=<?=$upcomingAuction->id?>" class="btn btn-primary">View</a>
                  </div>
                </div>
            </div>
            <?php endforeach ?>        
    </div>       
</div>
