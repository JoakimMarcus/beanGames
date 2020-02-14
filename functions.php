<?php 
function get_my_scripts(){
    wp_enqueue_style("fontAwesome", get_stylesheet_directory_uri() . "/assets/CSS/font-awesome.css");
    wp_enqueue_style("owl", get_stylesheet_directory_uri() . "/assets/css/owl.carousel.min.css");
    wp_enqueue_style("owlTheme", get_stylesheet_directory_uri() . "/assets/css/owl.theme.default.min.css");
    wp_enqueue_style("slideshow", get_stylesheet_directory_uri() . "/assets/css/slideshow.css");
    wp_enqueue_style("style", get_stylesheet_directory_uri() . "/style.css");
    wp_enqueue_script("popup", get_template_directory_uri() . "/assets/js/popup.js", array("jquery"), false, true);
    wp_enqueue_script("jquery", get_template_directory_uri() . "/assets/js/jquery.js", array("jquery"), false, true);
    wp_enqueue_script("carousel", get_template_directory_uri() . "/assets/js/owl.carousel.min.js", array("jquery"), false, true);
    wp_enqueue_script("slide", get_template_directory_uri() . "/assets/js/slide.js", array("jquery"), false, true);
    wp_enqueue_script("scripts", get_template_directory_uri() . "/assets/js/script.js", array("jquery"), false, true);
}
add_action("wp_enqueue_scripts", "get_my_scripts");

if(function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "General settings",
        "menu_title" => "General settings",
        "menu_slug" => "general_settings"
    ]);
    acf_add_options_sub_page(array(
        'page_title' => 'Footer settings',
        'menu_title' => 'Footer'
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Header settings',
        'menu_title' => 'Header'
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Archive Reviews settings',
        'menu_title' => 'Archive Reviews'
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Archive Products settings',
        'menu_title' => 'Archive Products'
    ));
}

function register_my_menu(){
    register_nav_menus([
        "primary-menu" => "Primary Menu",
        "footer-menu" => "Footer Menu"
    ]);
}
add_action("init", "register_my_menu");

add_theme_support("post-thumbnails");
add_post_type_support("page", "excerpt");

/* Hanna */

function create_post_type(){
    register_post_type('review',
        [
        'supports' => array('title', 'editor', 'thumbnail', 'author'),
        'labels' => [
        'name' => 'Reviews',
        'singular_name' => 'Review',
        'add_new' => 'Add review'
        ],
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array('category')
        ]);
    register_post_type('product',
        [
        'supports' => array('title', 'editor', 'thumbnail', 'author'),
        'labels' => [
        'name' => 'Products',
        'singular_name' => 'Product',
        'add_new' => 'Add product'
        ],
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array('category')
        ]);
}
add_action('init', 'create_post_type');


/* Joakim */

remove_filter('the_content', 'wpautop');

function breadcrumbs(){
    global $post;
    $separator = " / ";
    $home = "Home";

    echo "<ul class='breadcrumbs'>";
    echo "<li>You are here: </li>";
    if(is_front_page()){
        echo "<li>" . $home . "</li>";
    } 

    if(is_home()){
        echo "<li>Blog</li>"; 
    } 

    if(is_page() && !is_front_page()){
        if(!empty($post->post_parent)){
            echo "<li>";
            echo "<a href=" . get_permalink($post->post_parent) . ">";
            echo get_the_title($post->post_parent);
            echo "</a>";
            echo "</li>";
            echo "<li>" . $separator . "</li>";
        }
        echo "<li>" . $post->post_title . "</li>";
    }
    if(is_singular("post") && !is_front_page() ){
        echo "<li>";
        echo "<a href=" . get_post_type_archive_link("post") . ">";
        echo "Blog";
        echo "</a>";
        echo "</li>";
        echo "<li>" . $separator . "</li>";
        if(!empty($post->post_parent)){
            echo "<li>";
            echo "<a href=" . get_permalink($post->post_parent) . ">";
            echo get_the_title($post->post_parent);
            echo "</a>";
            echo "</li>";
            echo "<li>" . $separator . "</li>";
        }
        echo "<li>" . $post->post_title . "</li>";
    }
    if(is_post_type_archive("review")) {
        echo "<li>";      
        echo "Reviews";
        echo "</li>";
    }
    if(is_singular("review")) {
        echo "<li>";      
        echo "<a href=" . get_post_type_archive_link("review") . ">";
        echo "Reviews";
        echo "</a>";
        echo "</li>";
        echo "<li>" . $separator . "</li>";
        echo "<li>" . $post->post_title . "</li>";
    }
    if(is_search() ) {
        echo "<li>" . $post->post_title . "</li>";
    }
    if(is_post_type_archive("product")) {
        echo "<li>";      
        echo "Store";
        echo "</li>";
    }
    if(is_singular("product")) {
        echo "<li>";      
        echo "<a href=" . get_post_type_archive_link("product") . ">";
        echo "Store";
        echo "</a>";
        echo "</li>";
        echo "<li>" . $separator . "</li>";
        echo "<li>" . $post->post_title . "</li>";
    }
    if(is_category()) {
        echo "<li>";      
        echo single_term_title();
        echo "</li>";
    }
    if(is_author()) {
        echo "<li>";      
        echo get_the_author_meta("display_name");
        echo "</li>";
    }
echo "</ul>";
}

