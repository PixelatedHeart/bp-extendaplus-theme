<?php
/*
	Template Name: Tipos de usuario
*/
?>
<?php get_header() ?>
<?php

	global $wpdb;
	
	//Si no selecciona un número de usuarios, mostrará por defecto: 20
	if($_POST['cambiar_tipo_enviado'] == 'si'){
		$num = $_POST['reg_interno_num'];
	}else{
		$num = "LIMIT 20";
	}
	
	//El administrador ha pulsado "Guardar cambios", comprobamos que ha selaccionado correctamente todos los campos y modificamos el tipo de usuario
	if($_POST['guardar'] == 'si'){
		
		$usuario = $_POST['reg_interno_user'];
		$tipo = $_POST['reg_interno_tipo'];
		
		//echo 'tipo: '.$tipo.'<br />';
		
		//Se deben seeccionar los dos campos: el usuario y el nuevo tipo de usuario
		if(($tipo == 'ninguno') || ($usuario == 'ninguno')){
			$error = FALSE;
		}else{
			$error = $wpdb->query($wpdb->prepare("UPDATE wp_bp_xprofile_data SET value = '".$tipo."' WHERE user_id = '".$usuario."' AND field_id = '14'"));
		}
		
		//echo 'salida:'.$error.'.<br />';	
		//$tipo_usuario = $wpdb->get_row( "SELECT * FROM wp_bp_xprofile_data WHERE user_id = '".$usuario."' AND field_id = 14" );
		//echo 'u:'.$tipo_usuario->user_id.' - t:'.$tipo_usuario->value.'<br />';		
	}
