<h1 class="my-5 text-center">

<?php if($auction) {
echo $auction->name;
}

else {
  echo 'Catalogue ';
  
  if ($category){
    echo '- ' . $category->title;
}
}
?>
</h1>

<?php if($auction) : ?>
<div class="container mb-4">
  <div class="row">
    <p><?=$auction->city?></p>
    <p>From <?=$auction->start_date?> to <?=$auction->end_date?></p>
    <p><?=$auction->description?></p>
  </div>
  </div>
  <?php endif?>


  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
      <div class="col-3">
        <h2>Filters</h2>
        
        <h5 class="mt-4">Category</h5>
          <div class="col-3 d-flex">
            <select class="form-select" name="category" style="min-width: 200px">
              <?php foreach ($categories as $category) : ?>
                <option value="<?=$category->id?>"><?=$category->title?></option>
              <?php endforeach ?>
            </select>
          </div>
        
        <form action="/items" method="GET">
        
          <h5 class="mt-4">Sort by</h5>
          
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="sort">
            <label class="form-check-label">
              Auction Date Ascending
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="sort">
            <label class="form-check-label">
              Auction Date Descending
            </label>
          </div>
            
          <h5 class="mt-4">Artists</h5>
          <?php foreach ($artists as $artist) : ?>
            <div class="col-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="artist" value="<?=$artist->artist?>">
                <label class="form-check-label">
                  <?=$artist->artist?>
                </label>
              </div>
            </div>
          <?php endforeach ?>
          
          <h5 class="mt-4">Price range</h5>
          
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="price">
            <label class="form-check-label">
              £1,000 - £10,000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="price">
            <label class="form-check-label">
              £10,001 - £50,000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="price">
            <label class="form-check-label">
              £50,000 - £100,000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="price">
            <label class="form-check-label">
              £100,000 - £500,000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="price">
            <label class="form-check-label">
              £500,000 - £1,000,000
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio"  name="price">
            <label class="form-check-label">
              Over £1,000,000
            </label>
          </div>
          
          <input class="btn btn-primary my-4" type="submit" value="Apply">
        </form>
        
      </div>
      <div class="col-9">
      
      <div class="row">
        <div class="mb-3">
          <label for="search" class="form-label">Search</label>
          <input type="text" class="form-control" id="myInput" aria-describedby="search" placeholder="Search...">
          <div id="search" class="form-text">Type an artist name or the title of an item.</div>
        </div>
      </div>
      
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($items as $item): ?>
            <div class="col" id="myDIV">
              <div class="card shadow-sm">
              <div class="d-flex align-items-center" style="height:300px">
              <img src="/uploads/<?=$item->image?>" style="max-height:300px" class="card-img-top" alt="...">
              </div>
                <div class="card-body">
                  <p class="card-text"><?=$item->title?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/item/page?id=<?=$item->id?>" class="btn btn-sm btn-outline-secondary">View</a>
                    </div>
                    <small class="text-muted"><?=$item->artist?></small>
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

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myDIV, #myDIV p,small").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

 
