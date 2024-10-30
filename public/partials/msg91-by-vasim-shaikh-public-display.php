<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://wordpress.org/incredibledeveloperr/
 * @since      1.0.2
 *
 * @package    Msg91_By_Vasim_Shaikh
 * @subpackage Msg91_By_Vasim_Shaikh/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<?php

add_shortcode('msg91_add_shortcodes','msg91_add_shortcodes' );	

function msg91_add_shortcodes(){
	
	$output= '<style>
	
	

	</style>';
			/**First Button*/
			
			$output.= '<div class="msg91-full">					
			  
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-12  col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Get Application Link</div>
                       
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div class="col-sm-12" id="msgsent-result">

                        </div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                        <input id="msg91_mobilenumber" type="text" class="form-control" name="mobilenumber" value="" placeholder="Enter Mobile Number">                                        
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                    <input type="button" id="msg91-getmsg" class="btn btn-info" value="Send Message">
                               
                                    </div>
                                </div>


                                 
                            </form>     



                        </div>                     
                    </div>  
        </div>
      
    </div>
    
			</div>';
			return $output;
	}