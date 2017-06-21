<footer id="section-contact" class="contact">
    <div class="contact__wrapper wrapper--light-bg">
        <?php $posts = new WP_Query( ['post_type' =>'page', 'posts_per_page' => 1, 'page_id'=> 11] );?>
        <?php if ( $posts->have_posts() ): while ( $posts->have_posts() ): $posts->the_post();
        ?>
        <article class="contact__article">
            <h2 class="contact__heading">Contact</h2>
            <?php the_field('contact_content');?>
            <div class="contact__container" style="background:url(<?php the_field('contact_image');?>)">
                <?php wp_reset_postdata(); ?>
            <?php endwhile; endif; ?>
            <?php echo do_shortcode( '[contact-form-7 id="28" title="keep in touch with me"]' ); ?>
        </div>
    </article>
</div>
</footer>
</div>
</main>
</body>
</html>
