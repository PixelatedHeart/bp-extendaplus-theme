<?php 
	do_action( 'bp_before_member_header' );
	global $bp, $current_user, $displayed_user;
?>

<div id="item-header-content">

	<h2 class="fn">
		<a href="<?php bp_displayed_user_link() ?>"><?php bp_displayed_user_fullname() ?></a>
		 <span class="highlight">@<?php bp_displayed_user_username() ?> <span>?</span></span>
		<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ) ?></span>
		
			<?php 
				$mostrar_email = strip_tags(xprofile_get_field_data('Mostrar correo electrónico', $bp->displayed_user->id)); 
				if($mostrar_email == 'Sí'){
					echo '<span class="highlight">';
						echo esc_attr( $bp->displayed_user->userdata->user_email );
					echo '</span>';
				} 
			?>

	</h2>
	
	<?php if ( function_exists('xprofile_get_profile') ) : ?>

				<?php if ( bp_has_profile() ) : ?>

					<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

						<?php if ( bp_profile_group_has_fields() ) : ?>

							<?php do_action( 'bp_before_profile_field_content' ) ?>

							<div class="bp-widget users-fields <?php bp_the_profile_group_slug() ?>">
								<?php if ( 1 != bp_get_the_profile_group_id() ) : ?>
									<h4><?php bp_the_profile_group_name() ?></h4>
								<?php endif; ?>

								<p class="profile-data">
									<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

										<?php if ( bp_field_has_data() && (bp_get_the_profile_field_name() == 'Tipo' || bp_get_the_profile_field_name() == 'Nombre de la empresa' || bp_get_the_profile_field_name() == 'Cargo' || bp_get_the_profile_field_name() == 'Actividad de la empresa')) : ?>						
												<span class="label-profile-data"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-etiq.jpg" />
													<?php bp_the_profile_field_name() ?>
												</span>

												<span class="data-profile-data">
													<?php 
														$value = bp_get_the_profile_field_value();
														echo strip_tags($value);
													 ?>
												</span>										
										<?php endif; ?>

										<?php do_action( 'bp_profile_field_item' ) ?>

									<?php endwhile; ?>
								</p>
							</div>

							<?php do_action( 'bp_after_profile_field_content' ) ?>

						<?php endif; ?>
					<?php endwhile; ?>
					<?php do_action( 'bp_profile_field_buttons' ) ?>
				<?php endif; ?>
			
	<?php else : ?>

			<?php /* Just load the standard WP profile information, if BP extended profiles are not loaded. */ ?>
			<?php bp_core_get_wp_profile() ?>
			
	<?php endif; ?>


	<?php do_action( 'bp_before_member_header_meta' ) ?>

	<div id="item-meta">
		

		<div id="item-buttons">

			<?php do_action( 'bp_member_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php
		 /***
		  * If you'd like to show specific profile fields here use:
		  * bp_profile_field_data( 'field=About Me' ); -- Pass the name of the field
		  */
		?>

		<?php do_action( 'bp_profile_header_meta' ) ?>

	</div><!-- #item-meta -->

</div><!-- #item-header-content -->

<?php do_action( 'bp_after_member_header' ) ?>

<?php do_action( 'template_notices' ) ?>