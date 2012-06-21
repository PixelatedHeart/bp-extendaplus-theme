<?php do_action( 'bp_before_sidebar' ) ?>

<div id="sidebar">
	<div class="padder">
	
	<div class="sidebar-logo-extenda">		
		<a href="http://www.extenda.es" target="_blank"><img alt="Extenda" src="<?php echo site_url() ?>/wp-content/uploads/2011/08/web_extenda.jpg" /></a>
		<a href="http://www.juntadeandalucia.es" target="_blank"><img class="margin16" alt="Junta de Andalucía" src="<?php echo site_url() ?>/wp-content/uploads/2011/09/logo-JUNTA178.jpg" /></a>	
	</div>
	
	<div class="bloque-sidebar">
		
		<div class="sidebar-bloque">
		<!-- GTranslate: http://edo.webmaster.am/gtranslate -->
		<h2 class="sidebar-title">Google Translate</h2>
<a href="javascript:doGTranslate('es|en')" title="English" class="gflag" style="background-position:-0px -0px;"><img src="http://extendaplus.bachpress.com/wp-content/plugins/gtranslate/blank.png" height="16" width="16" alt="English" /></a><a href="javascript:doGTranslate('es|fr')" title="French" class="gflag" style="background-position:-200px -100px;"><img src="http://extendaplus.bachpress.com/wp-content/plugins/gtranslate/blank.png" height="16" width="16" alt="French" /></a><a href="javascript:doGTranslate('es|de')" title="German" class="gflag" style="background-position:-300px -100px;"><img src="http://extendaplus.bachpress.com/wp-content/plugins/gtranslate/blank.png" height="16" width="16" alt="German" /></a><a href="javascript:doGTranslate('es|it')" title="Italian" class="gflag" style="background-position:-600px -100px;"><img src="http://extendaplus.bachpress.com/wp-content/plugins/gtranslate/blank.png" height="16" width="16" alt="Italian" /></a><a href="javascript:doGTranslate('es|pt')" title="Portuguese" class="gflag" style="background-position:-300px -200px;"><img src="http://extendaplus.bachpress.com/wp-content/plugins/gtranslate/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="javascript:doGTranslate('es|ru')" title="Russian" class="gflag" style="background-position:-500px -200px;"><img src="http://extendaplus.bachpress.com/wp-content/plugins/gtranslate/blank.png" height="16" width="16" alt="Russian" /></a><a href="javascript:doGTranslate('es|es')" title="Spanish" class="gflag" style="background-position:-600px -200px;"><img src="http://extendaplus.bachpress.com/wp-content/plugins/gtranslate/blank.png" height="16" width="16" alt="Spanish" /></a><br /><select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="es|af">Afrikaans</option><option value="es|sq">Albanian</option><option value="es|ar">Arabic</option><option value="es|hy">Armenian</option><option value="es|az">Azerbaijani</option><option value="es|eu">Basque</option><option value="es|be">Belarusian</option><option value="es|bg">Bulgarian</option><option value="es|ca">Catalan</option><option value="es|zh-CN">Chinese (Simplified)</option><option value="es|zh-TW">Chinese (Traditional)</option><option value="es|hr">Croatian</option><option value="es|cs">Czech</option><option value="es|da">Danish</option><option value="es|nl">Dutch</option><option value="es|en">English</option><option value="es|et">Estonian</option><option value="es|tl">Filipino</option><option value="es|fi">Finnish</option><option value="es|fr">French</option><option value="es|gl">Galician</option><option value="es|ka">Georgian</option><option value="es|de">German</option><option value="es|el">Greek</option><option value="es|ht">Haitian Creole</option><option value="es|iw">Hebrew</option><option value="es|hi">Hindi</option><option value="es|hu">Hungarian</option><option value="es|is">Icelandic</option><option value="es|id">Indonesian</option><option value="es|ga">Irish</option><option value="es|it">Italian</option><option value="es|ja">Japanese</option><option value="es|ko">Korean</option><option value="es|lv">Latvian</option><option value="es|lt">Lithuanian</option><option value="es|mk">Macedonian</option><option value="es|ms">Malay</option><option value="es|mt">Maltese</option><option value="es|no">Norwegian</option><option value="es|fa">Persian</option><option value="es|pl">Polish</option><option value="es|pt">Portuguese</option><option value="es|ro">Romanian</option><option value="es|ru">Russian</option><option value="es|sr">Serbian</option><option value="es|sk">Slovak</option><option value="es|sl">Slovenian</option><option value="es|es">Spanish</option><option value="es|sw">Swahili</option><option value="es|sv">Swedish</option><option value="es|th">Thai</option><option value="es|tr">Turkish</option><option value="es|uk">Ukrainian</option><option value="es|ur">Urdu</option><option value="es|vi">Vietnamese</option><option value="es|cy">Welsh</option><option value="es|yi">Yiddish</option></select>

