<form action="<?php echo site_url('admin/product/create/save'); ?>" method="POST">
    <div class="form-group row">
        <label for="inputLogin" class="col-sm-2">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" id="inputName" placeholder="Enter Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPrice" class="col-sm-2">Price</label>
        <div class="col-sm-10">
            <input name="price" type="number" class="form-control" id="inputPrice" placeholder="Enter price" step="0.01">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputStock" class="col-sm-2">Stock</label>
        <div class="col-sm-10">
            <input name="stock" type="number" class="form-control" id="inputStock" placeholder="Enter stock">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputProductCategoryId" class="col-sm-2">Product category</label>
        <div class="col-sm-10">
            <select class="custom-select" name="product_category_id" id="inputProductCategoryId">
                <?php foreach($product_categories as $product_category): ?>
                <option value="<?php echo $product_category->id ;?>"><?php echo $product_category->name;?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputDescription" class="col-sm-2">Name</label>
        <div class="col-sm-10">
            <input name="description" type="text" class="form-control" id="inputDescription" placeholder="Enter description">
        </div>
    </div>
    <div class="form-group">
        <label for="inputDetail" class="col-sm-2">Comment</label>
        <div class="col-sm-10">
            <textarea name="detail" class="form-control" rows="5" id="inputDeltail" placeholder="Insert details about product"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-warning">Create</button>
    </div>
</form>
