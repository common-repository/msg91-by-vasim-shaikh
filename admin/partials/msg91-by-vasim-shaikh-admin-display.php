<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://wordpress.org/incredibledeveloperr/
 * @since      1.0.2
 *
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php 

add_action( 'admin_menu', 'msg91_info_menu' );  
function msg91_info_menu(){   
     $page_title = 'Expand your reach with Msg91';   
     $menu_title = 'Msg91';   
     $capability = 'manage_options';  
     $menu_slug  = 'extra-post-info';   
     $function   = 'msg91_info_page';   
     $icon_url   = 'dashicons-email-alt';   
     $position   = 4;    
     add_menu_page( $page_title,$menu_title,$capability,$menu_slug,$function,$icon_url,$position ); 
} 



function msg91_info_page(){ 


/**First Button*/
//msg-logo-blue.svg
$plugins_url = plugin_dir_url( dirname( __FILE__ ) );

echo '<div class="wrapper fadeInDown">
<div id="formContent">
  <!-- Tabs Titles -->

  <!-- Icon -->
  <div class="fadeIn first">
  <div class="zt-msg91-img">
    <img src="'.$plugins_url.'img/msg-logo-blue.svg" id="icon" alt="User Icon" />
    

  </div>
    <div class="msg91powerd-by"> Unoffcial Version 1.0.2 </div>
  </div>

  <!-- Login Form -->
  <form method="post" action="options.php" id="zt_msg91_formdata"> 
    <input type="text" id="zt_msg91_authtoken" class="fadeIn second" name="zt_msg91_authtoken" placeholder="Authatication Key" required value="'.get_option('zt_msg91_authtoken').'"">
    <input type="text" id="zt_msg91_country" class="fadeIn third" name="zt_msg91_country" placeholder="Country Code e.g. INDIA - +91" value="'.get_option('zt_msg91_country').'">
    <input type="text" id="zt_msg91_msgtxt" class="fadeIn second" name="zt_msg91_msgtxt" placeholder="Message Text" value="'.get_option('zt_msg91_msgtxt').'">
    <input type="text" id="zt_msg91_route" class="fadeIn third" name="zt_msg91_route" placeholder="Route e.g. 4" value="'.get_option('zt_msg91_route').'" >
    <input type="text" id="zt_msg91_sender_name" class="fadeIn second" name="zt_msg91_sender_name" placeholder="Sender Name" value="'.get_option('zt_msg91_sender_name').'">
    <input type="button" class="fadeIn fourth" value="Save" id="zt_msg91_admin_button">
  </form>

  <!-- Remind Passowrd -->
  <div id="formFooter">
    <a class="" href="https://help.msg91.com/article/177-where-can-i-find-my-authentication-key" target="_blank">Where can I find my authentication key?</a>
  </div>

</div>
</div>';
}




?>