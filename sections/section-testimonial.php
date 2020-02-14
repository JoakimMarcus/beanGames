<!--Hanna-->
<?php
    $backgroundColor = get_sub_field("background_color");
    if($backgroundColor !== '') {
        $backgroundColor = "Testimonial--" . $backgroundColor;
    }
    $buttonChoice = get_sub_field("button_choice");
?>
<section class="Testimonial <?php echo $backgroundColor; ?>">
    <div class="Testimonial__Wrapper">
        <h2 class="Testimonial__Title"><?php the_sub_field("title"); ?></h1>
        <?php if($buttonChoice): ?>
            <div class="Testimonial__Button-Container">
                <a href="<?php the_sub_field("button_link"); ?>" class="Testimonial__Button"><?php the_sub_field("button_text"); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>