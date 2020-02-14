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
                    <a class="Blog__Item-Link" href="<?php the_permalink(); ?>">
                        <h1 class="Blog__Item-Title"><?php the_title(); ?></h1>
                    </a>
                    <ul class="Blog__Meta">
                        <li class="Blog__Meta-Item">
                            <i class="fa fa-calendar"></i> <?php the_time("j F, Y"); ?>
                        </li>
                        <li class="Blog__Meta-Item">
                            <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                        </li>
                        <li class="Blog__Meta-Item">
                            <i class="fa fa-tag"></i> <?php the_category(', '); ?> 
                        </li>
                    </ul>
                        <p><?php the_content(); ?></p>
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