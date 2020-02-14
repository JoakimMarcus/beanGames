<!--Jocke-->
<?php get_header(); ?>
<main class="Blog">
    <section class="Blog__Wrapper">
        <?php 
            if (is_author()) {
                echo get_the_author_meta("display_name");
            } else {
                echo single_term_title();
            }
        ?>
        </h1>
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
            <div class="Blog__Item">
                <img class="Blog__Item-Image" src="<?php the_post_thumbnail_url(); ?>">
                <div class="Blog__Item-Content">  
                    <h1 class="Blog__Item-Title"><?php the_title(); ?></h1>
                    <p class="Product__Price"><?php the_field("price"); ?></p>
                    <p class="Product__Text"><?php the_content(); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>