<script type="text/javascript">
//<![CDATA[
if(jQuery.cookie('glang') && jQuery.cookie('glang') != 'es') jQuery(function($){$('body').translate('es', $.cookie('glang'), {toggle:true, not:'.notranslate'});});
function doGTranslate(lang_pair) {if(lang_pair.value)lang_pair=lang_pair.value;var lang=lang_pair.split('|')[1];jQuery.cookie('glang', lang, {path: '/'});jQuery(function($){$('body').translate('es', lang, {toggle:true, not:'.notranslate'});});}
//]]>
</script>
	</div>
	
	<?php if ( is_user_logged_in() ) : ?>
	<div class="sidebar-bloque">
		<h2 class="sidebar-title">Contactos</h2>
			<?php
				global $bp;
				if($bp->displayed_user->id != ''):
					$user = $bp->displayed_user->id;
				else:
					$user = $bp->loggedin_user->id;
				endif;
			?>
			<?php if ( bp_has_members( 'user_id='.$user.'&type=random&max=5&populate_extras=0' ) ) : ?>
				<ul id="members-list" class="item-list">
				<?php while ( bp_members() ) : bp_the_member(); ?>
					<li class="vcard">
						<div class="item-avatar">
							<a href="<?php bp_member_permalink() ?>"><?php bp_member_avatar('width=40&height=40') ?></a>
						</div>

						<div class="item">
							<div class="item-title fn"><a href="<?php bp_member_permalink() ?>" title="<?php bp_member_name() ?>"><?php bp_member_name() ?></a></div>
						</div>
					</li>

				<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	<?php endif; ?>
	
	<div class="sidebar-bloque">
		<h2 class="sidebar-title">Publicaciones de Extenda</h2>
		<ul>	
			<?php wp_get_archives('type=monthly'); ?>
		</ul>	
	</div>
	
	<?php dynamic_sidebar( 'sidebar' ) ?>
	
	<div class="sidebar-bloque">
		<h2 class="sidebar-title">Nuestra red de oficinas</h2>
		<img alt="" style="margin-left:20px;" src="<?php echo site_url() ?>/wp-content/uploads/2011/08/oficinas.png" />
		<p class="text-align-center"><a href="<?php site_url(); ?>/nuestra-red-de-oficinas/">Ver todas</a></p>
	</div>
	
	<div class="sidebar-bloque">
		<h2 class="sidebar-title">Tutoriales</h2>
		<img src="<?php echo site_url() ?>/wp-content/uploads/2011/08/tutorial.png" alt="tutorial" />
		
		<?php $permalink = $_SERVER['REQUEST_URI']; 
			$ruta = explode('http://extendaplus.es/',$permalink);
			$pag_actual = $ruta[0];
		?>
		
		<?php if(!is_user_logged_in()): ?>
			<span><a target="_blank" href="<?php site_url(); ?>/tutoriales/tutorial-de-registro/">Cómo registrarse</a></span>
		<?php elseif(bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member()): ?>	
			<span><a target="_blank" href="<?php site_url(); ?>/tutoriales/tutorial-9-inicio/">Tutorial de Inicio</a></span>
		<?php elseif(bp_is_page( BP_GROUPS_SLUG ) || bp_is_group()): ?>
			<span><a target="_blank" href="<?php site_url(); ?>/tutoriales/principales-funciones-extenda-plus/">Principales funciones de Extenda Plus</a></span>
		<?php elseif($pag_actual == '/foros/'): ?>
			<span><a target="_blank" href="<?php site_url(); ?>/tutoriales/tutorial-8-foros/">Cómo usar los foros</a></span>
		<?php elseif(bp_is_page( BP_BLOGS_SLUG )): ?>
			<span><a target="_blank" href="<?php site_url(); ?>/tutoriales/crearunblog/">Cómo crear un blog</a></span> y <span><a target="_blank" href="<?php site_url(); ?>/tutoriales/publicacionenunblog/">cómo publicar en un blog</a></span>
		<?php elseif($pag_actual == '/eventos/'): ?>
			<span><a target="_blank" href="<?php site_url(); ?>/tutoriales/crear-un-evento/">Cómo publicar un evento</a></span>
		<?php else: ?>
			<span><a target="_blank" href="<?php site_url(); ?>/tutoriales/tutorial-10-muro/">Cómo usar el muro</a></span>
		<?php endif; ?>
		
		<p style="margin-top:20px;"><img src="<?php site_url(); ?>/wp-content/themes/bp-extenda/images/ico-tutoriales.jpg" /><span style="margin-left:10px;"><a target="_blank" href="<?php site_url(); ?>/tutoriales/">Todos los tutoriales</a></span></p>
	</div>
		
	</div><!-- .bloque-sidebar -->
	
	
	<?php do_action( 'bp_inside_before_sidebar' ) ?>

	<?php if ( is_user_logged_in() ) : ?>

		<?php do_action( 'bp_before_sidebar_me' ) ?>
		<?php do_action( 'bp_after_sidebar_me' ) ?>

	<?php else : ?>

		<?php do_action( 'bp_before_sidebar_login_form' ) ?>
		<?php do_action( 'bp_after_sidebar_login_form' ) ?>

	<?php endif; ?>
	



	<?php do_action( 'bp_inside_after_sidebar' ) ?>

	</div><!-- .padder -->
</div><!-- #sidebar -->

<?php do_action( 'bp_after_sidebar' ) ?>
