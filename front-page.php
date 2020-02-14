<!--Joakim-->
<?php get_header(); ?>
<main class="Page-Home">
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
</main>
<?php get_footer(); ?>