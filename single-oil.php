<?php
get_header();

$terms = get_the_terms( $post->ID , 'oil_cat' );
$term_id = $terms[0]->term_id;
?>

<div class="site-single-oil">
	<div class="advanced-header">
		<figure class="image-cate">
			<?php if (function_exists('z_taxonomy_image')) z_taxonomy_image( $term_id ); ?>
		</figure>

		<div class="advanced-header__content">
			<h1 class="title">
				<?php the_title(); ?>
			</h1>

			<div class="container">
				<?php if(function_exists('bcn_display')) : ?>
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php bcn_display(); ?>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>

	<div class="container">
		<?php
		get_template_part( 'template-parts/oil/content','single' );

		get_template_part( 'template-parts/oil/content','related', array(
			'terms' => $terms
		) );
		?>
	</div>
</div>

<?php
get_footer();
