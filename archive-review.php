<!-- Hanna -->
<?php get_header(); ?>
<div class="Hero Hero--Small" style="background-image: url('<?php the_field("archive_hero_image", "option"); ?>')">
    <h1 class="Hero__Title"><?php the_field("reviews_hero_title", "option"); ?></h1>
</div>
<main class="Reviews">
    <section class="Reviews__Wrapper">
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
                <div class="Reviews__Item">
                    <img class="Reviews__Item-Image" src="<?php the_post_thumbnail_url(); ?>">
                    <div class="Reviews__Item-Content">
                        <a class="Reviews__Item-Link" href="<?php the_permalink(); ?>">
                            <h2 class="Reviews__Item-Title"><?php the_title(); ?></h2>
                        </a>
                        <ul class="Reviews__Meta">
                            <li class="Reviews__Meta-Item">
                                <i class="fa fa-calendar"></i> <?php the_time('j F, Y'); ?>
                            </li>
                            <li class="Reviews__Meta-Item">
                                <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                            </li>
                            <li class="Reviews__Meta-Item">
                                <i class="fa fa-tag"></i> <?php the_category(', '); ?>
                            </li>
                        </ul>
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
    <?php if(is_active_sidebar("sidebar-reviews")): ?>
        <aside class="Sidebar">
            <div class="Sidebar__Content"><?php dynamic_sidebar("sidebar-reviews"); ?></div>
        </aside>
    <?php endif; ?>
</main>
<?php get_footer(); ?>