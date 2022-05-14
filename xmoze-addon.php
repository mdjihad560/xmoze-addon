<?php
/**
 * Plugin Name: Xmoze Addon
 * Description: Custom Elementor extension which includes custom widgets.
 * Plugin URI:  https://anahian.com/
 * Version:     1.0.0
 * Author:      Jihad Hossain
 * Author URI:  https://anahian.com/
 * Text Domain: xmoze-addon
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Xmoze_Addon {

    /**
     * Plugin Version
     *
     * @since 1.0.0
     *
     * @var string The plugin version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.0.0
     *
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     *
     * @since 1.0.0
     *
     * @access private
     * @static
     *
     * @var Xmoze_Addon The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return Xmoze_Addon An instance of the class.
     */
    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct() {

        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );

    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * Fired by `init` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function i18n() {

        load_plugin_textdomain( 'xmoze-addon', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

    }

    /**
     * Initialize the plugin
     *
     * Load the plugin only after Elementor (and other plugins) are loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed load the files required to run the plugin.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init() {

        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }
        
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

        add_action('elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );


        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        // Category Init
        add_action( 'elementor/init', [ $this, 'Xmoze_addon_category' ] );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'xmoze-addon' ),
            '<strong>' . esc_html__( 'Elementor Common Extension', 'xmoze-addon' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'xmoze-addon' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'xmoze-addon' ),
            '<strong>' . esc_html__( 'Elementor Common Extension', 'xmoze-addon' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'xmoze-addon' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'xmoze-addon' ),
            '<strong>' . esc_html__( 'Elementor Common Extension', 'xmoze-addon' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'xmoze-addon' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Init Widgets
     *
     * Include widgets files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_widgets() {

        require_once( __DIR__ . '/widgets/xmoze-demo-thumb.php' );
        require_once( __DIR__ . '/widgets/xmoze-slider2.php' );
        require_once( __DIR__ . '/widgets/xmoze-slider3.php' );

        // added by EWA - EWA own Register widgets, loading all widget names

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Section_Title_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Demo_thumb_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Demo_Slider2_Widget() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Demo_Slider3_Widget() );

    }

    /**
     * Init Controls
     *
     * Include controls files and register them
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function init_controls() {

    }

        // Custom CSS
        public function widget_styles() {
            wp_enqueue_style( 'slick', plugins_url( '/assets/css/slick.min.css', __FILE__ ) );
            wp_enqueue_style( 'boostrap', plugins_url( '/assets/css/bootstrap.min', __FILE__ ) );
            wp_enqueue_style( 'xmoze-style', plugins_url( '/assets/css/style.css', __FILE__ ) );
            wp_enqueue_style( 'xmoze-responsive', plugins_url( '/assets/css/responsive.css', __FILE__ ) );
        }   
    
        // Custom JS
        public function widget_scripts() {
            wp_enqueue_script( 'slick', plugins_url( '/assets/js/slick.min.js', __FILE__ ) );
        }
    

        // Custom Category
        public function Xmoze_addon_category () {

       \Elementor\Plugin::$instance->elements_manager->add_category( 
        'xmoze-addon-category',
        [
            'title' => __( 'Xmoze Custom Widget', 'xmoze-addon' ),
            'icon' => 'fa fa-plug', //default icon
        ],
        2 // position
       );

    }


}

Xmoze_Addon::instance();
