$(document).ready(function($) {
    
    var canPost = true;
    var options = {
        beforeSend: function(f){
            // Replace this with your loading gif image
            $(".upload-image-messages").html('<img src = "'+base_url+'includes/img/gif-load.gif" class = "loader" width="20" height="20" /> Please wait.. <span class="percent"></span>').css('display', 'inline-block');
            canPost = false;
        },
        complete: function(response){
            //Output AJAX response to the div container
            res = $.parseJSON(response.responseText);
            
            if(res.errors){
                $(".upload-image-messages").html('<div class="alert alert-danger" >' + res.errors + '</div>');
                return false;
            }
            
            var count_img = $("input:radio[name=thumb]").length;
            $.each(res, function(i, val) {
                if(count_img < 5){
                    $('#thumbnail').removeClass('hide');
                    $('<div class="form-group m-10 group-photo" id="photo'+count_img+'">'+ 
                        '<span class="remove-photo glyphicon glyphicon-remove" aria-hidden="true" id="photo'+i+'"></span>'+
                        '<img  class="img-responsive" width="100" height="100" src="'+base_url+'uploads/thumbnails/'+val.file_name+'" />'+
                        '<input type="hidden" value="'+val.file_name+'" name="thumb-images[]" />'+
                        '</div>').appendTo($('#ad-upload')); 
                    count_img++; 
                }
            });
            
            $('#img-select').val('');
            $(".upload-image-messages").hide();
            canPost = true;
        },
        uploadProgress: function(event, pos, total, percentComplete){
            $(".upload-image-messages .percent").html(percentComplete+"% complete");
        }
    };  

    // Submit the form  
    $('#content').on('change','#img-select' , function(){ $(".upload-image-form").ajaxSubmit(options);  });

    $('#content').on('click', '.remove-photo', function(){
        var id = this.id;
        console.log(this.id);
        //$(this).closest('.group-photo').remove();
    });    
});