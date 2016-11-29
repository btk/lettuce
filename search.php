<?php get_header(); ?>
<div class="archiveCarrier">
<div class="carrier">
<?php if (have_posts()) : ?>
<h1><?php
		$post = $posts[0]; 
		if(is_category()){
			echo ''.single_cat_title('',FALSE).' Kategorisindeki Son Yazılar';
		}elseif(is_day()){
			echo ''.get_the_time('F jS, Y').' Arşivi';
		}elseif(is_month()){
			echo ''.get_the_time('F, Y').' Arşivi';
		}elseif(is_year()){
			echo ''.get_the_time('Y').' Arşivi';
		} elseif(is_search()){
			echo ucfirst(get_search_query()); echo ' Arama Sonuçları';
		}elseif(is_author()){
			echo 'Yazar Arşivi';
		}elseif(isset($_GET['paged']) && !empty($_GET['paged'])){ // If this is a paged archive
			echo 'Blog Arşivi';
		}elseif(is_tag()){
			echo ucfirst(single_tag_title('',FALSE)).' Arşivi';		
		}
		?></h1>
		<p>Fitekran.com'da bulunan <?php echo ucfirst(get_search_query());?> kelimesini içinde barındıran tüm yazılar yoğunluk sırasına göre listelenmiştir. <?php echo ucfirst(get_search_query());?> ile alakadar tüm medikal makaleleri görüntüleyebilirsiniz.</p>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="listPostItem categoryFirstItem box">
	<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url(array(730,300)); ?>"/></a>
	<a href="<?php the_permalink() ?>"><h5><?php the_title(); ?></h5></a>
	<div class="desc"><?php the_excerpt();?></div>
<div class="clear"></div>
	</div>
	<?php endwhile; ?>

<div class="page-nav">
<span class="older"><?php next_posts_link('&laquo; Önceki<div class="yazilar"> Yazılar</div>') ?></span><span class="newer"><?php previous_posts_link('Sonraki<div class="yazilar"> Yazılar</div> &raquo;') ?></span>
</div><!-- end page-nav -->
<br>
<div class="clear"></div>
<?php else :  // no results?>
<h1>Sonuç Bulunamadı!</h1>
<p>Aradığınız kelime, sitemizdeki hiç bir yazı içinde geçmiyor. Daha kısa bir arama terimi kullanmayı deneyin, ya da ilginizi çekebilecek şu yazılara göz atın!</p>
<div class="popularPostCarrier">
		<?php
		$args = array("numberposts" => 6);
		$postslist = get_posts( $args );
		foreach ( $postslist as $post ) :
		  setup_postdata( $post ); ?> 
			<div class="popularPostItem">
				<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url(array(200,100)); ?>"></a>
				<a href="<?php the_permalink() ?>"><h5><?php the_title(); ?></h5></a>   
				<div class="desc"><?php the_excerpt(); ?></div>
				<a href="<?php the_permalink() ?>"><div class="button postAction">Devamını Oku</div></a>
			</div>
		<?php
		endforeach; 
		wp_reset_postdata();
		?>
	<div class="clear"></div>
	</div>
<?php endif; ?>
<br>
<br>
</div><!--carrier-->
</div>
<?php get_footer(); ?>