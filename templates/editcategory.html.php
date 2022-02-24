<?php   if($user === true || $user->role > 0) { ?>
<?php require 'adminsidebar.html.php'; ?>

<div class="col-10 px-5 pt-5 border-1">
        <h2 class="pb-4">Add new category</h2>
            <form action="/category/save" method="POST"> <!-- Edit/Add new category -->
            
            <?php if($category) : ?>
                <input hidden type="number" name="category[id]" value="<?=$category->id?>">
            <?php endif ?>
                  <div class="mb-3">
                    <label for="title" class="form-label">Category title</label>
                    <input type="text" required pattern="[A-Za-z0-9\s]{1,90}" class="form-control" name="category[title]" id="title" value="<?=$category->title ?? ''?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Save</button>
            </form>
      </div>
    </div>
</div>
<?php } else { ?>
<div class="container">
  <h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>
</div>
<?php } ?>