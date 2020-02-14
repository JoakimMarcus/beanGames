<!-- Bruna -->
<?php 
$items = get_sub_field('items'); 
?>
<div class="container-fluid faq-container">
    <h2 class="Faq__Title"><?php the_sub_field('title'); ?></h2>
    <p class="Faq__Text"><?php the_sub_field('description'); ?></p>
  <?php foreach ($items as $item):?>
    <button type="button" class="collapsible"><?php echo $item["question"];?></button>
    <div class="content">
      <p><?php echo $item["answer"];?></p>
    </div>
  <?php endforeach; ?> 
</div>