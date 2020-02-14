<!-- Joakim -->
<footer class="Footer">
    <div class="Footer__Row-Over">
        <div class="Footer__Column">
            <h2 class="Footer__Title"><?php the_field("title", "options"); ?></h2>
            <?php $socialIcons = get_field("social_icon", "options"); ?>
            <?php foreach($socialIcons as $socialIcon): ?>
                <a class="Footer__Link" href="<?php echo $socialIcon['url']; ?>">
                    <i class="fa fa-<?php echo $socialIcon['social_icon_choice']; ?>"></i>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="Footer__Column">
            <?php the_field("column_2", "options"); ?>
            <?php $arguments = [
                "menu" => "footer-menu",
                "container" => "",
                "class" => "Footer__Link",
            ];
            $menuItems = wp_nav_menu($arguments);
            ?>
        </div>
        <div class="Footer__Column">
            <?php the_field("column_3", "options"); ?>
        </div>
    </div>
    <div class="Footer__Row-Under">
        <div class="Footer__Text">
            <?php the_field("copyright", "options"); ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>