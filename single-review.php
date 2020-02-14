<!--Hanna-->
<?php get_header(); ?>
<main class="Review">
    <section class="Review__Wrapper">
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
            <div class="Review__Item">
                <div class="Review__Item-Content">  
                    <a class="Review__Item-Link" href="<?php the_permalink(); ?>">
                        <h1 class="Review__Item-Title"><?php the_title(); ?></h1>
                    </a>
                    <ul class="Review__Meta">
                        <li class="Review__Meta-Item">
                            <i class="fa fa-calendar"></i> <?php the_time("j F, Y"); ?>
                        </li>
                        <li class="Review__Meta-Item">
                            <i class="fa fa-user"></i> <?php the_author_posts_link(); ?>
                        </li>
                        <li class="Review__Meta-Item">
                            <i class="fa fa-tag"></i> <?php the_category(', '); ?> 
                        </li>
                    </ul>
                    <img class="Review__Item-Image" src="<?php the_post_thumbnail_url(); ?>">
                    <p class="Review__Item-Text"><?php the_content(); ?></p>
                </div>            
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </section>
    <?php if(is_active_sidebar("sidebar-reviews")): ?>
        <aside class="Sidebar">
            <div class="Sidebar__Content"><?php dynamic_sidebar("sidebar-reviews"); ?></div>
        </aside>
    <?php endif; ?>
</main>
<?php get_footer(); ?>