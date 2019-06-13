<!--Tạo danh mục copy từ category-->
<!--Thay lại H1-->
<?php get_header() ?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

    	<h1 class="my-2 mb-4 page-header">
        Tìm kiếm:
        <small><?php the_search_query(); ?></small>
      </h1>

	      <!-- <h1 class="my-4">Page Heading
	        <small>Secondary Text</small>
	    </h1> -->

	    <!-- Blog Post Kiem tra post -->
	    <?php if ( have_posts() ) : ?>

	    	<?php while ( have_posts() ) : the_post(); ?>

	    		<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

	    	<?php endwhile; ?>

        <!--Nếu search k ra xuất hiện thông báo-->
      <?php else: ?>
        <p>
          Không có bài viết nào phù hợp với từ khóa: <strong><?php the_search_query(); ?></strong>
        </p>

        <form action="<?php bloginfo('url'); ?>/">     
          <div class="input-group">
            <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </form>

	    <?php endif; ?>



    <!-- Pagination -->
    <?php mini_blog_pagination() ?>

	</div>

    <?php get_sidebar() ?>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>