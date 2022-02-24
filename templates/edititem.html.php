<?php   if($user === true || $user->role > 0) { ?>
<?php require 'adminsidebar.html.php'; ?>
          
    <div class="col-10 px-5 pt-5 border-1">
        <h2 class="pb-4">Add new lot item</h2>
            <form action="/item/save"  enctype="multipart/form-data" method="POST">
            
              <?php if($item) : ?>
                <input type="hidden" name="item[id]" value="<?= $item->id ?>"/>
              <?php endif; ?> 
              
                <input type="hidden" name="item[status]" value="<?= $item->status ?? 0?>"/>
                
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" required pattern="[A-Za-z0-9\s]{1,90}" name="item[title]" value="<?=$item->title ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="artist" class="form-label">Artist</label>
                  <input type="text" class="form-control" id="artist" required pattern="[A-Za-z0-9\s]{1,90}" name="item[artist]" value="<?=$item->artist ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="year" class="form-label">Year</label>
                  <input type="number" class="form-control" id="year" required name="item[year]" value="<?=$item->year ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="classification" class="form-label">Subject Classification</label>
                  <input type="text" class="form-control" id="classification" required pattern="[A-Za-z0-9\s]{1,90}" name="item[subject_classification]" value="<?=$item->subject_classification ?? ''?>">
                </div>
                
                <label for="category">Category (departament)</label>
                <select class="form-select" name="item[category_id]" id="category">
                    <?php foreach ($categories as $category){ ?>
                        <option value="<?= $category->id ?>"><?= $category->title ?></option>
                    <?php } ?>
                </select>
                
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="item[description]" rows="6"></textarea>
                </div>
                
                <div class="mb-3">
                  <label for="estimated_price" class="form-label">Estimated Price</label>
                  <input type="number" class="form-control" id="estimated_price" step="0.01" min="1" required name="item[estimated_price]" value="<?=$item->estimated_price ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="sold_price" class="form-label">Sold Price (if applicable)</label>
                  <input type="number" class="form-control" id="sold_price" step="0.01" name="item[sold_price]" value="<?=$item->sold_price ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="height" class="form-label">Height</label>
                  <input type="number" class="form-control" id="height" step="0.01" min="1" required name="item[height]" value="<?=$item->height ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="length" class="form-label">Length</label>
                  <input type="number" class="form-control" id="length" step="0.01" min="1" required name="item[length]" value="<?=$item->length ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="width" class="form-label">Width</label>
                  <input type="number" class="form-control" id="width" step="0.01" min="1" required name="item[width]" value="<?=$item->width ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="weight" class="form-label">Weight</label>
                  <input type="number" class="form-control" id="weight" step="0.01" min="1" required name="item[weight]" value="<?=$item->weight ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="image" class="form-label">Upload image</label>
                  <input class="form-control" type="file" name="image" id="image">
                </div>
                
                <div class="mb-3">
                  <label for="image_type" class="form-label">Image Type</label>
                  <input type="text" class="form-control" id="image_type" pattern="[A-Za-z0-9\s]{1,90}" name="item[image_type]" value="<?=$item->image_type ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="medium" class="form-label">Medium</label>
                  <input type="text" class="form-control" id="medium" pattern="[A-Za-z0-9\s]{1,90}" name="item[medium]" value="<?=$item->medium ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="material" class="form-label">Material</label>
                  <input type="text" class="form-control" id="material" pattern="[A-Za-z0-9\s]{1,90}" name="item[material]" value="<?=$item->material ?? ''?>">
                </div>
                
                <div class="form-check form-switch">
                    <label class="form-check-label" for="framed">Framed</label>
                    <input class="form-check-input" name="framed" type="checkbox" value="1" id="framed">
                </div>
                
                <label for="auction">Auction</label>
                <select class="form-select" name="item[auction_id]" id="auction">
                    <?php foreach ($auctions as $auction){ ?>
                        <option value="<?= $auction->id ?>"><?= $auction->name ?></option>
                    <?php } ?>
                </select>
                
                <div class="d-flex justify-content-between py-5">
                <a href="/items/manage/active">Cancel</a>
                <input type="submit" class="btn btn-primary" name="submit" value="Save" />
                </div> 
            </form>
            </div>

</div>
</div>
<?php } else { ?>
<div class="container">
  <h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>
</div>
<?php } ?>