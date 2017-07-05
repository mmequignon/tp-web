<hr>
<table class="table table-hover" >
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($basket_lines as $basket_line): ?>
        <tr>
            <th><a href="<?php echo site_url('product/item?id='.$basket_line->product_id); ?>"><?php echo $basket_line->name; ?></a> </th>
            <th><?php echo $basket_line->amount; ?></th>
            <th><?php echo $basket_line->product_qty; ?></th>
            <th>
                <form action="<?php echo site_url('basketline/delete'); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $basket_line->id?>">
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>
<form action="<?php echo site_url('basket/checkout'); ?>" method="POST">
    <div class="form-group row">
        <label for="inputDelivery" class="col-sm-2">Delivery mode : </label>
        <div class="col-sm-2">
            <select class="custom-select" name="delivery_mode" id="inputDelivery">
                <?php foreach($delivery_modes as $delivery_mode): ?>
                <option value="<?php echo $delivery_mode->id ;?>"><?php echo $delivery_mode->name." : ".$delivery_mode->price."€";?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <label for="inputPaymentMode" class="col-sm-2">Payment mode : </label>
        <div class="col-sm-2">
            <select class="custom-select"  name="payment_mode" id="inputPaymentMode">
            <?php foreach($payment_modes as $payment_mode): ?>
                <option value="<?php echo $payment_mode->id; ?>"> <?php echo $payment_mode->name; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-warning">Checkout</button>
        </div>
    </div>
</form>
