<?php
/*
Template Name: Map Homepage
*/

get_header();



$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );



?>
<script>
	jQuery(document).ready(function(){
		//alert(jQuery("body").height());
		var height  = jQuery("body").height() - (jQuery("#main-header").height() + 18);
		jQuery("iframe").height(height);
	});
</script>
<style>
/*#page-container, #et-main-area, #et-main-area *{
	height:100%;
}*/
html, body
{
    height: 100%;
}

html{
  height: 100%;
}
body {
  min-height: 100%;
}
#map-full{
padding:0 !important;
overflow:hidden !important;
}

#map-full iframe{
display:block;
}
#map-full .et_pb_text{
	margin-bottom:0;
}
</style>


<div id="main-content">



<?php if ( ! $is_page_builder_used ) : ?>



	<div class="container">

		<div id="content-area" class="clearfix">

			<div id="left-area">



<?php endif; ?>



			<?php while ( have_posts() ) : the_post(); ?>



				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



				<?php if ( ! $is_page_builder_used ) : ?>



					<h1 class="main_title"><?php the_title(); ?></h1>

				<?php

					$thumb = '';



					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );



					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );

					$classtext = 'et_featured_image';

					$titletext = get_the_title();

					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );

					$thumb = $thumbnail["thumb"];



					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )

						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );

				?>



				<?php endif; ?>



					<div class="entry-content">

					<?php

						the_content();



						if ( ! $is_page_builder_used )

							wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Divi' ), 'after' => '</div>' ) );

					?>

					</div> <!-- .entry-content -->



				<?php

					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );

				?>



				</article> <!-- .et_pb_post -->



			<?php endwhile; ?>



<?php if ( ! $is_page_builder_used ) : ?>



			</div> <!-- #left-area -->



			<?php get_sidebar(); ?>

		</div> <!-- #content-area -->

	</div> <!-- .container -->



<?php endif; ?>



</div> <!-- #main-content -->



<?php get_footer('blank'); ?>