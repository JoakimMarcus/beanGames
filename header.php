<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo the_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body class="Body">
                                            <!-- Joakim -->
    <!-- Header start -->
    <header class="Wrapper">
        <img class="Header-Image" src="<?php the_field("logo", "option"); ?>">
    </header>
    <!-- Header end -->

    <!-- Nav start -->
    <nav class="Nav">
        <div class="Nav__Search">
            <?php get_search_form(); ?>
        </div>
        <?php $arguments = [
            "menu" => "primary-menu",
            "container" => ""
        ];
        $menuItems = wp_nav_menu($arguments);
        ?>
    </nav>
    <?php if(function_exists("breadcrumbs")): ?>
        <?php breadcrumbs(); ?>
    <?php endif; ?>
    <!-- Nav end -->