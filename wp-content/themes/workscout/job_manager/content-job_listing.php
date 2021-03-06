<?php global $post; 
$layout = Kirki::get_option( 'workscout','pp_job_list_logo_position', 'left' );?>


<li <?php job_listing_class($layout); ?> data-longitude="<?php echo esc_attr( $post->geolocation_long ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_lat ); ?>">
	<a href="<?php the_job_permalink(); ?>">
		<?php 
		($layout == 'left') ? the_company_logo() : the_company_logo('medium'); ?>
		<div class="job-list-content">
			<h4><?php the_title(); ?> 
			<?php if ( get_option( 'job_manager_enable_types' ) ) { 
					$types = get_the_terms( $post->ID, 'job_listing_type' );
					if ( $types && ! is_wp_error( $types ) ) : 
						foreach ( $types as $type ) { ?>
							<span class="job-type <?php echo sanitize_title( $type->slug ); ?>"><?php echo $type->name; ?></span>
					<?php }
					endif;?>
				<?php } ?>
			<?php if(workscout_newly_posted()) { echo '<span class="new_job">'.esc_html__('NEW','workscout').'</span>'; } ?> 
			</h4>

			<div class="job-icons">
				<?php do_action( 'workscout_job_listing_meta_start' ); ?>
				
				<?php $job_meta = Kirki::get_option( 'workscout','pp_meta_job_list',array('company','location','rate','salary') ); ?>
				
				<?php if (in_array("company", $job_meta) && get_the_company_name()) { ?>
					<span class="ws-meta-company-name"><i class="fa fa-briefcase"></i> <?php the_company_name();?></span>
				<?php } ?>
				
				<?php if (in_array("location", $job_meta)) { ?>
					<span class="ws-meta-job-location"><i class="fa fa-map-marker"></i> <?php ws_job_location( false ); ?></span>
				<?php } ?>
				
				<?php 
				$currency_position =  get_option('workscout_currency_position','before');

				$rate_min = get_post_meta( $post->ID, '_rate_min', true ); 
				if ( $rate_min && in_array("rate", $job_meta)) { 
					$rate_max = get_post_meta( $post->ID, '_rate_max', true );  ?>
					<span class="ws-meta-rate">
						<i class="fa fa-money"></i> <?php 
						if( $currency_position == 'before' ) { 
                            echo get_workscout_currency_symbol(); 
                        } 
						echo esc_html( $rate_min ); 
						if( $currency_position == 'after' ) { 
                            echo get_workscout_currency_symbol(); 
                        }
						if(!empty($rate_max)) { 
							echo '- ';
							if( $currency_position == 'before' ) { 
                                echo get_workscout_currency_symbol(); 
                            } 	
							echo $rate_max;
							if( $currency_position == 'after' ) { 
                                echo get_workscout_currency_symbol(); 
                            } 
						} ?> <?php esc_html_e('/ hour','workscout'); ?>
					</span>
				<?php } ?>

				<?php 
				$salary_min = get_post_meta( $post->ID, '_salary_min', true ); 
				$salary_max = get_post_meta( $post->ID, '_salary_max', true );
				if( in_array("salary", $job_meta) ) :
					if ( !empty($salary_min) || !empty($salary_max)  ) { ?>
						<span class="ws-meta-salary">
							<i class="fa fa-money"></i>
							<?php 
							if ( $salary_min ) { 
								if( $currency_position == 'before' ) { 
	                                echo get_workscout_currency_symbol(); 
	                            } 	
								echo esc_html( $salary_min ); 
								if( $currency_position == 'after' ) { 
	                                echo get_workscout_currency_symbol(); 
	                            }
							} 
							if($salary_max) { if ( $salary_min ) { echo '- '; } 
								if( $currency_position == 'before' ) { 
	                                echo get_workscout_currency_symbol(); 
	                            } 
								echo $salary_max;
								if( $currency_position == 'after' ) { 
	                                echo get_workscout_currency_symbol(); 
	                            }
							} ?>
						</span>
					<?php } 
				endif; ?>
				
				<?php if (in_array("date", $job_meta)) { ?>
					<span class="ws-meta-job-date"><i class="fa fa-calendar"></i> <?php the_job_publish_date() ?></span>
				<?php } ?>
								
				<?php if (in_array("deadline", $job_meta)) { ?>
					<?php 
					if ( $deadline = get_post_meta( $post->ID, '_application_deadline', true ) ) {
						$expiring_days = apply_filters( 'job_manager_application_deadline_expiring_days', 2 );
						$expiring = ( floor( ( time() - strtotime( $deadline ) ) / ( 60 * 60 * 24 ) ) >= $expiring_days );
						$expired  = ( floor( ( time() - strtotime( $deadline ) ) / ( 60 * 60 * 24 ) ) >= 0 );?>
						<span class="ws-meta-job-deadline"><i class="fa fa-calendar-times-o"></i> 
						<?php  echo  ( $expired ? __( 'Closed', 'workscout' ) : __( 'Closes', 'workscout' ) ) .': ' . date_i18n( get_option( 'date_format' ), strtotime( $deadline ) ) ?>
						</span>
				<?php } 
				}?>				

				<?php if (in_array("expires", $job_meta)) { ?>
					<span class="ws-meta-job-expires"><i class="fa fa-calendar-check-o"></i> 
					<?php esc_html_e( 'Expires', 'workscout' ) ?>:  <?php echo date_i18n( get_option( 'date_format' ), strtotime( get_post_meta( $post->ID, '_job_expires', true ) ) ) ?>
					</span>
				<?php } ?>
				
				<?php do_action( 'workscout_job_listing_meta_end' ); ?>
			</div>
			<div class="listing-desc"><?php the_excerpt(); ?>
				
			</div>
			
				
		</div>
	</a>
<div class="clearfix"></div>
</li>