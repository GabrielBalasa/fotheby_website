
<div class="container">
    <div class="card my-5">
      <div class="card-body">
        <h2 class="card-title">Book an evaluation</h2>
        <p class="card-text">Book an evaluation so you can start selling with us.</p>
        
        <form action="/evaluation/book" method="POST">
        
            <div class="mb-3 col-6">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="booking[email]" placeholder="name@example.com">
            </div>
            
            <div class="mb-3 col-6">
              <label for="phone" class="form-label">Phone number</label>
              <input type="text" class="form-control" name="booking[phone]" id="phone" placeholder="name@example.com">
            </div>
            
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="booking[title]" placeholder="Painting Evaluation">
            </div>
            
            <div class="mb-3">
              <label for="details" class="form-label">Description</label>
              <textarea class="form-control" id="details" name="booking[details]" rows="6" placeholder="Write as much information about the item as possible"></textarea>
            </div>
        
            <button class="btn btn-primary" type="submit">Book</button>
        </form>

      </div>
    </div>
</div>
