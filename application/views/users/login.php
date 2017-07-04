<form action="<?php echo site_url('users/login/check'); ?>" method="POST">
    <div class="form-group row">
        <label for="inputLogin" class="col-sm-2">Login</label>
        <div class="col-sm-10">
            <input name="login" type="text" class="form-control" id="inputLogin" placeholder="Enter Login">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2">Password</label>
        <div class="col-sm-10">
            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
    </div>
</form>
<div class="row">
    <p class="col-sm-12">Don't have an account yet ? Please <a href="<?php echo site_url('users/register')?>">register</a></p>
</div>
