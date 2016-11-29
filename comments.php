
<div class="clear"></div>
<div class="content">
			<h2>Comments</h2>
<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( have_comments() ) :
?>
	<ol class="commentlist"> <?php wp_list_comments( array( 'avatar_size' => '40', 'reply_text' => '<div class="icon answer"></div>', 'callback' => 'lettuceComments') ); ?></ol>
<?php
	if (get_option('page_comments')) :
		$comment_pages = paginate_comments_links('echo=0');
		if($comment_pages):
			echo '<div class="commentnavi"><span class="commentpages">'.$comment_pages.'</span></div>';
		endif;
	endif;
else : // if($comments)====this is displayed if there are no comments so far
	if ('open' == $post-> comment_status) :
		//If comments are open, but there are no comments.
	else : //got comments but now comments are closed
?>
		<p class="nocomments">Yoruma Kapalı.</p>
<?php
	endif;
endif;

if ('open' == $post-> comment_status) :
?>
		<div id="comments"></div>
	<span class="cancel-comment-reply"><small><?php cancel_comment_reply_link(); ?></small></span>
<?php
	if ( get_option('comment_registration') && !$user_ID ) :
		echo '<p>You must be <a href="'.wp_login_url(get_permalink()).'"> logged in</a> to post a comment.</p>';
	else :
?>
<div id="respond">
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php
		if (!$user_ID) :
?>
			<input type="text" name="author" id="author" placeholder="İsminiz?" value="<?php echo $comment_author; ?>" tabindex="1" />
			<input type="text" name="email" id="email" placeholder="E-posta Adresiniz?"value="<?php echo $comment_author_email; ?>" tabindex="2" />
<?php 	endif; ?>

			<textarea name="comment" id="comment" tabindex="3" placeholder=""></textarea>
			<input name="submit" type="submit" id="submit" tabindex="4" value="Gönder" />
			<div class="clear"></div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
		</div>
<?php
	endif;
endif;
?>
</div>
