jQuery(document).ready(function($){
    //use $ here
    $('#zt_msg91_admin_button').click(function(){
        var formData=new FormData(document.getElementById('zt_msg91_formdata')); 
        formData.append("action", "msg91_save_settings"); 
        jQuery.ajax({
            type: "post",
            url: ajax_object.ajaxurl,
            cache: false,
            processData: false, 
            contentType: false,     
            data:formData,
            success: function(msg){

                $('#formFooter').html(msg);
            }
        });
    });
});