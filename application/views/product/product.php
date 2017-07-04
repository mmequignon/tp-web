
<a href="<?php echo site_url('product/liste'); ?>">Back to products</a>
<br/>
<div class="row">
    <div class="col-sm-8">
        <img src="<?php echo base_url() ?>assets/pics/<?php echo $product->pic; ?>" class="img-responsive"></img>
    </div>
    <div class="col-sm-4">
        <form action="<?php echo site_url('product/item/addtobasket'); ?>" method="POST">
            <h3>Price : <?php echo $product->price; ?> €</h3>
            <input name="product_id" type="hidden" value="<?php echo $product->id; ?>">
            <input name="basket_id" type="hidden" value="<?php echo $basket_id; ?>">
            <?php if ($product->stock == 0 && $product->stockable): ?>
            <div class="form-group row">
                <p style="color: red;">Out of stock</p>
            </div>
            <?php elseif (! $product->stockable): ?>
            <div class="form-group row" <?php echo ($logged == FALSE) ? 'style="display:none;"' : ''; ?>>
                <label for="product_qty">Quantity</label>
                <select class="custom-select" name="product_qty" id="inputProductCategoryId">
                    <?php for( $i = 0; $i <= 5; $i++) : ?>
                    <option <?php echo($i == 0 ) ? "selected" : ""; ?> value="<?php echo $i ;?>"><?php echo $i ;?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <?php else: ?>
            <div class="form-group row" <?php echo ($logged == FALSE) ? 'style="display:none;"' : ''; ?>>
                    <label for="product_qty" class="col-sm-2">Quantity</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="product_qty" id="inputProductCategoryId">
                            <?php for( $i = 0; $i <= $product->stock; $i++) : ?>
                            <option <?php echo($i == 0 ) ? "selected" : ""; ?> value="<?php echo $i ;?>"><?php echo $i ;?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="alert alert-warning row" <?php echo (validation_errors()) ? "" : 'style="display:none"'; ?>>
                <strong>Notice !</strong><?php echo validation_errors(); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-warning" <?php echo ($logged == FALSE) ? 'style="display:none;"' : ''; ?>>Add to cart</button>
                </div>
            </div>
            <h3><?php echo $product->description; ?></h3>
            <p><?php echo $product->detail; ?></p>
        </form>
        <form action="<?php echo site_url('admin/product/update'); ?>" method="POST" <?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>
            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
            <button type="submit" class="btn btn-success">update</button>
        </form>
    </div>
</div>
