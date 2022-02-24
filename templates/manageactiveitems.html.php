<?php 
if($user === true || $user->role > 0){

require 'adminsidebar.html.php'; ?>
          
<div class="col-10 px-5 pt-5 border-1">
    <h2 class="pb-4">Active lot items</h2>
          
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>View</th>
                <th>Edit</th>
                <th>Sold</th>
                <th>ID</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Category</th>
                <th>Classification</th>
                <th>Height</th>
                <th>Lenght</th>
                <th>Width</th>
                <th>Weight</th>
                <th>Image_Type</th>
                <th>Medium</th>
                <th>Material</th>
                <th>Frame</th>
                <th>Estimated_Price</th>
                <th>Auction</th>
                <th>Auction_Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach ($items as $item) : ?>
        
            <tr>
                <td><a href="/item/view?id=<?=$item->id?>" class="btn btn-outline-dark btn-sm">View</a></td>
                <td><a href="/item/save?id=<?=$item->id?>" class="btn btn-outline-dark btn-sm">Edit</a></td>
                <td>
                    <form action="/item/sold" method="POST" >
                        <input hidden name="item[id]" value="<?=$item->id?>">
                        <input hidden name="item[status]" value="2">
                        <input type="submit" class="btn btn-outline-dark btn-sm" value="Sold">
                    </form>
                </td>
                <td><?=$item->id?></td>
                <td><?=$item->title?></td>
                <td><?=$item->artist?></td>
                <td><?=$item->year?></td>
                <td><?=$item->getCategory()->title?></td>
                <td><?=$item->subject_classification?></td>
                <td><?=$item->height?></td>
                <td><?=$item->length?></td>
                <td><?=$item->width?></td>
                <td><?=$item->weight?></td>
                <td><?=$item->image_type?></td>
                <td><?=$item->medium?></td>
                <td><?=$item->material?></td>
                <td><?=$item->frame?></td>
                <td><?=$item->estimated_price?></td>
                <td><?=(isset($item->auction_id)) ? $item->getAuction()->name : null ?></td>
                <td><?=(isset($item->auction_id)) ? $item->getAuction()->start_date : null ?></td>
                <td>
                    <form action="/item/delete" method="POST">
                        <input hidden type="number" name="id" value="<?=$item->id?>">
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
