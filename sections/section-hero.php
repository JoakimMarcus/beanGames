<!-- Hanna -->
<?php 
    $heroSize = get_sub_field("hero_size");
    $small = "false";
    $big = "";
    if($heroSize === ""){
        $big = "true";
    } else {
        $small = "true";
    }
?>
<div class="Hero <?php echo $heroSize; ?>" style="background-image: url('<?php the_sub_field("image"); ?>')">
    <h1 class="Hero__Title"><?php the_sub_field("title"); ?></h1>
</div>