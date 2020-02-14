<!--Hanna-->
<section class="Promotional">
    <div class="Promotional__Wrapper">
        <h1 class="Promotional__Title"><?php the_sub_field("title"); ?></h1>
        <?php $items = get_sub_field("items"); ?>
        <div class="Promotional-Item__Wrapper">
            <?php foreach($items as $item): ?>
                <div class="Promotional__Items">
                    <?php if($item["title"]): ?>
                        <h2 class="Promotional__Item-Title"><?php echo $item["title"]; ?></h2>
                    <?php endif; ?>
                    <?php if($item["sub_title"]): ?>
                        <h3 class="Promotional__Item-Subtitle"><?php echo $item["sub_title"]; ?></h3>
                    <?php endif; ?>
                    <?php if($item["image"]): ?>
                        <img class="Promotional__Image" src="<?php echo $item["image"]; ?>">
                    <?php endif; ?>
                    <?php if($item["text"]): ?>
                        <p class="Promotional__Text"><?php echo $item["text"]; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>