/* Joakim */

/* Detta ändrar till en class = current-menu-item */
function add_current_nav_class($classes, $item) {
  // Getting the current post details
  global $post;
  // Make sure we're not on a single blog post before running the code...
  if ( !is_singular( 'post' ) ) {
    // Getting the post type of the current post
    $current_post_type = get_post_type_object(get_post_type($post->ID));
    $current_post_type_slug = $current_post_type->rewrite['slug'];
    // Getting the URL of the menu item
    $menu_slug = strtolower(trim($item->url));
    // If the menu item URL contains the current post types slug add the current-menu-item class
    if (strpos($menu_slug,$current_post_type_slug) !== false) {
      $classes[] = 'current-menu-item';
    }
    // as we are not on a single blog post, stop blog menu from highlighting
    else {
      $classes = array_diff( $classes, array( 'current_page_parent' ) );
    }
  }
  // Return the corrected set of classes to be added to the menu item
  return $classes;
}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );


/* Hanna */

function register_my_sidebar(){
    register_sidebar([
        "name" => "Sidebar widget",
        "id" => "sidebar-widget"
    ]);
    register_sidebar([
        "name" => "Sidebar Reviews",
        "id" => "sidebar-reviews"
    ]);
    register_sidebar([
        "name" => "Sidebar Blog",
        "id" => "sidebar-blog"
    ]);
}
add_action("widgets_init", "register_my_sidebar");

function wpsites_query( $query ) {
    if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
            $query->set( 'posts_per_page', 9 );
        }
    }
add_action('pre_get_posts', 'wpsites_query');

function cpt_items( $query ) {
    if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'review' ) ) {
    $query->set('posts_per_page', '5');
    $query->set('order', 'ASC');
        }
    }
add_action('pre_get_posts', 'cpt_items');

function example_cats_related_post() {
    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );
    if(!empty($categories) && is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;
    $current_post_type = get_post_type($post_id);
    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => ''
        );
    $related_cats_post = new WP_Query( $query_args );
    if($related_cats_post->have_posts()):
        while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            <ul>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <?php the_content(); ?>
                </li>
            </ul>
        <?php endwhile;
        wp_reset_postdata();
    endif;
}
function wpse241719_add_custom_types_to_category_archives($query) {
    if (!is_admin() && is_category() && $query->is_main_query()) {
        $query->set( 'post_type', array(
                    'post',
                    'review',
                    'product'
            ) );
    }
}
add_filter('pre_get_posts', 'wpse241719_add_custom_types_to_category_archives');

function wpse107459_add_cpt_author( $query) {
    if (!is_admin() && $query->is_author() && $query->is_main_query()) {
        $query->set( 'post_type', array('post', 'review'));
    }
}
add_action('pre_get_posts', 'wpse107459_add_cpt_author');

function add_cpt_to_recent_posts($args) {
    $args['post_type'] = array('post', 'my_CPT');
    return $args;
}
add_filter('widget_posts_args', 'add_cpt_to_recent_posts');
?>