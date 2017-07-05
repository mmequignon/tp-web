<hr>
<a href="<?php echo site_url('users/account'); ?>">Back to account</a>
<hr>
<div class="row">
    <h3>Delivery address</h3>
    <p><?php echo $user->firstname. " " . $user->lastname; ?></p>
    <p><?php echo $user->street; ?></p>
    <p><?php echo $user->city . "\t" . $user->postcode; ?></p>
    <hr>
    <h3>Payment mode</h3>
    <p><?php echo $invoice->name; ?></p>
    <hr>
    <h3>Invoice lines</h3>
    <table class="table table-hover" >
        <thead>
          <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($invoice_lines as $invoice_line): ?>
            <tr>
                <th><a href="<?php echo site_url('product/item?id='.$invoice_line->product_id); ?>"><?php echo $invoice_line->name; ?></a> </th>
                <th><?php echo $invoice_line->product_qty; ?></th>
                <th><?php echo $invoice_line->amount; ?>€</th>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <h3>Total : <?php echo $invoice->amount; ?>€</h3>
</div>
