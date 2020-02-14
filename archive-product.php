<!-- Joakim -->
<?php get_header(); ?>
<div class="Hero Hero--Small" style="background-image: url('<?php the_field("archive_hero_image", "option"); ?>')">
    <h1 class="Hero__Title"><?php the_field("products_hero_title", "option"); ?></h1>
</div>
<main class="Product">
    <?php if(is_active_sidebar("sidebar-widget")): ?>
        <aside class="Sidebar">
            <div class="Sidebar__Content"><?php dynamic_sidebar("sidebar-widget"); ?></div>
        </aside>
    <?php endif; ?>
    <section class="Product__Wrapper">
        <div class="Product__Content">
            <?php if(have_posts("store_fields")): ?>
                <?php while(have_posts("store_fields", "store_list")): the_post(); ?>
                    <a class="Product__Link" href="<?php the_permalink(); ?>">
                        <div class="Product__Container">
                            <img class="Product__Image" src="<?php the_post_thumbnail_url(); ?>">
                            <h2 class="Product__Title"><?php the_title(); ?></h2>
                            <p class="Product__Price"><?php the_field("price"); ?></p>
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
            <!--Hanna-->
            <div class="Overlay" id="Overlay">
                <div class="Popup__Form">
                    <div class="Popup__Form-Cross" id="Cross">
                        <i class="fa fa-times"></i>
                    </div>
                    <div class="Popup__Form-Container">
                        <h1 class="Popup__Form-Title"><?php echo get_field("form_title", "option"); ?></h1>
                        <p class="Popup__Form-Text"><?php echo get_field("form_text", "option"); ?></p>
                        <div class="Popup__Form-Input">
                            <?php the_field("form", "options"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>