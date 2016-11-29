<?php get_header(); ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <div class="postTop">
	<div class="content">
	 <h1><?php the_title(); ?></h1>
	<div class="postTopbottom"><?php the_date(); ?> &middot; <a href="#">Sayfalar</a></div>
	</div>
 </div>
 

<div id="carrier">
	 <div class="content main-content">
	<?php the_content(); ?>
	</div>
</div><!--carrier-->
<div class="clear"></div>

<div class="yorum">
<?php comments_template(); ?>
</div>
<?php endwhile;?>
<?php else: ?>

<?php endif; ?>
<?php get_footer(); ?>