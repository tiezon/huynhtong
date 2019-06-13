<!--single.php, các hàm cần thiết trong một bài viết và viết hàm liệt kê những bài viết liên quan.-->
<!--Copy toàn bộ nội dung trong file index.php vào single.php xóa bỏ hàm phân trang mini_blog_pagination-->
<?php get_header() ?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <!-- <h1 class="my-4">Page Heading
        <small>Secondary Text</small>
      </h1> -->

      <!-- Blog Post Kiem tra post -->
      <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

          <?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>

        <?php endwhile; ?>

      <?php endif; ?>

      

    </div>

    <?php get_sidebar() ?>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<?php get_footer() ?>