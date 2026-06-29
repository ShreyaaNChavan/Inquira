<div class="container">
    <h1 class="heading">Log in</h1>
    <form method="post" action="./server/requests.php">
    

    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="email" class="form-label">User Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder = "Enter your email" required>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
        <label for="password" class="form-label">User Password </label>
        <input type="password" name="password" class="form-control" id="password" placeholder = "Enter your password" required>
    </div>


    <div class="col-6 offset-sm-3 margin-bottom-15">    
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>

    </form>
</div>