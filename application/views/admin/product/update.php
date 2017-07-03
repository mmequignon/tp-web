<div class="alert alert-danger" <?php echo (validation_errors()) ? "" : 'style="display:none"'; ?>>
    <strong>Error !</strong><?php echo validation_errors(); ?>
</div>

<form action="<?php echo site_url('admin/product/update/save'); ?>" method="POST">
    <input name="id" type="hidden" value="<?php echo $id; ?>">
    <div class="form-group row">
        <label for="inputName">Name</label>
        <input name="name" type="text" class="form-control" id="inputName" placeholder="Enter Name" value="<?php echo $name; ?>">
    </div>
    <div class="form-group row">
        <label for="inputPrice">Price</label>
        <input name="price" type="number" class="form-control" id="inputPrice" placeholder="Enter price" step="0.01" value="<?php echo $price; ?>">
    </div>
    <div class="form-group row">
        <label for="inputStock">Stock</label>
        <input name="stock" type="number" class="form-control" id="inputStock" placeholder="Enter stock" value="<?php echo $stock; ?>">
    </div>
    <div class="form-group row">
        <label for="inputProductCategoryId">Product category</label>
        <select class="custom-select" name="product_category_id" id="inputProductCategoryId">
            <?php foreach($product_categories as $product_category): ?>
            <option <?php echo($product_category->id == $categ_id) ? "selected" : ""; ?> value="<?php echo $product_category->id ;?>"><?php echo $product_category->name;?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-warning">save</button>
    </div>
</form>
