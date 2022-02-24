<?php 
require 'adminsidebar.html.php'; 
if($user === true || $user->role >= 4){
    ?>
          
<div class="col-10 px-5 pt-5 border-1">
    <h2 class="pb-4">Pending Customer Accounts</h2>
          
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Approve</th>
                <th>ID</th>
                <th>Firstname</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Postcode</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach ($accounts as $account) : ?>
        
            <tr>
                <td>
                    <form action="/account/approve" method="POST">
                        <input hidden name="account[id]" value="<?=$account->id?>"?>
                        <input hidden name="account[status]" value="1"?>
                        <input type="submit" class="btn btn-outline-dark btn-sm" value="Approve">
                    </form>
                </td>
                <td><?=$account->id?></td>
                <td><?=$account->firstname?></td>
                <td><?=$account->surname?></td>
                <td><?=$account->email?></td>
                <td><?=$account->address?></td>
                <td><?=$account->city?></td>
                <td><?=$account->country?></td>
                <td><?=$account->postcode?></td>
                <td><?=$account->phone?></td>
                <td><?=$account->dob?></td>
                <td>
                    <form action="/account/delete" method="POST">
                        <input hidden name="id" value="<?=$account->id?>"?>
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
