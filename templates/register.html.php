<div class="container py-5">

<h1>Register with us</h1>
<h6 class="my-2 text-muted">Once you submit this registration, one of out operators will get in touch with you via email to do all the neccessary background checks before you can participate in auctions.</h6>

<div class="card my-5 border-0 p-3 register-form">
  <div class="card-body">
    
    <form class="row g-3" action="/register" method="POST" >
    
    <input hidden name="account[role]" value="1" >
    <input hidden name="account[status]" value="0" >
    
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
      
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="terms" required>
          <label class="form-check-label" for="terms">
            I accept the <a href="#"> Terms and Conditions</a>.
          </label>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
    </div>
</div>
</div>