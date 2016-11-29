<?php get_header(); ?>

<div class="archiveCarrier">
<div class="carrier">
<h1>404 - Sonuç Bulunamadı!</h1>
<p>Sayfa Bulunamadı, bu adresteki sayfa hiç olmadı, adresi değiştirildi yada silindi!</p>
<p>Aradığınız sayfa ve içerik halen internet sitesinde olabilir, bulabilmek için arama kutusunu kullanın veya ilginizi çekebilecek şu yazılara göz atın!</p>
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
<br>
<br>
</div><!--carrier-->
</div>


<?php get_footer(); ?>