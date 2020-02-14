<!-- Jocke -->
<?php 
$items = get_sub_field("slideshow");
?>
<section class="Slideshow">
    <div class="Slideshow__Container">
        <div class="Slideshow__Items" data-autoplay="true" data-singleitem="true">
            <?php foreach($items as $item): ?> 
                <div class="Slideshow__Image" style="background-image: url('<?php echo $item["image_slideshow"]; ?>')"></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>