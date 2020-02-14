<!--Bruna-->
<?php
 /* Template Name: Template Contact Page */
?>
<?php get_header(); ?>

<?php if(have_rows("section")): ?>
	<?php while(have_rows("section")): the_row(); ?>
		<?php if(get_row_layout() == "slideshow"): ?>
			<?php get_template_part("./sections/section-slideshow"); ?>
		<?php elseif(get_row_layout() == "hero"): ?>
			<?php get_template_part("./sections/section-hero"); ?>
		<?php elseif(get_row_layout() == "columns"): ?>
			<?php get_template_part("./sections/section-columns"); ?>
		<?php elseif(get_row_layout() == "testimonials"): ?>
			<?php get_template_part("./sections/section-testimonial"); ?>
		<?php elseif(get_row_layout() == "promotionals"): ?>
			<?php get_template_part("./sections/section-promotional"); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
<iframe class="googlemap" style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2003.6500541753085!2d17.648155515922113!3d59.854951681845854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465fcbfc0c408b33%3A0x5be858ef69b96cb9!2sKungsgatan%2C%20Uppsala!5e0!3m2!1spt-BR!2sse!4v1570618379847!5m2!1spt-BR!2sse" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
<section class="Contact">
    <div class="Contact__Wrapper">
        <div class="Contact__Content">
            <h1 class="Contact__Title"><?php the_field("title"); ?></h1>
                <?php the_field("column_1"); ?> 
        </div>
    </div>
</section>
<?php get_footer(); ?>