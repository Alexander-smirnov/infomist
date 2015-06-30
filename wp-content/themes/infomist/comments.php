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

    <br />
<?php if ('open' == $post->comment_status) : ?>
    <br />
    <div id="respond">
        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>

        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>Пожалуйста,  <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">зарегистрируйтесь </a> для комментирования.</p>
        <?php else : ?>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form">
                <span class="borders">
                    <textarea id="real-comment" name="comment" placeholder="Додати коментар"></textarea>
                </span>
                <?php if( function_exists('checkbot_show') ) { checkbot_show(); } ?>
                <p><input name="submit" type="submit" id="submit" tabindex="5" value="Надіслати" class="btn btn-success" />
                    <?php comment_id_fields(); ?>
                </p>
                <?php do_action('comment_form', $post->ID); ?>

            </form>
        <?php endif; // If registration required and not logged in ?>
    </div>

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



