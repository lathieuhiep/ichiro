<?php
if ( !empty( $args['terms'] )  ) :
	$terms = $args['terms'];
	$term_ids = array();

	foreach( $terms as $term ) $term_ids[] = $term->term_id;

	$related_arg = array(
		'post_type'         =>  'oil',
		'post__not_in'      =>  array( $post->ID ),
		'posts_per_page'    =>  4,
		'tax_query' => array(
			array(
				'taxonomy' => 'oil_cat',
				'field'    => 'ids',
				'terms'    =>  $term_ids,
			),
		)
	);

	$related_query = new WP_Query( $related_arg );

	if ( $related_query->have_posts() ) :
	?>

		<div class="site-related-oil site-oli-products">
			<h2 class="title-related">
				<?php esc_html_e( 'Sản phẩm liên quan', 'ichiro' ); ?>
			</h2>

			<div class="row">
				<?php
				while ( $related_query->have_posts() ) :
					$related_query->the_post();

					$model_number = rwmb_meta( 'ichiro_meta_box_oil_model_number' );
					$model_name = rwmb_meta( 'ichiro_meta_box_oil_model_name' );
					?>

					<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-custom-mb">
						<div class="item">
							<figure class="item__thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('large'); ?>
								</a>
							</figure>

							<div class="item__content">
								<h2 class="model-number">
									<a href="<?php the_permalink(); ?>">
										<?php echo esc_html( $model_number ); ?>
									</a>
								</h2>

								<p class="modal-name">
									<a href="<?php the_permalink(); ?>">
										<?php echo esc_html( $model_name ); ?>
									</a>
								</p>
							</div>
						</div>
					</div>

				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>

	<?php
	endif;
endif;
?>