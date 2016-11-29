<?php get_header(); ?>
<?php if (have_posts()) : ?>
<div class="content" id="content">
<h1><?php
		$post = $posts[0]; 
		if(is_category()){
			echo ''.single_cat_title('',FALSE).' Kategorisi';
		}elseif(is_day()){
			echo ''.get_the_time('F jS, Y').' Arşivi';
		}elseif(is_month()){
			echo ''.get_the_time('F, Y').' Arşivi';
		}elseif(is_year()){
			echo ''.get_the_time('Y').' Arşivi';
		} elseif(is_search()){
			echo 'Arama Sonuçları';
		}elseif(is_author()){
			echo 'Yazar Arşivi';
		}elseif(isset($_GET['paged']) && !empty($_GET['paged'])){ // If this is a paged archive
			echo 'Blog Arşivi';
		}elseif(is_tag()){
			echo ucfirst(single_tag_title('',FALSE)).' Arşivi';		
		}
		?></h1>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="item">
		
		<div class="date"><?php the_date('d M Y'); ?></div>
		<a href="<?php the_permalink();?>">
		<h3><?php the_title();?></h3>
		</a>
		<div class="excerpt"><?php the_excerpt();?></div>
	</div>
	<div class="clear"></div>
	<?php endwhile; ?>

<div class="page-nav">
	<span class="older"><?php next_posts_link('&laquo; Önceki Yazılar') ?></span>
	<span class="newer"><?php previous_posts_link('Sonraki Yazılar &raquo;') ?></span>
</div><!-- end page-nav -->
<div class="clear"></div>
<?php else :  // no results?>
	Sonuç Bulunamadı!
<?php endif; ?>
</div><!--content-->
<?php get_footer(); ?>