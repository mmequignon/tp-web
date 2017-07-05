<hr>
<table class="table table-hover" >
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <th><?php echo $user->firstname; ?> </th>
            <th><?php echo $user->lastname; ?></th>
            <th><?php echo $user->email; ?></th>
            <!-- Si l'utilisateur courant n'est pas admin, on n'affiche pas les boutons -->
            <th <?php echo ($admin == FALSE) ? 'style="display:none;"': '' ?> >
                <form action="<?php echo site_url('users/update'); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                    <button type="submit" class="btn btn-success" >update</button>
                </form>
            </th>
            <th <?php echo ($admin == FALSE) ? 'style="display:none;"': '' ?> >
                <form action="<?php echo site_url('admin/users/disable'); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>
<a href="<?php echo site_url('users/register'); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" <?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>Create User</a>
