<?php
/**
 * Scripts.php
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

/**
 * Register javascript files
 */
function im_register_scripts() {
	$theme         = wp_get_theme();
	$theme_version = $theme->get( 'Version' );

	// Comment in/out the gsap plugins you wish to use.
	$gsap_plugins = array(
		// 'AttrPlugin.min.js',
		// 'BezierPlugin.min.js',
		// 'ColorPropsPlugin.min.js',
		// 'CSSPlugin.min.js',
		// 'CustomBounce.min.js',
		// 'CustomEase.min.js',
		// 'CustomWiggle.min.js',
		// 'DirectionalRotationPlugin.min.js',
		// 'Draggable.min.js',
		// 'DrawSVGPlugin.min.js',
		// 'EaselPlugin.min.js',
		// 'EasePack.min.js',
		// 'EndArrayPlugin.min.js',
		// 'GSDevTools.min.js',
		// 'jquery.gsap.min.js',
		// 'ModifiersPlugin.min.js',
		// 'MorphSVGPlugin.min.js',
		// 'Physics2DPlugin.min.js',
		// 'PhysicsPropsPlugin.min.js',
		// 'PixiPlugin.min.js',
		// 'RaphaelPlugin.min.js',
		// 'RoundPropsPlugin.min.js',
		// 'ScrambleTextPlugin.min.js',
		'ScrollToPlugin.min.js',
		'SplitText.min.js',
		// 'TextPlugin.min.js',
		// 'ThrowPropsPlugin.min.js',
		// 'TimelineLite.min.js',
		'TimelineMax.min.js',
		// 'TweenLite.min.js',
		'TweenMax.min.js',
	);

	foreach ( $gsap_plugins as $gsap_plugin ) {
		wp_enqueue_script( 'gsap-' . str_replace( '.js', '', $gsap_plugin ), get_template_directory_uri() . '/assets/dist/plugins/gsap/' . $gsap_plugin, array( 'main' ), $theme_version, false );
	}

	wp_register_script( 'swiper', get_template_directory_uri() . '/assets/dist/plugins/swiper/js/swiper.js', '', $theme_version, true );
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js', '', $theme_version, false );
	wp_register_script( 'scrollmagic', get_template_directory_uri() . '/assets/dist/plugins/scrollmagic/ScrollMagic.min.js', '', $theme_version, true );
	wp_register_script( 'scrollanimation', get_template_directory_uri() . '/assets/dist/plugins/scrollmagic/plugins/animation.gsap.min.js', '', $theme_version, true );
	wp_register_script( 'scrollindicator', get_template_directory_uri() . '/assets/dist/plugins/scrollmagic/plugins/debug.addIndicators.min.js', '', $theme_version, true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/dist/plugins/modernizr-3.0.0.min.js', '', $theme_version, false );
	wp_register_script( 'plugins', get_template_directory_uri() . '/assets/dist/js/plugins.min.js', array( 'jquery' ), $theme_version, false );
	wp_register_script( 'main', get_template_directory_uri() . '/assets/dist/js/main.min.js', array( 'plugins' ), $theme_version, false );
}
add_action( 'wp_enqueue_scripts', 'im_register_scripts' );

/**
 * Enqueue javascript files
 */
function im_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'swiper' );
	wp_enqueue_script( 'scrollmagic' );
	wp_enqueue_script( 'scrollanimation' );
	// wp_enqueue_script( 'scrollindicator' );.
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'plugins' );
	wp_enqueue_script( 'main' );

	// values available to js.
	wp_localize_script(
		'main',
		'im',
		array(
			'siteUrl'      => site_url(),
			'directoryUrl' => get_template_directory_uri(),
			'ajax_url'     => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'im_enqueue_scripts' );
