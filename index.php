<?php

/*
Template Name: Homepage
*/

get_header();
?>
<section id="section-projects" class="projects">
    <h2 class="projects__heading"><?=__('Projects','mp')?></h2>
    <?php $posts = new WP_Query( ['posts_per_page' => 4, 'post_type' => 'project'] );
    $a=0;
    if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post();
    $a++;
    ?>
    <?php if($a%2==1):?>
        <div class="projects__wrapper wrapper--dark-bg">
            <div class="projects__wrapper--triangle-one">
            <article class="project__article">
                <figure class="project__figure project__figure--to-left">
                    <a href="<?php the_field('project_link_live');?>">
                        <img src="<?php the_field('project_image');?>" width="380" height="335" alt="Profile picture" />
                    </a>
                </figure>
                <div class="project__container project__container--to-left">
                    <h3 class="project__heading">
                        <a href="<?php the_field('project_link_live');?>">
                            <?php the_field('project_title');?>
                        </a>
                    </h3>
                    <p class="project__description">
                        <?php the_field('project_description');?>
                    </p>
                    <div class="project__links">
                        <a class="project__link-github" href="<?php the_field('project_github_link');?>">Github</a>
                        <a class="project__link-live" href="<?php the_field('project_link_live');?>"><?= __('View it Live','mp');?></a>
                    </div>
                </div>
            </article>
            </div>
        </div>
    <?php else: ?>
        <div class="projects__wrapper wrapper--light-bg">
            <div class="projects__wrapper--triangle-two">
            <article class="project__article">
                <div class="project__container">
                    <h3 class="project__heading">
                        <a href="<?php the_field('project_link_live');?>">
                            <?php the_field('project_title');?>
                        </a>
                    </h3>
                    <p class="project__description">
                        <?php the_field('project_description');?>
                    </p>
                    <div class="project__links">
                        <a class="project__link-github" href="<?php the_field('project_github_link');?>">Github</a>
                        <a class="project__link-live" href="<?php the_field('project_link_live');?>"><?= __('View Live','mp');?></a>
                    </div>
                </div>
                <figure class="project__figure">
                    <a href="<?php the_field('project_link_live');?>"><img src="<?php the_field('project_image');?>" width="380" height="335" alt="Profile picture" /></a>
                </figure>
            </article>
            </div>
        </div>
    <?php endif;?>
    <?php wp_reset_postdata(); ?>
<?php endwhile; endif; ?>
</section>
<section id="section-about" class="about">
    <div class="about__wrapper wrapper--dark-bg">
        <h2 class="about__heading">About</h2>
        <?php $posts = new WP_Query( ['post_type' =>'page', 'posts_per_page' => 1, 'page_id'=> 9] );?>
        <?php if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post();?>
        <article class="about__article">
            <div class="about__container">
                <h3 class="about__title">
                    <?php the_field('about_title');?>
                </h3>
                <?php the_field('about_content');?>
                <div class="about__tools">
                    <h3 class="about__tools-heading"><?= __('Tools I like','mp');?></h3>
                    <a class="about__tools--penp-icon" href="#"><?= __('Pen&Paper','mp')?></a>
                    <a class="about__tools--sketch-icon" href="https://www.sketchapp.com/">Sketch</a>
                    <a class="about__tools--atom-icon" href="https://atom.io/">Atom</a>
                    <a class="about__tools--sass-icon" href="http://sass-lang.com/">Sass</a>
                    <a class="about__tools--wordprs-icon" href="https://wordpress.org/">Wordpress</a>
                </div>
            </div>
            <div class="about__figure">
                <h3 class="about__name"><?php the_field('about_name');?></h3>
                <img src="<?php the_field('about_image');?>" width="317" height="428" alt="Profile picture" />
            </div>
        </article>
        <?php wp_reset_postdata(); ?>
    <?php endwhile; endif; ?>
</div>
</section>
<?php get_footer(); ?>
