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
