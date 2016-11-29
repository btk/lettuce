
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
$cur_post_id = $post->ID;
$cat_array = get_the_category($cur_post_id);
$cat_rel_ID = $cat_array[0]->cat_ID;
$cat_rel_name = $cat_array[0]->cat_name; ?>

<div class="content">
		<h1><?php the_title(); ?></h1>
		<div class="desc">
				<div class="user">
						<img src="<?php echo bloginfo('template_directory'); ?>/img/avatar.png" />
						<div class="name">Elena White</div>
						<div class="title">Written 2 days ago &middot; 5 min read</div>
				</div>
				<div class="hot">
						<i class="material-icons">whatshot</i> <?php
						setPostViews($cur_post_id);
						echo getPostViews($cur_post_id); ?>
				</div>
		</div>
		<div class="clear"></div>
		<div class="thumbnail"><img src="<?php the_post_thumbnail_url(array(730,500)); ?>" /></div>
		<div class="typography">
				<?php the_content(); ?>
		</div>
		<div class="postNav">
				<div class="prev">
						<div class="post"><?php
$prev_post = get_previous_post();
if ( ! empty( $prev_post ) ){ ?>
		<div class="navTitle">
				<img src="<?php echo bloginfo('template_directory'); ?>/img/icon/left.svg"> Previous</div>
    <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
        <?php echo apply_filters( 'the_title', $prev_post->post_title ); ?>
    </a>
<?php } ?></div>
				</div>
				<div class="next">
						<div class="post"><?php
$next_post = get_next_post();
if ( ! empty( $next_post ) ){ ?>

			<div class="navTitle">Next <img src="<?php echo bloginfo('template_directory'); ?>/img/icon/right.svg"></div>
    <a href="<?php echo get_permalink( $next_post->ID ); ?>">
        <?php echo apply_filters( 'the_title', $next_post->post_title ); ?>
    </a>
<?php } ?></div>
				</div>
				<div class="clear"></div>
		</div>
</div>
<div class="board">
<?php comments_template(); ?>
</div>
<?php endwhile;?>
<?php else: ?>
Böyle bir içerik bulunmuyor!
<?php endif; ?>
<?php get_footer(); ?>
