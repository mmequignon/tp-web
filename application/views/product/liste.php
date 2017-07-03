<div class="row">
    <form action="<?php echo site_url('product/liste'); ?>" method="GET">
        <div class="form-group">
            <label for="inputproductcategoryid" class="col-sm-2">Product category : </label>
            <div class="col-sm-2">
                <select class="custom-select" name="product_category" id="inputproductcategoryid">
                    <option value="">all</option>
                    <?php foreach($product_categories as $product_category): ?>
                    <option value="<?php echo $product_category->id ;?>"><?php echo $product_category->name;?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <label for="inputActive" class="col-sm-2">Active : </label>
            <div class="col-sm-2">
                <select class="custom-select" name="active" id="inputActive">
                    <option value="1">yes</option>
                    <option value="2">no</option>
                </select>
            </div>
        <button type="submit" class="btn btn-warning">Filter</button>
        </div>
    </form>
</div>
<br>
<table class="table table-hover" >
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <th><a href="<?php echo site_url('product/item?id='.$product->id); ?>"><?php echo $product->name; ?></a> </th>
            <th><?php echo $product->description ?></th>
            <th><?php echo $product->price; ?></th>
            <th><?php echo $product->stock; ?></th>
            <th <?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>  <!-- Si l'utilisateur n'est pas administrateur, on n'affiche pas les boutons d'administration -->
                <form action="<?php echo site_url('admin/product/update'); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                    <button type="submit" class="btn btn-success">update</button>
                </form>
            </th>
            <th <?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>
                <form action="<?php echo site_url('admin/product/'); echo ($product->active) ? 'disable' : 'enable'; ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                    <button type="submit" class="btn btn-danger"><?php echo ($product->active) ? 'disable' : 'enable' ; ?></button>
                </form>
            </th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo site_url('admin/product/create'); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" <?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>Create</a>
