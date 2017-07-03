<table class="table table-hover" >
    <thead>
      <tr>
        <th>Category</th>
        <th>Stockable</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category): ?>
        <tr>
            <th><?php echo $category->name; ?> </th>
            <th><?php echo ($category->stockable) ? "Yes" : "No"; ; ?></th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo site_url('admin/category/create'); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" <?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>Create category</a>
