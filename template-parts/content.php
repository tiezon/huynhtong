<!-- Blog Post -->
<div class="card mb-4">
  <?php the_post_thumbnail('blog-thumbnail',  ['class' => 'card-img-top' ]) ?>
  <div class="card-body">
    <h2 class="card-title"><?php the_title() ?></h2>
    <p class="card-text"><?php the_excerpt() ?></p>
    <a href="<?php the_permalink() ?>" class="btn btn-primary">Read More &rarr;</a>
  </div>
  <div class="card-footer text-muted">
    Posted on <?php echo get_the_date() ?> by
    <a href="#"><?php the_author() ?></a>
  </div>
</div>