<?php get_header(); ?>
<main>
    <section>
    <?php if(have_rows("section")): ?>
        <?php while(have_rows("section")): the_row(); ?>
            <?php if(get_row_layout() == "slideshow"): ?>
                <?php get_template_part("./sections/section-slideshow"); ?>
            <?php elseif(get_row_layout() == "hero"): ?>
                <?php get_template_part("./sections/section-hero"); ?>
            <?php elseif(get_row_layout() == "cardhalf"): ?>
                <?php get_template_part("./sections/section-cardhalf"); ?>
            <?php elseif(get_row_layout() == "testimonials"): ?>
                <?php get_template_part("./sections/section-testimonial"); ?>
            <?php elseif(get_row_layout() == "promotionals"): ?>
                <?php get_template_part("./sections/section-promotional"); ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
                <div class="Blog__Items">
                    <img class="Blog__Items-Image" src="<?php the_post_thumbnail_url(); ?>">
                    <div class="Blog__Items-Content">
                        <a class="Blog__Items-Link" href="<?php the_permalink(); ?>">
                            <h2 class="Blog__Items-Title"><?php the_title(); ?></h2>
                        </a>
                        <ul class="Blog__Meta">
                            <li class="Blog__Meta-Item">
                                <i class="fa fa-calendar"></i> <?php the_time('j F, Y'); ?>
                            </li>
                            <li class="Blog__Meta-Item">
                                <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                            </li>
                            <li class="Blog__Meta-Item">
                                <i class="fa fa-tag"></i> <?php the_category(', '); ?>
                            </li>
                        </ul>
                        <?php the_excerpt(); ?>
                        <?php
                            $reviewID = get_the_ID();
                            $stars = get_field("rating", $reviewID);
                            $stars = intval($stars);
                            $loops = 0;
                        ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php
            the_posts_pagination([
                "screen_reader_text" => " ",
                "prev_text" => "Previous",
                "next_text" => "Next"
            ])
        ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer(); ?>