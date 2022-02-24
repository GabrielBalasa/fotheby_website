<?php 
if($user === true || $user->role > 0){

require 'adminsidebar.html.php'; ?>
          
<div class="col-10 px-5 pt-5 border-1">
    <h2 class="pb-4">Active auctions</h2>
          
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>View</th>
                <th>Edit</th>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Address</th>
                <th>City</th>
                <th>Bookings</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach ($auctions as $auction) : ?>
        
            <tr>
                <td><a href="/auction/view?id=<?=$auction->id?>" class="btn btn-outline-dark btn-sm">View</a></td>
                <td><a href="/auction/save?id=<?=$auction->id?>" class="btn btn-outline-dark btn-sm">Edit</a></td>
                <td><?=$auction->id?></td>
                <td><?=$auction->name?></td>
                <td class="truncate"><?=$auction->description?></td>
                <td><?=$auction->address?></td>
                <td><?=$auction->city?></td>
                <td><?=$auction->bookings?></td>
                <td><?=$auction->start_date?></td>
                <td><?=$auction->end_date?></td>
                <td>
                    <form action="/auction/delete" method="POST">
                        <input hidden name="id" value="<?=$auction->id?>"?>
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
