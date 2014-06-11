/* Author:

*/

$(function(){

    //	$.placeholder.shim();
	
	
	// Sample jquery form validate
	/*$('#form').validate({
        rules: {
            name: "required",
            subject: "required",
            mobile: {
                required: true,
                digits: true,
                minlength: 8
            },
            email: {
                required: true,
                email: true,
            },
            message: "required"
        },
        errorPlacement: function(error, element) {
            error.insertBefore( element );
        },
        submitHandler: function (form) {
            // setup some local variables
            var $form = $(form);
            // let's select and cache all the fields
            var $inputs = $form.find("input, select, button, textarea");
            // serialize the data in the form
            var serializedData = $form.serialize();

            // let's disable the inputs for the duration of the ajax request
            $inputs.prop("disabled", true);

            // fire off the request to /form.php

            request = $.ajax({
                url: "email.php",
                type: "post",
                data: serializedData
            });

            // callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR) {
                // log a message to the console
                // console.log("Hooray, it worked!");
                $("#form").hide();
                $(".thanks").fadeIn();
                // alert("success awesome");
                // $('#add--response').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> You successfully read this important alert message.</div>');
            });

            // callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown) {
                // log the error to the console
                // console.error("The following error occured: " + textStatus + errorThrown);
                // console.error("The following error occured: " + textStatus);
            });

            // callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function () {
                // reenable the inputs
                $inputs.prop("disabled", false);
            });

        }
    
    });*/

});




