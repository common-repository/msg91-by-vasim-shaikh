jQuery(document).ready(function($){
    //use $ here
    $('#msg91-getmsg').click(function(){
        
        var formData=new FormData(document.getElementById('loginform')); 
        formData.append("action", "msg91_sendSMS"); 
        jQuery.ajax({
            type: "post",
            url: ajax_object.ajaxurl,
            cache: false,
            processData: false, 
            contentType: false,     
            data:formData,
            success: function(msg){

                jQuery('#msgsent-result').html(msg);
            }
        });
    });
});