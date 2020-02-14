<!--Bruna-->
<?php ?>
<section class="columns text-center">
<div class="Container">
    <div class="row top">
        <div class="Container__Content">
            <h2><?php the_sub_field("title"); ?></h2>
        </div>
    </div>
    <?php $items = get_sub_field("items"); ?>
        <div class="row bottom">
            <?php foreach($items as $item): ?>
            <div class="Container__Items">
                        <i class="fa fa-<?php echo $item["icon"]; ?>"></i>
                    <h3><?php echo $item["title"]; ?></h3>
                    <p><?php echo $item["text"]; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
