<?php get_header(); ?>

<div class="content" id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="item">
		
		<div class="date"><?php the_date('d M Y'); ?></div>
		<a href="<?php the_permalink();?>">
		<h3><?php the_title();?></h3>
		</a>
		<div class="excerpt"><?php the_excerpt();?></div>
	</div>
	<div class="clear"></div>
<?php endwhile;?>
<div class="page-nav">
	<span class="older"><?php next_posts_link('&laquo; Önceki Yazılar') ?></span>
	<span class="newer"><?php previous_posts_link('Sonraki Yazılar &raquo;') ?></span>
</div><!-- end page-nav -->
<?php else: ?>
Sitede Henüz İçerik Bulunmuyor!
<?php endif; ?>
</div>
<?php get_footer(); ?>