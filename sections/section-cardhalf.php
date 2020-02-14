<!--Hanna-->
<?php
    $reverseContent = get_sub_field("reverse_content");
?>
<section class="Cardhalf">
    <div class="Cardhalf__Wrapper">
        <div class="Cardhalf__Container">
            <?php if(!$reverseContent): ?>
                <img class="Cardhalf__Image" src="<?php the_sub_field("image"); ?>"/>
            <?php endif; ?>
                <div class="Cardhalf__Content">
                    <h1 class="Cardhalf__Title"><?php the_sub_field("title"); ?></h1>
                    <p class="Cardhalf__Text"><?php the_sub_field("text"); ?></p>
                </div>
            <?php if($reverseContent): ?>
                <img class="Cardhalf__Image" src="<?php the_sub_field("image"); ?>"/>
            <?php endif; ?>
        </div>
    </div>
</section>