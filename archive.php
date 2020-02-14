<!-- Joakim -->
<?php get_header(); ?>
<main class="Blog">
    <section class="Blog__Wrapper">
        <h1 class="Blog__Title">
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
                        <?php if($stars > 0): ?>
                            <div class="Rating">
                                <h3 class="Rating__Title">Score</h3>
                                <div class="Rating__Stars">
                                <?php while($loops < $stars): ?>
                                    <i class="fa fa-star"></i>
                                    <?php $loops++; ?>
                                <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
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