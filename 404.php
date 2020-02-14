<!-- Hanna -->
<?php get_header(); ?>
<main class="Error">
    <div class="Error__Container">
        <h1 class="Error__Title"><?php the_field("error_title", "option"); ?></h1>
        <p class="Error__Text"><?php the_field("error_message", "option"); ?></p>
    </div>
</main>
<?php get_footer(); ?>