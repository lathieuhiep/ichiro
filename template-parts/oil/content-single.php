<div class="entry-content">
	<div class="row">
		<?php
		if ( have_posts() ) :
			while (have_posts()) :
				the_post();

				$model_number = rwmb_meta( 'ichiro_meta_box_oil_model_number' );
				$model_name = rwmb_meta( 'ichiro_meta_box_oil_model_name' );
				?>
				<div class="col-12 col-md-4">
					<figure class="post-thumbnail">
						<?php the_post_thumbnail('full'); ?>
					</figure>
				</div>

				<div class="col-12 col-md-8">
					<h2 class="post-title">
						<?php the_title(); ?>
					</h2>

					<div class="post-content">
						<div class="post-content__item">
							<span><?php esc_html_e('Số hiệu', 'oil'); ?></span>
							<span><?php echo esc_html( $model_number ); ?></span>
						</div>

						<div class="post-content__item">
							<span><?php esc_html_e('Loại dầu', 'oil'); ?></span>
							<span><?php echo esc_html( $model_name ); ?></span>
						</div>
					</div>

					<h2 class="heading-desc">
						<?php esc_html_e( 'Chi tiết', 'ichiro' ); ?>
					</h2>

					<div class="post-desc">
						<?php the_content(); ?>
					</div>
				</div>

			<?php
			endwhile;
		endif;
		?>
	</div>
</div>