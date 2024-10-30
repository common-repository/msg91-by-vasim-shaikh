<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wordpress.org/incredibledeveloperr/
 * @since      1.0.2
 *
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/admin
 * @author     Vasim Shaikh <vasimmca2015@gmail.com>
 */
class Msg91_By_Vasim_Shaikh_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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


		if(isset($_GET['page'])){
			if($_GET["page"] != 'extra-post-info') {
				return;
			}
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/msg91-by-vasim-shaikh-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'admin-bootstrap-style', plugin_dir_url( __FILE__ ) . 'css/bootstrap.css', array(), $this->version, 'all' );
		
	  	}
	}

	/**
	 * Register the JavaScript for the admin area.
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

		if(isset($_GET['page'])){
		if($_GET["page"] != 'extra-post-info') {
			return;
		}

	
		wp_enqueue_script( $this->plugin_name.'admin-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/msg91-by-vasim-shaikh-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'-zt-common', plugin_dir_url( __FILE__ ) . 'js/zt-common.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name.'-zt-common', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	   }

	}

	/**
	*Save settings of website
	*/
	public function msg91_save_settings(){

		$msg_text='<p class="alert alert-danger">Error while storing settings.</p>';

		if(is_admin()){			
			if(sanitize_text_field(trim($_POST['zt_msg91_authtoken']))){
			update_option('zt_msg91_authtoken',sanitize_text_field(trim($_POST['zt_msg91_authtoken'])));		
			}else{
				$msg_text='<p class="alert alert-danger">MSG91 AuthKey is empty or invalid.</p>';	
				echo $msg_text;		
				wp_die();	
			}
		
	    update_option('zt_msg91_country',sanitize_text_field(trim($_POST['zt_msg91_country'])));
	    update_option('zt_msg91_sender_name',sanitize_text_field(trim($_POST['zt_msg91_sender_name'])));
	    update_option('zt_msg91_msgtxt',sanitize_text_field(trim($_POST['zt_msg91_msgtxt'])));
	    update_option('zt_msg91_route',intval(sanitize_text_field(trim($_POST['zt_msg91_route']))));
		$msg_text='<p class="alert alert-success">Settings updated successfully.</p>';
		}
		echo $msg_text;
		wp_die();
	}

	
}
