<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
//////////FRONT_PAGE.PHP TEST/////////////

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.

/* The 2nd Query (without global var) */
$args2 = array( 'category_name' => 'evenements' );
$query2 = new WP_Query( $args2 );

if ( $query2->have_posts() ) {
	// The 2nd Loop
	?>
	<div class="wrapper2">
	<?php
	while ( $query2->have_posts() ) {
		$query2->the_post();
		//echo '<li>' . get_the_title( $query2->post->ID ) . '</li>';
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
	?>
	</div>
	<?php

	// Restore original Post Data
	wp_reset_postdata();
}
			?>

		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
