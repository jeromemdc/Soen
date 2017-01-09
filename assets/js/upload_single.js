var vars = {};

var options = {
    beforeSend: function(f){
        var count_img = $("input:radio[name=thumb]").length;
        if(count_img >= 1){
            modalView("alert-max","Maximum File Upload","Maximum of 1 photos per product.")
            f.abort();
        } else {
            // Replace this with your loading gif image
            $(vars.msg_container).html('<img src = "'+base_url+'includes/img/gif-load.gif" class = "loader" width="20" height="20" /> Please wait.. <span class="percent"></span>').css('display', 'inline-block');
        }
        vars.canPost = false;
    },
    complete: function(response){
        //Output AJAX response to the div container
        res = $.parseJSON(response.responseText);

        console.log(res);

        if(res.errors){
            $(vars.msg_container).html('<div class="alert alert-danger" >' + res.errors + '</div>');
            return false;
        }

        $(vars.uploaded_container).html($( '<span class="remove-photo glyphicon glyphicon-remove" aria-hidden="true"></span><img class="img-responsive" width="'+vars.img_preview_width+'" height="'+vars.img_preview_height+'" src="'+base_url+'uploads/img/'+res.file_name+'" data-image-filename="'+res.file_name+'" />')); 
        //$('input[name="'+vars.hidden_input_name+'"]').val(res.file_name);
        
        $(vars.file_select_id).val('');
        $(vars.msg_container).hide();
        vars.canPost = true;
    },
    uploadProgress: function(event, pos, total, percentComplete){
        $(vars.msg_container+" .percent").html(percentComplete+"% complete");
    }
};  

var handleInitVars = function(settings){ console.log();
    if(typeof settings === 'undefined'){
        settings = {};
    }

    this.vars.canPost = typeof settings.canPost === "undefined" ? true : settings.canPost;
    //this.vars.hidden_input_name = typeof settings.hidden_input_name === "undefined" ? 'thumb' : settings.hidden_input_name;
    this.vars.msg_container = typeof settings.msg_container === "undefined" ? '.upload-messages' : settings.msg_container;
    this.vars.uploaded_container = typeof settings.uploaded_container === "undefined" ? '#ad-upload' : settings.uploaded_container;
    this.vars.file_select_id = typeof settings.file_select_id === "undefined" ? '#img-select' : settings.file_select_id;
    this.vars.img_preview_width = typeof settings.img_preview_width === "undefined" ? '250' : settings.img_preview_width;
    this.vars.img_preview_height = typeof settings.img_preview_height === "undefined" ? 'auto' : settings.img_preview_height;

};

var Upload = function () {
    "use strict";
    return {
        init: function () {
            alert('asdasd');
        },
        initVars: function(settings){
            handleInitVars(settings);
        },
        doUpload: function(formClass, settings){
            handleInitVars(settings);
            console.log($(formClass).ajaxSubmit(options)); 
        }
    };
}();