<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#ff8000">
    <meta name="theme-color" content="#ff8000">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header">
    <div class="container">
        <div class="header__wrap">
            <div class="header__logo">
                <?php show_custom_logo(); ?>
            </div>
            <?php
                if (has_nav_menu('header-menu')){
                    wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'container'      => 'nav',
                        'container_class' => 'header-menu',
                        'menu_class'     => 'header__list',
                    ]);
                }
            ?>
        </div>
    </div>
</header>