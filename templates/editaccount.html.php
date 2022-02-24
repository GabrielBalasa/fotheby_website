<?php if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
?>
<?php require 'adminsidebar.html.php'; ?>
          
<div class="col-10 px-5 pt-5 border-1">
    <h2 class="pb-4">Add new admin</h2>
    <form action="/account/save" method="POST">
                    
    <input hidden name="account[role]" value="2" >
    <input hidden name="account[status]" value="1" >
    
    <div class="row">
        <div class="col-md-6">
            <label for="firstname" class="form-label">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="account[firstname]" required pattern="[A-Za-z0-9\s]{1,255}">
        </div>
        
          
        <div class="col-md-6">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="surname"  name="account[surname]" required pattern="[A-Za-z0-9\s]{1,255}">
        </div>
    
    
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="account[email]" required>
    </div>
      
    <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="account[password]" required>
    </div>
      
    <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="account[address]" required pattern="[A-Za-z0-9\s]{1,255}">
    </div>
      
    <div class="col-md-6">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="account[city]" pattern="[A-Za-z\s]{1,255}" required>
    </div>
      
    <div class="col-md-4">
      <label for="country" class="form-label">Country</label>
        <input type="text" class="form-control" id="country" name="account[country]" required pattern="[A-Za-z\s]{1,255}">
    </div>
      
    <div class="col-md-2">
        <label for="postcode" class="form-label">Postcode</label>
        <input type="text" class="form-control" id="postcode" name="account[postcode]" required pattern="[A-Za-z0-9\s]{1,10}">
    </div>
      
    <div class="col-md-6">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone"  name="account[phone]" required pattern="[0-9]{1,16}">
    </div>
      
    <div class="col-md-6">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="account[dob]" required max="2021-12-12">
    </div>          
    </div>
    
    <div class="d-flex justify-content-between py-5">
        <a href="/accounts/admin/manage">Cancel</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Save" />
    </div> 
                  
    </form>
</div>
</div>
</div>
          
