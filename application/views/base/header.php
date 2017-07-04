<?php get_instance()->load->helper('url'); ?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/base.css">
</head>
<body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <!-- Si l'utilisateur n'est pas connecté, on n'affiche pas l'onglet basket ou celui des utlisateurs.
                         Si l'utilisateur est connecté, on ne propose plus de se connecter, mais de se déconnecter.
                         Si l'utilisateur est connecté mais n'est pas administrateur, alors il n'a pas accès à l'onglet des utilisateurs.-->
                    <li class="<?php echo ($page == 'users') ? "active" : "";  ?>"<?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>
                        <a href="<?php echo site_url('admin/users/liste');?>">Users</a>
                    </li>
                    <li class="<?php echo ($page == 'categories') ? "active" : "";  ?>"<?php echo ($admin == FALSE) ? 'style="display:none;"' : ''; ?>>
                        <a href="<?php echo site_url('admin/category/liste');?>">Categories</a>
                    </li>
                    <li class="<?php echo ($page == 'product')? "active" : ""; ?>">
                        <a href="<?php echo site_url('product/liste') ?>">Products</a>
                    </li>
                    <li class="<?php echo ($page == 'basket')? "active" : ""; ?>" <?php echo ($logged == FALSE) ? 'style="display:none;"' : ''; ?>>
                        <a href="<?php echo site_url('basket/liste'); ?>">Basket</a>
                    </li>
                    <li class="<?php echo ($page == 'account')? "active" : ""; ?>" <?php echo ($logged == FALSE) ? 'style="display:none;"' : ''; ?>>
                        <a href="<?php echo site_url('users/account') ?>">Account</a>
                    </li>
                    <li class="<?php echo ($page == 'invoice')? "active" : ""; ?>" <?php echo ($logged == FALSE) ? 'style="display:none;"' : ''; ?>>
                        <a href="<?php echo site_url('invoice/liste') ?>">Invoices</a>
                    </li>
                    <li class="<?php echo ($page == 'login')? "active" : ""; ?>" <?php echo ($logged == TRUE) ? 'style="display:none;"' : ''; ?> >
                        <a href="<?php echo site_url('users/login') ?>">Login</a>
                    </li>
                    <li <?php echo ($logged == FALSE) ? 'style="display:none;"' : ''; ?>>
                        <a href="<?php echo site_url('users/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <h1><?php echo $title; ?></h1>
