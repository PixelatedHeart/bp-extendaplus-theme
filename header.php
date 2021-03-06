<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta property="og:title" content="<?php echo get_bloginfo('name'); ?> | <?php echo get_the_title(); ?>" /> 
		<meta property="og:description" content="Un usuario ha compartido información interesante en Extenda Plus. Únete y descubre todo lo que necesitas sobre internacionalización andaluza." />
		
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<title><?php bp_page_title() ?></title>

		<?php do_action( 'bp_head' ) ?>

		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.jpg" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

		<?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
		<?php endif; ?>

		<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
		<?php endif; ?>

		<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
		<?php endif; ?>

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26928953-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</head>

	<body <?php body_class() ?> id="bp-default">

		<?php do_action( 'bp_before_header' ) ?>

		<div id="header">
			<h1 id="logo"><a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><img src="<?php echo site_url() ?>/wp-content/uploads/2011/08/sb_logo.png" alt="Logo Extenda Plus" title="Logotipo Extenda Plus" /></a></h1>
			
			<?php if ( is_user_logged_in() ) : ?>
			
			<?php /* ?>
			<ul id="nav">
				
				<li<?php if ( bp_is_front_page() ) : ?> class="selected"<?php endif; ?>>
					<a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php _e( 'Home', 'buddypress' ) ?></a>
				</li>

				<?php if ( 'activity' != bp_dtheme_page_on_front() && bp_is_active( 'activity' ) ) : ?>
					<li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
						<a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" title="<?php _e( 'Activity', 'buddypress' ) ?>"><?php _e( 'Activity', 'buddypress' ) ?></a>
					</li>
				<?php endif; ?>

				<li<?php if ( bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ) : ?> class="selected"<?php endif; ?>>
					<a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/" title="<?php _e( 'Members', 'buddypress' ) ?>"><?php _e( 'Members', 'buddypress' ) ?></a>
				</li>
				
				<li<?php if ( bp_is_page( 'foros' ) ) : ?> class="selected"<?php endif; ?>>
					<a href="<?php echo site_url() ?>/foros/" title="<?php _e( 'Foros', 'buddypress' ) ?>"><?php _e( 'Foros', 'buddypress' ) ?></a>
				</li>

				<?php if ( bp_is_active( 'groups' ) ) : ?>
					<li<?php if ( bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ) : ?> class="selected"<?php endif; ?>>
						<a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/" title="<?php _e( 'Groups', 'buddypress' ) ?>"><?php _e( 'Groups', 'buddypress' ) ?></a>
					</li>

					<?php if ( bp_is_active( 'forums' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) bp_get_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
						<li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
							<a href="<?php echo site_url() ?>/<?php echo BP_FORUMS_SLUG ?>/" title="<?php _e( 'Forums', 'buddypress' ) ?>"><?php _e( 'Forums', 'buddypress' ) ?></a>
						</li>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( bp_is_active( 'blogs' ) && bp_core_is_multisite() ) : ?>
					<li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
						<a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" title="<?php _e( 'Blogs', 'buddypress' ) ?>"><?php _e( 'Blogs', 'buddypress' ) ?></a>
					</li>
				<?php endif; ?>
				<?php wp_list_pages( 'title_li=&depth=1&exclude=' . bp_dtheme_page_on_front() ); ?>
				
				
				<li<?php if ( bp_is_page( 'contactar' ) ) : ?> class="selected"<?php endif; ?>>
					<a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()) ?>messages/compose/?r=extenda" title="<?php _e( 'Contactar', 'buddypress' ) ?>"><?php _e( 'Contactar', 'buddypress' ) ?></a>
				</li>
				<li>
					<a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()) ?>profile/" title="<?php _e( 'Mi cuenta', 'buddypress' ) ?>"><?php _e( 'Mi cuenta', 'buddypress' ) ?></a>
				</li>
				<li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
					<a href="<?php echo bp_core_get_user_domain(bp_loggedin_user_id()) ?>blogs/" title="<?php _e( 'Mi blog', 'buddypress' ) ?>"><?php _e( 'Mi blog', 'buddypress' ) ?></a>
				</li>
				
				<li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
					<a href="<?php echo site_url(); ?>/activity/" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php _e( 'Home', 'buddypress' ) ?></a>
				</li>
				
				
				
				<?php //do_action( 'bp_nav_items' ); ?>
			</ul><!-- #nav -->
			<?php */ ?>

			<div id="search-bar">
				<div class="padder">

				<?php if ( bp_search_form_enabled() ) : ?>

					<form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
						<input type="text" id="search-terms" name="search-terms" value="" />
						<?php echo bp_search_form_type_select() ?>

						<input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'buddypress' ) ?>" />
						<?php wp_nonce_field( 'bp_search_form' ) ?>
					</form><!-- #search-form -->

				<?php endif; ?>

				<?php do_action( 'bp_search_login_bar' ) ?>

				</div><!-- .padder -->
			</div><!-- #search-bar -->
			
			<?php endif; ?>

			<?php do_action( 'bp_header' ) ?>

		</div><!-- #header -->

		<?php do_action( 'bp_after_header' ) ?>
		<?php do_action( 'bp_before_container' ) ?>

		<div id="container">
			<?php locate_template( array( 'sidebar-left.php' ), true ); ?>