<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title('|', true, 'right') . bloginfo('name'); ?>
    </title>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/assets/css/styles.css';?>">
</head>
<body>
    <main>
        <div class="wrapper">
            <h1 class="hidden"><?php bloginfo('name');?></h1>
            <?php $posts = new WP_Query( ['post_type' =>'page', 'posts_per_page' => 1, 'page_id'=> 5] );
            if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post();
            ?>
            <header>
                <nav class="main-nav">
                    <h2 class="hidden"><?= __('Main navigation','mp');?></h2>
                    <ul class="main-nav__list">
                        <li class="main-nav__logo"><a href="#">Martinz</a></li>
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-home" href="#"><?= __('Home','mp')?></a>
                        </li>
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-projects" href="#section-projects"><?= __('Projects','mp')?></a>
                        </li>
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-about" href="#section-about"><?=__('About','mp')?></a>
                        </li>
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-contact" href="#section-contact"><?=__('Contact','mp');?></a>
                        </li>
                    </ul>
                </nav>
                <div class="media" style="background:url(<?php the_field('home_page_image');?>) no-repeat center center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover; display: block; max-width: 100%; min-height:330px;">
                    <div class="phrase">
                        <p class="phrase__content"><?php the_field('home_page_phrase');?></p>
                        <a class="bouton__callout" href="#section-contact"><?= __('Put me to work','mp');?></a>
                    </div>
                </div>
            </header>
            <?php wp_reset_postdata(); ?>
        <?php endwhile; endif; ?>
