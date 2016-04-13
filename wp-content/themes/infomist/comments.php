<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
        ?>

        <p class="nocomments">Введите пароль.</p>

        <?php
        return;
    }
}

/* This variable is for alternating comment background */
$oddcomment = '';
?>

<br/>
<?php if ('open' == $post->comment_status) : ?>
    <br/>
    <div id="respond">
        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>

        <?php if (get_option('comment_registration') && !$user_ID) : ?>
            <p>Пожалуйста, <a
                    href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">зарегистрируйтесь </a>
                для комментирования.</p>
        <?php else : ?>
            <!--            <form action="--><?php //echo get_option('siteurl'); ?><!--/wp-comments-post.php" method="post" class="form">-->
            <!---->
            <!--                <span class="borders">-->
            <!--                    <textarea id="real-comment" name="comment" placeholder="Додати коментар"></textarea>-->
            <!--                </span>-->
            <!---->
            <!--                <label for="author">Ваше ім'я*</label>-->
            <!--                    <input id="author" type="text" name="author" placeholder="Порошенко Петро">-->
            <!--                --><?php //if( function_exists('checkbot_show') ) { checkbot_show(); } ?>
            <!--                <p><input name="submit" type="submit" id="submit" tabindex="5" value="Надіслати" class="btn btn-success" />-->
            <!--                    --><?php //comment_id_fields(); ?>
            <!--                </p>-->
            <!--                --><?php //do_action('comment_form', $post->ID); ?>
            <!---->
            <!--            </form>-->
        <?php endif; // If registration required and not logged in ?>
    </div>
    <?php
    $args = array(
        'id_form' => 'commentform',
        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" placeholder="Додати коментар" required="required"></textarea></p>',
        'id_submit' => 'submit',
        'label_submit' => __('Надіслати', 'infomist'),
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'fields' => apply_filters('comment_form_default_fields', array(
            'author' => '<p class="comment-form-author"><span><input placeholder="' . __('Введіть ім\'я *', 'infomist') . '" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" ' . $aria_req . ' required="required" /></span></p>',
        )));


    comment_form($args); ?>
<?php endif; // if you delete this the sky will fall on your head ?>
<?php if ($comments) : ?>

    <div class="commentlist alert alert-success">
        <?php wp_list_comments('avatar_size=32'); ?>
    </div>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->

    <?php endif; ?>
<?php endif; ?>



