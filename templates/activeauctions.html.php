
  <h1 class="px-5 m-5">Auctions</h1>
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
      <div class="col-3">
        <h2>Filters</h2>
        
        <form action="/auctions/filters" method="POST">
        
          <h5 class="mt-4">Sort by</h5>
          
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="filter[sort]">
            <label class="form-check-label">
              Final Date Ascending
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="filter[sort]">
            <label class="form-check-label">
              Final Date Descending
            </label>
          </div>
            
          <h5 class="mt-4">Locations</h5>
          <?php foreach ($cities as $city) : ?>
            <div class="col-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="filter[city]" value="<?=$city->city?>">
                <label class="form-check-label">
                  <?=$city->city?>
                </label>
              </div>
            </div>
          <?php endforeach ?>
          
          <input class="btn btn-primary my-4" type="submit" value="Apply">
        </form>
        
      </div>
        <div class="col-9">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($auctions as $auction): ?>
            <div class="col">
              <div class="card shadow-sm">
                <img src="../uploads/auction1.jpg" style="max-height:300px" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text"><?= $auction->name ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a class="btn btn-sm btn-outline-secondary" href="/auction/items?id=<?=$auction->id?>">View</a>
                    </div>
                    <small class="text-muted"><?=$auction->city?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

