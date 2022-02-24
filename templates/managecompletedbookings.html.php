<?php 
if($user === true || $user->role > 0){

require 'adminsidebar.html.php'; ?>
          
<div class="col-10 px-5 pt-5 border-1">
    <h2 class="pb-4">Completed Evaluations</h2>
          
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Delete</th>
                <th>ID</th>
                <th>Title</th>
                <th>Details</th>
                <th>Email</th></th>
                <th>Phone</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach ($bookings as $booking) : ?>
        
            <tr>
               <td>
                    <form action="/evaluation/delete" method="POST">
                        <input hidden type="number" name="id" value="<?=$booking->id?>">
                        <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete">
                    </form>
               </td>
                <td><?=$booking->id?></td>
                <td><?=$booking->title?></td>
                <td><?=$booking->email?></td>
                <td><?=$booking->phone?></td>
                <td><?=$booking->getAdmin()->surname?></td>
                <td class="truncate"><?=$booking->details?></td>
                
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