?>
	<div id="content">
		<div class="padder">

		<?php do_action( 'bp_before_blog_page' ) ?>

		<div class="page" id="blog-page">
			
		<?php if(is_super_admin() || (bp_loggedin_user_id() == 3) ): ?>
						
					
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h2 class="pagetitle"><?php the_title(); ?></h2>

				<div class="post" id="post-<?php the_ID(); ?>">

					<div class="entry">
						
						<form name="extenda_cambio_tipo_usuario" method="post">
						
							<?php /*if(!$_POST['cambiar_tipo_enviado'] == 'si'): ?>
								
								<p>Escribe el <strong>user_login</strong> del usuario que deseas editar y/o consultar el Tipo de usuario y pulsa "Consultar"</p>
								<p><input type="text" name="reg_interno_user" value="<?php echo $_POST['reg_interno_user']; ?>"></p>
							
							<?php else: ?>
								
								<?php
									
								?>
								
								<p>Usuario:</p>
								<p><input type="text" name="reg_interno_user" value="<?php echo $_POST['reg_interno_user']; ?>"></p>
								
								<p>Tipo de usuario:</p>
								<p>
									<select name="reg_interno_tipo">
										<option value="Catédras" >Catédras</option>
										<option value="Empleados">Empleados</option>
										<option value="Oficinas">Oficinas</option>
										<option value="Becas">Becas</option>
										<option value="Empresa">Empresa</option>
										<option value="Profesional">Profesional</option>
									</select>
								</p>
								
							<?php endif; */ 
							
							if($_POST['guardar'] == 'si' && $error === FALSE){
								echo '<div style="color:#FFA200;background-color:#FFF9DB;border-color:#FFE8C4;padding:16px;margin-bottom:20px;">ERROR: debes seleccionar un usuario y un tipo de usuario, inténtalo de nuevo.</div>';
							}elseif($_POST['guardar'] == 'si'){
								echo '<div style="color:#FFA200;background-color:#FFF9DB;border-color:#FFE8C4;padding:16px;margin-bottom:20px;">El usuario se ha modificado con éxito: ID de usuario <strong>'.$usuario.'</strong> ahora es del tipo: <strong>'.$tipo.'</strong></div>';
							}
							?>
							
							<div style="background-color:#E6F0E8;border: 1px solid #127533;color:#127533;padding:16px;margin-bottom:18px;">
								<p style="color:red;">ESTA PÁGINA SÓLO ESTÁ VISIBLE PARA LOS ADMINISTRADORES DE LA RED</p>
								<p style="margin:0;">MODO DE USO:</p>
								<p style="margin:0;">1) Selecciona el número de usuarios ( Los usuarios se mostrarán por orden de registro, de más reciente a más antiguos )</p>
								<p style="margin:0;">2) Pulsa "Consultar"</p>
								<p style="margin:0;">3) Selecciona el usuario al que deseas modificar su tipo de usuario</p>
								<p style="margin:0;">4) Selecciona su nuevo tipo de usuario</p>
								<p style="margin:0;">5) Pulsa "Guardar cambios"</p>
								<p>6) Repite el proceso desde el punto 3) si quieres repetir la operación con otros usuarios</p>
							</div>
							
							
							<p>Número de usuarios a mostrar: 
								<select name="reg_interno_num"> 
									<option value="LIMIT 20" <?php if($num == "LIMIT 20") echo ' selected'; ?>>20</option>
									<option value="LIMIT 40" <?php if($num == "LIMIT 40") echo ' selected'; ?>>40</option>
									<option value="LIMIT 80" <?php if($num == "LIMIT 80") echo ' selected'; ?>>80</option>
									<option value="LIMIT 120" <?php if($num == "LIMIT 120") echo ' selected'; ?>>120</option>
									<option value="" <?php if($num == "") echo ' selected'; ?>>Todos</option>
								</select>
							</p>
														
							<?php
							if($_POST['cambiar_tipo_enviado'] == 'si'):
							
								$last_users = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->users ORDER BY ID DESC $num" ) );
							
								if ( $last_users )
								{
									
									?><p><select name="reg_interno_user">
								
										<option value="ninguno">Selecciona un usuario:</option>
										<?php foreach ( $last_users as $last_user )
										{	
											$user_id = $last_user->ID;
									
											//Guardamos en la variable el tipo de usuario
											$tipo_usuario = $wpdb->get_row( "SELECT * FROM wp_bp_xprofile_data WHERE user_id = $user_id AND field_id = 14" );
									
											?><option value="<?php echo $user_id; ?>">
												<?php echo 'ID: '.$user_id.' - Userlogin: <strong>'.$last_user->user_login.'</strong> - Nombre: '.$last_user->display_name.' - Tipo: <strong>' . $tipo_usuario->value.'</strong>'; ?>
											</option>
											<?php
										}
										?></select></p><?php
								}else{
									?><h2>No hay usuarios</h2><?php
								}							
								?>
						
								<p>Cambiar el Tipo del usuario seleccionado arriba por:
							
									<select name="reg_interno_tipo">
										<option value="ninguno">Selecciona el nuevo tipo de usuario</option>
										<option value="Catédras" >Catédras</option>
										<option value="Empleados">Empleados</option>
										<option value="Oficinas">Oficinas</option>
										<option value="Becas">Becas</option>
										<option value="Empresa">Empresa</option>
										<option value="Profesional">Profesional</option>
									</select>
								</p>
							
							<?php endif; //$_POST['cambiar_tipo_enviado'] == 'si' ?>
							
							<input type="hidden" name="cambiar_tipo_enviado" value="si">
							
							<?php 
							//Ha pulsado el botón de guardar cambios
							if($_POST['cambiar_tipo_enviado'] == 'si'): ?>
								<input type="hidden" name="guardar" value="si">
							<?php endif; ?>
							
							<br /><br />
							
							<?php if($_POST['cambiar_tipo_enviado'] == 'si'): ?>
								<p><input type="submit" value="Guardar cambios"></p>
							<?php else: ?>
								<p><input type="submit" value="Consultar"></p>
							<?php endif; ?>
						</form>
						
					</div>

				</div>

			<?php endwhile; endif; ?>
		
		
		<?php else: ?>
			
				<h2 class="pagetitle">Acceso prohibido</h2>

				<div class="post" id="post-<?php the_ID(); ?>">

					<div class="entry">
						<p>No tienes permisos para acceder a esta página.</p>
					</div>
				</div>
				
		
		<?php endif; ?>	
		
		</div><!-- .page -->

		<?php do_action( 'bp_after_blog_page' ) ?>

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php locate_template( array( 'sidebar.php' ), true ) ?>

<?php get_footer(); ?>