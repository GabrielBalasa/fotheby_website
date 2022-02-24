<?php   if($user === true || $user->role > 0) { ?>
<?php require 'adminsidebar.html.php'; ?>
          
    <div class="col-10 px-5 pt-5 border-1">
        <h2 class="pb-4">Add new auction</h2>
            <form action="/auction/save" method="POST">
            
              <?php if($auction) : ?>
                <input type="hidden" name="auction[id]" value="<?= $auction->id ?>"/>
              <?php endif; ?> 
                
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" required pattern="[A-Za-z0-9\s]{1,90}" name="auction[name]" value="<?=$auction->name ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="auction[description]" rows="6"><?=$auction->description ?? ''?></textarea>
                </div>
                
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" pattern="[A-Za-z0-9\s]{1,90}" name="auction[address]" value="<?=$auction->address ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" pattern="[A-Za-z0-9\s]{1,90}" name="auction[city]" value="<?=$auction->city ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="bookings" class="form-label">Bookings</label>
                  <input type="number" class="form-control" id="bookings" min="1" name="auction[bookings]" value="<?=$auction->bookings ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="start_date" class="form-label">Start Date</label>
                  <input type="date" class="form-control" id="start_date" name="auction[start_date]" min="2000-12-30" value="<?=$auction->start_date ?? ''?>">
                </div>
                
                <div class="mb-3">
                  <label for="end_date" class="form-label">End Date</label>
                  <input type="date" class="form-control" id="end_date" name="auction[end_date]" min="2000-12-30" value="<?=$auction->end_date ?? ''?>">
                </div>
                
                <div class="d-flex justify-content-between py-5">
                    <a href="/auctions/manage/active">Cancel</a>
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