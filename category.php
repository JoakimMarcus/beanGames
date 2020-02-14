<!-- Joakim -->
<?php get_header(); ?>
<main class="Product">
    <?php if(is_active_sidebar("sidebar-widget")): ?>
        <aside class="Sidebar">
            <div class="Sidebar__Content"><?php dynamic_sidebar("sidebar-widget"); ?></div>
        </aside>
    <?php endif; ?>
    <section class="Category__Wrapper">
        <h1 class="Category__Title"><?php single_term_title(); ?></h1>
        <div class="Category__Content">
            <?php if(have_posts("store_fields")): ?>
                <?php while(have_posts("store_fields", "store_list")): the_post(); ?>
                    <a class="Category__Link" href="<?php the_permalink(); ?>">
                        <div class="Category__Container">
                            <img class="Category__Image" src="<?php the_post_thumbnail_url(); ?>">
                            <h2 class="Category__Container-Title"><?php the_title(); ?></h2>
                            <p class="Category__Price"><?php the_field("price"); ?></p>
                        </div>
                    </a>
                <?php endwhile; ?>
                <?php
                    the_posts_pagination([
                        "screen_reader_text" => " ",
                        "prev_text" => "Previous",
                        "next_text" => "Next"
                    ])
                ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>