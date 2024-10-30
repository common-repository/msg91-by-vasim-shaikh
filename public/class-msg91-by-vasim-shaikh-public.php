<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wordpress.org/incredibledeveloperr/
 * @since      1.0.2
 *
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/public
 * @author     Vasim Shaikh <vasimmca2015@gmail.com>
 */
class Msg91_By_Vasim_Shaikh_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.2
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Msg91_By_Vasim_Shaikh_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Msg91_By_Vasim_Shaikh_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/msg91-by-vasim-shaikh-public.css', array(), $this->version, 'all' );
		if(!is_admin()){
		wp_enqueue_style( 'msg91-public-bootstrap-style', plugin_dir_url( __FILE__ ) . 'css/bootstrap.css', array(), $this->version, 'all' );
		}
	

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.2
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Msg91_By_Vasim_Shaikh_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Msg91_By_Vasim_Shaikh_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/msg91-by-vasim-shaikh-public.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( 'msg91-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );		
		wp_enqueue_script( 'msg91-zt-common', plugin_dir_url( __FILE__ ) . 'js/zt-common-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script('msg91-zt-common', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		

	}

	/*Send Message Via MSG91 API */

	function msg91_sendSMS(){
	    
	    //$toNumbers,$messageText,$route,$country
		$msg_text='<p class="alert alert-danger">Error while storing settings.</p>';

	    $authKey = get_option('zt_msg91_authtoken');
	    $country = get_option('zt_msg91_country');
	    $senderName = get_option('zt_msg91_sender_name');
	    $messageText = get_option('zt_msg91_msgtxt');
	    $route = get_option('zt_msg91_route');
	    $toNumbers = sanitize_text_field($_POST['mobilenumber']);

		$postData = array(
		    'authkey' => $authKey,
		    'mobiles' => $toNumbers,
		    'message' => $messageText,
		    'sender' => $senderName,
		    'route' => $route
		);

		$args = array(
		    'body' => $body,
		    'timeout' => '30',		    
		    'headers' => array("authkey:$authKey ",
	        "content-type: application/json"),
		    'cookies' => array()
		);

		$API_URL = "https://api.msg91.com/api/v2/sendsms?country=".$country;

		$response = wp_remote_post( $API_URL, $args );

	   if ( is_wp_error( $response ) ) {
	      $error_message = $response->get_error_message();
    	  echo "Something went wrong: $error_message";

	    } else {
	 	  $msg_text='<p class="alert alert-success">Message Sent.</p>';
	    }

	   echo $msg_text;
	   wp_die();
	}
		

}
