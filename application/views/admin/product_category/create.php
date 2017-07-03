<?php echo validation_errors(); ?>

<form action="<?php echo site_url('admin/category/create/save'); ?>" method="POST">
    <div class="form-group row">
        <label for="inputLogin">Name</label>
        <input name="name" type="text" class="form-control" id="inputName" placeholder="Enter Name">
    </div>
    <div class="form-group row">
        
    </div>
    <div class="form-check row">
        <label for ="CheckStockable" class="form-check-label">Stockable</label>
        <input name="stockable" id="checkboxAdmin" class="form-check-input" type="checkbox" value="1" id="CheckStockable">
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-warning">Create</button>
    </div>
</form>
