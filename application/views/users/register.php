<div class="alert alert-danger" <?php echo (validation_errors()) ? "" : 'style="display:none"'; ?>>
    <strong>Error !</strong><?php echo validation_errors(); ?>
</div>

<form action="<?php echo site_url('users/register/save'); ?>" method="POST">
    <div class="form-group row">
        <label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
        <div class="col-sm-10">
            <input name="login" type="text" class="form-control" id="inputLogin" placeholder="Enter Login">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Email address</label>
        <div class="col-sm-10">
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputFirstname" class="col-sm-2 col-form-label">Firstname</label>
        <div class="col-sm-10">
            <input name="firstname" type="text" class="form-control" id="inputFirstname" placeholder="Enter Firstname">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputLastname" class="col-sm-2 col-form-label">Lastname</label>
        <div class="col-sm-10">
            <input name="lastname" type="text" class="form-control" id="inputLastname" placeholder="Enter Lastname">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputStreet" class="col-sm-2 col-form-label">Street</label>
        <div class="col-sm-10">
            <input name="street" type="text" class="form-control" id="inputStreet" placeholder="Enter Street">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCity" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
            <input name="city" type="text" class="form-control" id="inputCity" placeholder="Enter City">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPostcode" class="col-sm-2 col-form-label">Postal Code</label>
        <div class="col-sm-10">
            <input name="postcode" type="number" class="form-control" id="inputPostcode" placeholder="Enter Postal code">
        </div>
    </div>
    <div class="form-check row" <?php echo (! $admin) ? 'style="display:none;"' : "" ; ?>>
        <label for="inputAdmin" class="col-sm-2 col-form-label">Admin</label>
            <input name="admin" id="checkboxAdmin" class="form-check-input" type="checkbox" value="1">
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-warning">Create</button>
    </div>
</form>
