<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>
        <?php wp_title('|', true, 'right') . bloginfo('name'); ?>
    </title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/styles.css';?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri() . '/script/html5shiv.js';?>"></script>
    <![endif]-->
</head>
<body>
    <main>
        <div class="wrapper">
            <?php $posts = new WP_Query( ['post_type' =>'page', 'posts_per_page' => 1, 'page_id'=> 5] );
            if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post();
            ?>
            <header>
                <nav class="main-nav">
                    <h1 class="logo">Main navigation</h1>
                    <ul class="main-nav__list">
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-home" href="#">Home</a>
                        </li>
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-projects" href="#section-projects">Projects</a>
                        </li>
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-about" href="#section-about">About</a>
                        </li>
                        <li class="main-nav__elt">
                            <a class="main-nav__link main-nav__link--icon-contact" href="#section-contact">Contact</a>
                        </li>
                    </ul>
                </nav>
                <div class="media" style="background:url(<?php the_field('home_page_image');?>) no-repeat center center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php the_field('home_page_image');?>',sizingMethod='scale');-ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php the_field('home_page_image');?>', sizingMethod='scale')"; display: block; max-width: 100%; min-height:330px;">
                    <div class="phrase">
                        <p class="phrase__content"><?php the_field('home_page_phrase');?></p>
                        <a class="bouton__callout" href="#section-contact"> Put me to work</a>
                    </div>
                </div>
            </header>
        <?php wp_reset_postdata(); ?>
        <?php endwhile; endif; ?>
