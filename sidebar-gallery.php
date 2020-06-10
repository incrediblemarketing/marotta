<h4>More Cases</h4>
					<?php if ( have_posts() ) : ?>
						<div class="swiper--thumb-hidden"></div>
							<div class="swiper-container gallery--tax-thumbs">
								<div class="swiper-wrapper">
							<?php while ( have_posts() ) : ?>
								<?php the_post(); ?>
									<div class="swiper-slide" data-doc="<?php echo get_field( 'physician' ); ?>" data-age="<?php echo get_field( 'age' ); ?>" data-gender="<?php echo get_field( 'gender' ); ?>">
									<?php
										$gallery_images = get_field( 'gallery_images' );
										$counter_side   = 0;
									if ( $gallery_images ) :
										foreach ( $gallery_images as $image ) :
											if ( $counter_side < 2 ) :
												?>
													<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
												<?php endif; ?>
												<?php $counter_side++; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
								</div>
								<div class="swiper--nav">
									<div class="tax-next swiper-button-next"><i class="fal fa-long-arrow-right"></i></div>
									<div class="swiper-pagination"></div>
									<div class="tax-prev swiper-button-prev"><i class="fal fa-long-arrow-left"></i></div>
								</div>
							</div>
					<?php endif; ?>