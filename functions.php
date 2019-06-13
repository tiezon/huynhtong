<?php 
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	add_theme_support( 'post-thumbnails' ); 
	//blog
	add_image_size('blog-thumbnail',700, 350, true);
	//post anh xuat hien trong bai viet
	add_image_size('post-large',900, 600, true);
	//post anh xuat hien trong bai viet lien quan
	add_image_size('post-small',250, 200, true);

	//khai bao menu
	function register_my_menu() {
	  register_nav_menu('header-menu',__( 'Header Menu' )); // đặt tên là Header Menu
	}
	add_action( 'init', 'register_my_menu' );

	//widget
	function mini_blog_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'sidebar-mini' ),
        'id'            => 'sidebar-mini',
        'description'   => __( 'Ở đây sẽ chứa những widget của Mini Blog', 'sidebar-mini' ),
        'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="card-header">',
        'after_title'   => '</h5>',
    ) );
	}
	add_action( 'widgets_init', 'mini_blog_widgets_init' );

	//pagination
	function mini_blog_pagination() {
        global $wp_query;

        $pages = paginate_links( array(
                'format'        => '?paged=%#%',
                'current'       => max( 1, get_query_var('paged') ),
                'total'         => $wp_query->max_num_pages,
                'type'          => 'array',
                'prev_next'     => true,
                'prev_text'     => __('« Trước'),
                'next_text'     => __('Sau »'),
            )
        );

        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            $pagination = '<ul class="pagination justify-content-center mb-4">';
            foreach ( $pages as $page ) {
                $pagination .= "<li class='page-item'>$page</li>";
            }
            $pagination .= '</ul>';
        
            echo $pagination;
            
        }
    }


    //breadcumd
    function mini_blog_breadcrumbs() {
        if(!is_home()) {
            echo '<nav class="breadcrumb">';
                echo '<div class="container">';

                echo '<a class="breadcrumb-item" href="'.home_url('/').'">Trang chủ</a>';
                if (is_category() || is_single()) {

                    $categories = wp_get_post_terms( get_the_id(), 'category' );

                    if ( $categories ):
                        foreach ( $categories as $category ): ?>
                            <a href="<?php echo get_term_link( $category->term_id, 'category' ); ?>" class="breadcrumb-item"><?php echo $category->name; ?></a>
                        <?php endforeach;
                    endif;

                    if (is_single()) {
                        the_title('<span class="breadcrumb-item active">','</span>');
                    }
                } elseif (is_page()) {
                    the_title('<span class="breadcrumb-item active">','</span>');
                }
                echo '</div>';
            echo '</nav>';
        }
    }

// ham chuc nang bai viet lien quan
    function mini_blog_related_post($title = 'Bài viết liên quan', $count = 5) {

        global $post;
        $tag_ids = array();
        $current_cat = get_the_category($post->ID);
        $current_cat = $current_cat[0]->cat_ID;
        $this_cat = '';
        $tags = get_the_tags($post->ID);
        if ( $tags ) {
            foreach($tags as $tag) {
                $tag_ids[] = $tag->term_id;
            }
        } else {
            $this_cat = $current_cat;
        }

        $args = array(
            'post_type'   => get_post_type(),
            'numberposts' => $count,
            'orderby'     => 'rand',
            'tag__in'     => $tag_ids,
            'cat'         => $this_cat,
            'exclude'     => $post->ID
        );
        $related_posts = get_posts($args);

        if ( empty($related_posts) ) {
            $args['tag__in'] = '';
            $args['cat'] = $current_cat;
            $related_posts = get_posts($args);
        }
        if ( empty($related_posts) ) {
            return;
        }
        $post_list = '';
        foreach($related_posts as $related) {

            $post_list .= '<div class="media mb-4 ">';
              $post_list .= '<img class="mr-3 img-thumbnail" style="width: 150px" src="'.get_the_post_thumbnail_url($related->ID, 'post-small').'" alt="Generic placeholder image">';
                $post_list .= '<div class="media-body align-self-center">';
                    $post_list .= '<h5 class="mt-0"><a href="'.get_permalink($related->ID).'">'.$related->post_title.'</a></h5>';
                    $post_list .= get_the_category( $related->ID )[0]->cat_name;

              $post_list .= '</div>';
            $post_list .= '</div>';
        }

        return sprintf('
            <div class="card my-4">
                <h4 class="card-header">%s</h4>
                <div class="card-body">%s</div>
            </div>
        ', $title, $post_list );
    }
