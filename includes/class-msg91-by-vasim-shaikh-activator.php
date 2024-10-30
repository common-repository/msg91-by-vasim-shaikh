<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wordpress.org/incredibledeveloperr/
 * @since      1.0.2
 *
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.2
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/includes
 * @author     Vasim Shaikh <vasimmca2015@gmail.com>
 */
class Msg91_By_Vasim_Shaikh_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.2
	 */
	public static function activate() {  
	ob_clean();
   	update_option('zt_msg91_country',91);
    update_option('zt_msg91_sender_name','msg91-test');
    update_option('zt_msg91_msgtxt','This is sample message');
    update_option('zt_msg91_route',4);
    ob_end_clean();
	}


}
