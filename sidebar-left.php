<?php 
	global $bp;
	do_action( 'bp_before_sidebar' ); 
?>

<div id="sidebar-left">
	<div class="padder">

	<?php do_action( 'bp_inside_before_sidebar' ) ?>
	
	<?php if ( is_user_logged_in() ) : ?>

			<?php do_action( 'bp_before_sidebar_me' ) ?>
		
		<?php if(bp_is_my_profile() || bp_is_front_page() || bp_is_page( BP_ACTIVITY_SLUG ) || bp_is_page( BP_GROUPS_SLUG ) || bp_is_page( 'foros/' ) || bp_is_page( BP_BLOGS_SLUG ) || bp_is_page( BP_MEMBERS_SLUG ) || bp_is_page('eventos') || is_page('encuestas') || is_bbpress() || is_page('nuestra-red-de-oficinas') || is_page('tutoriales') || is_page('tutorial-de-registro') || is_page('principales-funciones-extenda-plus') || is_page('editar-un-perfil-y-funciones-de-privacidad') || is_page('crearunblog') || is_page('publicacionenunblog') || is_page('crear-un-evento') || is_page('subir-una-foto') || is_page('tutorial-8-foros') || is_page('tutorial-9-inicio') || is_page('tutorial-10-muro') || is_page('tutorial-11-mensajes') || is_page('tutorial-12-chat') || is_page('tipos-de-usuario') || is_page('cuestionario') || is_single()): ?>
		
		<div id="sidebar-me">
			<a href="<?php echo bp_loggedin_user_domain() ?>">
				<?php bp_loggedin_user_avatar( 'type=thumb&width=40&height=40' ) ?>
			</a>

			<h4><?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?></h4>
			<a class="button logout" href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>"><?php _e( 'Cerrar sesión', 'buddypress' ) ?></a>

			<?php do_action( 'bp_sidebar_me' ) ?>
		</div>
		
		<div id="sidebar-izq-menus">
  
    			<div class="block-content">
        			<ul>
        				<li class="first"><a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()); echo BP_ACTIVITY_SLUG ?>/just-me/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-muro.jpg" />Muro</a></li>
						<li><a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()) ?>blogs/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-blog.jpg" />Blog</a></li>
						<li><a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()) ?>album/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-fotos.jpg" />Fotos</a></li>
						<li><a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()) ?>messages/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-mensaje.jpg" />Mensajes Privados</a></li>
					</ul>
				</div>
		</div> <!-- #sidebar-izq-grupos -->

			<?php do_action( 'bp_after_sidebar_me' ) ?>

		<?php if ( function_exists( 'bp_message_get_notices' ) ) : ?>
			<?php bp_message_get_notices(); /* Site wide notices to all users */ ?>
		<?php endif; ?>
		
		<?php else: ?>
		
		
		<div id="item-sidebar-avatar">
				<?php bp_displayed_user_avatar( 'type=full' ) ?>
			</div><!-- #item-header-avatar -->
			
			<div id="sidebar-izq-menus">
  
    			<div class="block-content">
        			<ul>
        				<li class="first"><a href="<?php echo bp_core_get_user_domain(bp_displayed_user_id()); echo BP_ACTIVITY_SLUG ?>/just-me/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-muro.jpg" />Muro</a></li>
						<li><a href="<?php echo bp_core_get_user_domain(bp_displayed_user_id()) ?>blogs/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-blog.jpg" />Blog</a></li>
						<li><a href="<?php echo bp_core_get_user_domain(bp_displayed_user_id()) ?>album/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-fotos.jpg" />Fotos</a></li>
						<li><a href="<?php echo wp_nonce_url( $bp->loggedin_user->domain . $bp->messages->slug . '/compose/?r=' . bp_core_get_username( $bp->displayed_user->user_id, $bp->displayed_user->userdata->user_nicename, $bp->displayed_user->userdata->user_login)); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-mensaje.jpg" />Mensajes Privados</a></li>
					</ul>
				</div>
			</div> <!-- #sidebar-izq-grupos -->	
		
		
		<?php endif; //End bp_is_my_profile() ?>
		
		
		
	<?php else : ?>

		<?php do_action( 'bp_before_sidebar_login_form' ) ?>
		
		<div class="login-or-register">
		
		<form name="login-form" id="sidebar-login-form" class="standard-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ) ?>" method="post">
			<label><?php _e( 'Username', 'buddypress' ) ?><span class="campo-obligatorio" title="Este campo es obligatorio.">*</span><br />
			<input type="text" name="log" id="sidebar-user-login" class="input" value="<?php echo esc_attr(stripslashes($user_login)); ?>" tabindex="97" /></label>

			<label><?php _e( 'Password', 'buddypress' ) ?><span class="campo-obligatorio" title="Este campo es obligatorio.">*</span><br />
			<input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" tabindex="98" /></label>

			<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" tabindex="99" /> <?php _e( 'Recuérdame', 'buddypress' ) ?></label></p>

			<?php do_action( 'bp_sidebar_login_form' ) ?>
			<input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e('Log In'); ?>" tabindex="100" />
			<input type="hidden" name="testcookie" value="1" />
		</form>
		
		<p id="login-text">
			<?php if ( bp_get_signup_allowed() ) : ?>
				<?php printf( __( '<a href="%s" title="Crear una cuenta nueva">Regístrate</a>', 'buddypress' ), site_url( BP_REGISTER_SLUG . '/' ) ) ?>
			<?php endif; ?>
			<br />
			<a href="<?php echo site_url() ?>/wp-login.php?action=lostpassword">¿Has olvidado tu contraseña?</a>
		</p>
		
		</div>
		
		<?php do_action( 'bp_after_sidebar_login_form' ) ?>

	<?php endif; ?>
	
	
	
	<?php //if ( is_user_logged_in() && !bp_is_my_profile() && !bp_is_front_page() && !bp_is_active( 'activity' )): ?>
	<?php //if ( is_user_logged_in() && !bp_is_my_profile() && !bp_is_front_page() ): ?>
					
	<?php //endif; ?>
	
	
	
	<?php if ( is_user_logged_in() ): ?>
	<div id="sidebar-izq-navegacion">
			<h2 class="sidebar-izq-navegacion-title">Navegación</h2>
  
    		<div class="block-content">
        		<ul>
        			<li class="first"><a href="<?php echo site_url() ?>/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-not16.jpg" />Noticias Extenda</a></li>
					<li><a href="<?php echo site_url() ?>/blogs/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-blogs.jpg" />Blogs</a></li>
					<li><a href="<?php echo site_url() ?>/foros/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-foro.jpg" />Foros</a></li>
					<li><a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-grupos.jpg" />Grupos</a></li>
					
					<li><a href="<?php echo site_url() ?>/eventos/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-eventos.jpg" />Eventos</a></li>
					<li><a href="<?php echo site_url() ?>/encuestas/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-encuestas.jpg" />Encuestas</a></li>
				</ul>
			</div>
		</div> <!-- #sidebar-izq-grupos -->
		
		
		
		<?php if(is_super_admin() || (bp_loggedin_user_id() == 3) ): ?>
			
			<div id="sidebar-izq-navegacion">
				<h2 class="sidebar-izq-navegacion-title">Sólo administradores</h2>
  
    			<div class="block-content">
        			<ul>
        			<li><a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-usu.jpg" />Usuarios</a></li>
        				<li class="first"><a href="<?php echo site_url() ?>/tipos-de-usuario/"><img src="<?php echo site_url(); ?>/wp-content/themes/bp-extenda/images/ico-usu.jpg" />Tipos de usuario</a></li>        			
        			</ul>	
        		</div>
        	</div>      			
			
		<?php endif; ?>
		
		
		
		<div id="sidebar-izq-grupos">
		<h2 class="sidebar-izq-grupos-title">Grupos destacados</h2>
  
    	<div class="block-content">
        	<ul>
					<li class="first"><a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/multisectorial/">Multisectorial</a></li>
					<li><a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/servicios/">Servicios</a></li>
					<li><a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/consumo/">Consumo</a></li>
					<li><a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/industria/">Industria y Tecnología</a></li>
					<li class="last"><a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/agroalimentario-1276421996/">Agroalimentario</a></li>
			</ul>
		</div>
		<div class="more-link"><a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/">más</a></div> 
	</div> <!-- #sidebar-izq-grupos -->
	
	<?php else: ?>
		
		<div id="sidebar-izq-grupos">
		<h2 class="sidebar-izq-grupos-title">Grupos destacados</h2>
  
    	<div class="block-content">
        	<ul>
				<li class="first"><a target="_blank" href="<?php echo site_url() ?>/multisectorial/">Multisectorial</a></li>
				<li><a target="_blank" href="<?php echo site_url() ?>/servicios/">Servicios</a></li>
				<li><a target="_blank" href="<?php echo site_url() ?>/consumo/">Consumo</a></li>
				<li><a target="_blank" href="<?php echo site_url() ?>/industria/">Industria y Tecnología</a></li>
				<li class="last"><a target="_blank" href="<?php echo site_url() ?>/agroalimentario/">Agroalimentario</a></li>
			</ul>
		</div>
	</div> <!-- #sidebar-izq-grupos -->
		
	<?php endif; ?>
	
	

	<?php dynamic_sidebar( 'sidebar-izq' ) ?>

	<?php do_action( 'bp_inside_after_sidebar' ) ?>

	</div><!-- .padder -->
</div><!-- #sidebar -->

<?php do_action( 'bp_after_sidebar' ) ?>