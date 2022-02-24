<div class="container">
    <h1 class="my-5">Login</h1>
    <?php
        if (isset($error)): // Display errors if login failed
            echo '<div class="errors" style="color:red">' . $error . '</div>';
        endif;
    ?>
    <div class="card my-5 p-4 border-0 login">
        <form action="/login" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary">Log in</button>
        </form>
    </div>
</div>