<div class="col-sm-6">
    <div class="media mb-3">
      <?php the_post_thumbnail('post-small',['class'=>'mr-3 post-small img-thumbnail']) ?>
      <div class="media-body">
        <h6 class="mt-0"><a href="<?php the_permalink() ?>"><?php echo wp_trim_words( get_the_title() , 12 ) ?></a></h6>
        <small><?php echo get_the_date() ?></small>
      </div>
    </div>
</div>