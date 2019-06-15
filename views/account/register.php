<?php
    include($_SERVER['DOCUMENT_ROOT'].'/views/header/header.php');
?>
<div class="container-fluid" style="padding-top: 10px;">
    <div class="row">
        <div class="col-xs-12 col-md-6">
        <?php
            if(isset($_GET['error'])){
        ?>
                <h3 class="text-danger"><?= $_GET['error']?></h3>
        <?php
            }
        ?>
            <h1 style="text-align: center; padding:50% 0;">Registration Page</h1>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="container-fluid">
                <h2>Personal Information</h2>
                <form action="/controllers/users.php" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
                    </div>
                    <h3>Account Security</h3>
                    <div class="form-group">
                        <label for="last_name">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="retype_password">Retype Password</label>
                        <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype Password" required>
                        <small id="passwordHelpInline" class="text-muted">
                            Must be 8-20 characters long.
                        </small>
                    </div>
                    <input type="submit" class="btn btn-primary" name="createUser" value="Create Account">
                </form>
            </div>
            <div class="join container" style="padding: .5rem; margin:5% 0; background-color: green; text-align:center; letter-spacing: .1em!important;">
                <h2>Join DateNight</h2>
            </div>
            <div class="container" style="background-color: #EDEBE9;">
                <a class="btn btn-primary" href="/views/account/login.php">LOGIN NOW</a>
                <h3>Already have an account? Login to access your favorites!</h3>
            </div>
        </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>