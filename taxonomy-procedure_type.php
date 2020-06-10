<?php
$term    = get_queried_object();
$term_id = $term->term_id;

get_header();
?>
<div class="container page__gallery">
	<div class="row justify-content-center section__padding">
		<div class="col-12">
			<div class="breadcrumbs">
				<a href="/">Home</a> / <a href="/before-after/">Before & After</a> / <span><?php echo esc_attr( $term->name ); ?></span>
			</div>
			<h1><?php echo esc_attr( $term->name ); ?></h1>
			<div class="row gallery--area">
				<div class="col-xl-3">
					<div class="filters">
						<select name="doctors" id="doctors">
							<option value="0">Physician / Provider</option>
							<?php
							$field_key = 'field_5edeb4aa23511';
							$field     = get_field_object( $field_key );

							if ( $field ) :
								foreach ( $field['choices'] as $k => $v ) {
									?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php
								}
				endif;
							?>
						</select>
						<select name="age" id="age">
							<option value="0">Age</option>
							<?php
							$field_key = 'field_5edeb4b723512';
							$field     = get_field_object( $field_key );

							if ( $field ) :
								foreach ( $field['choices'] as $k => $v ) {
									?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php
								}
				endif;
							?>
						</select>
						<select name="gender" id="gender">
							<option value="0">Gender</option>
							<?php
							$field_key = 'field_5eded3fb23513';
							$field     = get_field_object( $field_key );

							if ( $field ) :
								foreach ( $field['choices'] as $k => $v ) {
									?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php
								}
				endif;
							?>
						</select>
					</div>
					
				</div>
				<div class="col-xl-9">
					<?php if ( have_posts() ) : ?>
						<?php $counter = 0; ?>
						<div class="swiper--hidden"></div>
						<div class="gallery--nav">
							<div class="swiper-pagination"></div>
							<?php get_template_part( 'components/swiper-nav' ); ?>
						</div>
						<div class="swiper-container gallery--tax-container">
							<div class="swiper-wrapper">
								<?php while ( have_posts() ) : ?>
									<?php the_post(); ?>
										<div class="swiper-slide">
										<?php
											$gallery_images = get_field( 'gallery_images' );
										if ( $gallery_images ) :
											?>
										<div class="swiper-container gallery-count gallery-container-<?php echo $counter; ?>" data-doc="<?php echo get_field( 'physician' ); ?>" data-age="<?php echo get_field( 'age' ); ?>" data-gender="<?php echo get_field( 'gender' ); ?>">
											<div class="swiper-wrapper">
											<?php foreach ( $gallery_images as $image ) : ?>
													<div class="swiper-slide">
														<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
														<div class="ba-box before">Before</div>
														<div class="ba-box after">After</div>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
										<div class="swiper-container gallery-thumb-<?php echo $counter; ?>">
											<div class="swiper-wrapper">
											<?php foreach ( $gallery_images as $image ) : ?>
													<div class="swiper-slide">
														<img src="<?php echo esc_url( $image['sizes']['gallery_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
													</div>
												<?php endforeach; ?>
											</div>
										</div>
											<?php endif; ?>
											<h3>Patient Details</h3>
											<?php the_content(); ?>
											</div>
									<?php $counter++; ?>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
