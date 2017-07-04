<form action="<?php echo site_url('users/login/check'); ?>" method="POST">
    <div class="form-group row">
        <label for="inputLogin">Login</label>
        <input name="login" type="text" class="form-control" id="inputLogin" placeholder="Enter Login">
    </div>
    <div class="form-group row">
        <label for="inputPassword">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Enter password">
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-success">Login</button>
    </div>
</form>
<div class="row">
<p>Don't have an account yet ? Please register</p>
<a href="<?php echo site_url('users/register'); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Register</a>
</div>
