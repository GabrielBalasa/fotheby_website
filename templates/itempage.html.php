<div class="container">

    <h1 class="my-5"><?=$item->title?></h1>

    <div class="card mb-4 ">
      <div class="row g-0">
        <div class="col-md-6">
          <img src="/uploads/<?=$item->image?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h5 class="card-title"><?=$item->title?></h5>
            <p class="card-text">Artist: <?=$item->artist?></p>
            <p class="card-text">Year: <?=$item->year?></p>
            <p class="card-text">Auction: <?=$item->getAuction()->name?></p>
            <p class="card-text">Auction date: <?=$item->getAuction()->end_date?></p>
            <p class="card-text">Starting price: £ <?=$item->estimated_price?></p>
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">Bid</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="card mb-5">
  <div class="card-header">
    Details
  </div>
  <div class="card-body">
    <h4 class="card-title">Description</h5>
    <p class="card-text"><?=$item->description?></p>
    <h4 class="card-title">Details</h5>
    <p class="card-text">Classification: <?=$item->subject_classification?></p>
    
    <?php if ($item->height) : ?>
        <p class="card-text"><?=$item->height?></p>
    <?php endif ?>
    
    <?php if ($item->length) : ?>
        <p class="card-text"><?=$item->length?></p>
    <?php endif ?>
    
    <?php if ($item->width) : ?>
        <p class="card-text"><?=$item->width?></p>
    <?php endif ?>
    
    <?php if ($item->weight) : ?>
        <p class="card-text"><?=$item->weight?></p>
    <?php endif ?>
    
    <?php if ($item->image_type) : ?>
        <p class="card-text"><?=$item->image_type?></p>
    <?php endif ?>
    
    <?php if ($item->medium) : ?>
        <p class="card-text"><?=$item->medium?></p>
    <?php endif ?>
    
    <?php if ($item->material) : ?>
        <p class="card-text"><?=$item->material?></p>
    <?php endif ?>
    
    <?php if ($item->frame) : ?>
        <p class="card-text"><?=$item->frame?></p>
    <?php endif ?>
  </div>
</div>
    
</div>