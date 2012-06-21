<?php 
// Register the widget columns
register_sidebars( 1,
	array(
		'id' 			=> 'sidebar-izq',
		'name'          => 'Sidebar Izquierdo',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
	)
);
register_sidebars( 1,
	array(
		'id' 			=> 'sidebar-footer',
		'name'          => 'Sidebar Pie',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	)
);

//Funcionón para eliminar el widget de Publicación rápida del Escritorio
//para que los autores no puedan publicar en el blog de Extenda
//Y los menos útiles.
function quitar_widgets_dashboard() {

    global $wp_meta_boxes;

    // Pubicación rápida
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    // Plugins
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    // Blog de desarrollo de Wordpress
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    // Otras noticias de Wordpress
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    
}
add_action('wp_dashboard_setup', 'quitar_widgets_dashboard');



function bp_adminbar_inicio_menu() {
	global $bp; ?>

	<li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
		<a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()) ?>activity/friends/" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php _e( 'Home', 'buddypress' ) ?></a>
	</li>
	<?php
}

add_action( 'bp_adminbar_menus',  'bp_adminbar_inicio_menu', 1 );
remove_action( 'bp_adminbar_logo',  'bp_adminbar_logo' );
remove_action( 'bp_adminbar_menus', 'bp_adminbar_thisblog_menu',6 );
remove_action( 'bp_adminbar_menus', 'bp_adminbar_random_menu', 100 );


// Muestra los campos extra en la cabecera de los grupos
function display_group_header() {
		global $bp;
		
		$bpeg = new BPGE();
		remove_action('groups_custom_group_fields_editable', array($bpeg, 'edit_group_fields'));
		remove_action('groups_group_details_edited', array($bpeg, 'edit_group_fields_save'));
		
		$fields = $bpeg->get_all_fields($bp->groups->current_group->id);
		if (empty($fields))
			return false;
			
		echo '<div class="extra-data">';
			foreach($fields as $field){
				if ( $field->display != 1)
					continue;
					
				//echo '<h4 title="' . ( ! empty($field->desc)  ? esc_attr($field->desc) : '')  .'">' . $field->title .'</h4>';
				$data = groups_get_groupmeta($bp->groups->current_group->id, $field->slug);
				if ( is_array($data))
					$data = implode(', ', $data);
				//echo '<p>' . $data . '</p>';
				
				echo '<a class="group-link-to-blog" href="'.$data.'" target="_blank"><img class="image-group-link-to-blog" src="'.get_bloginfo('home').'/wp-content/themes/bp-extenda/images/ico-blogs.jpg" />'.$field->title.'</a>';
			}
		echo '</div>';
}

add_action( 'bp_before_group_header_meta',  'display_group_header');

//
//Función para mostrar el CIF del primer administrador del grupo en la cabecera del grupo
function extenda_group_cif_first_admin( $group = false ) {
	global $groups_template;

	if ( !$group )
		$group =& $groups_template->group;

	if ( $group->admins ) { 
		$i = 0; ?>
		
			<?php foreach( (array)$group->admins as $admin ) { ?>
					<?php if($i == 0){ 
					
						$cif = xprofile_get_field_data('CIF', $admin->user_id); ?>
						<span class="activity">
							<a href="<?php echo site_url(); ?>/members/?s=<?php echo $cif; ?>">
								<?php echo 'CIF: '.$cif; ?>
							</a>
						</span>
					
					<?php /* ?><a href="<?php echo bp_core_get_user_domain( $admin->user_id, $admin->user_nicename, $admin->user_login ) ?>"><?php echo bp_core_fetch_avatar( array( 'item_id' => $admin->user_id, 'email' => $admin->user_email ) ) ?></a>
					<?php */
						}
						$i++; 
					?>
			<?php } ?>
		
	<?php } else { ?>
		<span class="activity"><?php _e( 'Sin CIF asociado', 'buddypress' ) ?></span>
	<?php } ?>
<?php
}


?>