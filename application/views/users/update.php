<?php echo validation_errors(); ?>

<form action="<?php echo site_url('users/update/save'); ?>" method="POST">
    <input name="id" type="hidden" value="<?php echo $user->id; ?>">
    <div class="form-group row">
        <label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
        <div class="col-sm-10">
            <input name="login" type="text" class="form-control" id="inputLogin" value="<?php echo $user->login; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Email address</label>
        <div class="col-sm-10">
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $user->email; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputFirstname" class="col-sm-2 col-form-label">Firstname</label>
        <div class="col-sm-10">
            <input name="firstname" type="text" class="form-control" id="inputFirstname" value="<?php echo $user->firstname; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputLastname" class="col-sm-2 col-form-label">Lastname</label>
        <div class="col-sm-10">
            <input name="lastname" type="text" class="form-control" id="inputLastname" value="<?php echo $user->lastname; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputStreet" class="col-sm-2 col-form-label">Street</label>
        <div class="col-sm-10">
            <input name="street" type="text" class="form-control" id="inputStreet" placeholder="Enter Street" value="<?php echo $user->street; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCity" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
            <input name="city" type="text" class="form-control" id="inputCity" placeholder="Enter City" value="<?php echo $user->city; ?>"> 
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPostcode" class="col-sm-2 col-form-label">Postal Code</label>
        <div class="col-sm-10">
            <input name="postcode" type="text" class="form-control" id="inputPostcode" placeholder="Enter Postal code" value="<?php echo $user->postcode; ?>">
        </div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-warning">Update</button>
    </div>
</form>
<form action="<?php echo site_url('users/update/save_password'); ?>" method="POST">
    <input name="id" type="hidden" value="<?php echo $user->id; ?>">
    <div class="form-group row">
        <label for="inputCurrentPassword" class="col-sm-2 col-form-label">Current password</label>
        <div class="col-sm-10">
            <input name="current_password" type="password" class="form-control" id="inputCurrentPassword">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputNewPassword" class="col-sm-2 col-form-label">New password</label>
        <div class="col-sm-10">
            <input name="new_password" type="password" class="form-control" id="inputNewPassword" >
        </div>
    </div>
    <div class="form-group row">
        <label for="inputConfirmationPassword" class="col-sm-2 col-form-label">Confirmation</label>
        <div class="col-sm-10">
            <input name="confirmation_password" type="password" class="form-control" id="inputConfirmationPassword">
        </div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-warning">Update</button>
    </div>
</form>
<h2>Your orders</h2>
<table class="table table-hover" >
    <thead>
      <tr>
        <th>Number</th>
        <th>Amount</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order): ?>
        <tr>
            <th><a href="<?php echo site_url('invoice/order?id='.$order->id); ?>"><?php echo $order->id; ?></a> </th>
            <th><?php echo $order->amount; ?></th>
            <th><?php echo $order->create_date; ?></th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>