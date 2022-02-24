<?php 
if($user === true || $user->role > 0){

require 'adminsidebar.html.php'; ?>
          
<div class="col-10 px-5 pt-5 border-1">
    <h2 class="pb-4">Categories</h2>
          
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Edit</th>
                <th>ID</th>
                <th>Category</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach ($categories as $category) : ?>
        
            <tr>
                <td><a href="/category/save?id=<?=$category->id?>" class="btn btn-outline-dark btn-sm">Edit</a></td>
                <td><?=$category->id?></td>
                <td><?=$category->title?></td>
                <td>
                    <form action="/category/delete" method="POST">
                        <input hidden type="number" name="id" value="<?=$category->id?>">
                        <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete">
                    </form>
               </td>
            </tr>
            
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>

</div>
</div>
 
 <?php
 }
 else {
    echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
 }
