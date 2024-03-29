<?php
    $comments_arg = array(
        'form'  => array(
            'class' => 'form-horizontal'
            ),
        'fields' => apply_filters( 'comment_form_default_fields', 
                array(
                    'author' => '<div class="form-group">'.
                                    '<label for="author">' . __( 'Họ và tên' ) . '</label> ' .
                                    '<input id="author" name="author" class="form-control" type="text"  size="30" />
                                </div>',

                    'email' => '<div class="form-group">'.
                                    '<label for="email">' . __( 'Email' ) . '</label> ' .
                                    '<input type="email" id="email" name="email" class="form-control" type="text" size="30" />
                                </div>',

                    'url'   => '<div class="form-group">'.
                                    '<label for="url">' . __( 'URL' ) . '</label> ' .
                                    '<input type="url" id="url" name="url" class="form-control" type="text" size="30" />
                                </div>' )
                ),
                'comment_field'         => '<div class="form-group">' . 
                                                '<label for="comment">' . __( 'Bình luận' ) . '</label><span>*</span>' .
                                                '<textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true"></textarea>' . 
                                            '</div>',
                'comment_notes_after'   => '',
                'title_reply'           => 'Bình luận của bạn',
                'title_reply_to'        => 'Trả lời bình luận của %s',
                'cancel_reply_link'     => '( Hủy )',
                'comment_notes_before'  => 'Địa chỉ email của bạn sẽ không công khai.',
                'class_submit'          => 'btn btn-primary',
                'label_submit'          => 'Gửi bình luận'
            ); 

    comment_form($comments_arg);
?>
    
<?php if ( have_comments() ) : ?>
    <div class="card my-4">
        <h5 class="card-header"><?php comments_number() ?></h5>
        <div class="card-body">
            <?php wp_list_comments(['callback' => 'mini_blog_comment']) ?>
        </div>
</div>
<?php endif; ?>