function createCallback() {
    return function() {
        $(".upload-photo").html('<img src = "' + base_url + 'includes/img/gif-load.gif" class="loader" width="30" height="30" /> Please wait.. <span class="percent"></span>').css("display", "inline-block"), 
        $("#imageform").ajaxForm({
            target: ".upload-photo",
            success: function(a) {
                1 == a.charAt(0) ? console.log(a) : a.indexOf("did not select") != -1 ? console.log(1) : console.log(a)
            }
        }).submit()
    }
}

function createCallback2() {
    return function() {
        $(".upload-logo").html('<img src = "' + base_url + 'includes/img/gif-load.gif" class="loader" width="30" height="30" /> Please wait.. <span class="percent"></span>').css("display", "inline-block"), 
        $("#imageform2").ajaxForm({
            target: ".upload-logo",
            success: function(a) {
                1 == a.charAt(0) ? console.log(a) : a.indexOf("did not select") != -1 ? console.log(1) : console.log(a)
            }
        }).submit()
    }
}

function onlyDotsAndNumbers(a) {
    var b = a.which ? a.which : a.keyCode;
    return 46 == b || !(b > 31 && (b < 48 || b > 57))
}

$(document).ready(function() {
    $(".delete").click(function(a) {
        return !!confirm("Are you sure you want to delete this item?") || (a.preventDefault(), !1)
    }), $(".upload-photo").click(function() {
        $("#photoimg").click()
    }), $(".upload-logo").click(function() {
        $("#logoimg").click()
    }), $("#upload-thumb").click(function() {
        $("#img-select").click()
    }), $("#photoimg").on("change", createCallback()), 
        $("#logoimg").on("change", createCallback2()), 

    $("#select-all").click(function(a) {
        this.checked ? $(":checkbox").each(function() {
            this.checked = !0
        }) : $(":checkbox").each(function() {
            this.checked = !1
        })
    });

    var variations = $('.attributes');
    var i = $('.ing-row').size();

    $('#add_more_ing').on('click', function() {
        i++;
        var html = '<div class="ing-row form-group ing-row-' + i + '">';

        html += '<div class="col-md-3">';
        html += '<input type="text" class="form-control ing" name="var[' + i + '][dimension]"  placeholder="Dimensions (L x W x H)" value="" >';
        html += '</div>';
        html += '<div class="col-md-2">';
        html += '<input type="text" class="form-control qty" name="var[' + i + '][weight]"  placeholder="Weight" value="" >';
        html += '</div>';
        html += '<div class="col-md-2">';
        html += '<input type="text" class="form-control unit" name="var[' + i + '][attribute]"  placeholder="Attribute" value="" >';
        html += '</div>';
         html += '<div class="col-md-2">';
        html += '<input type="text" class="form-control unit" name="var[' + i + '][price]"  placeholder="Price" value="" >';
        html += '</div>';


        html += '<div class="col-md-1">' +
            '<button class="btn btn-danger remove">X</button>' +
            '</div><div class="clearfix"></div>';
        html += '</div>';

        $(html).appendTo(variations);
        return false;
    });

    $('.attributes').on('click', '.ing-row .remove', function(e) {
        if (i > 1) {
            $(this).parents('div.ing-row').remove();
            i--;
        }
        e.preventDefault();
        //return false;
    });

    if($("input:file#img-select").length > 0){
        $("input:file#img-select").change(function(){
            Upload.doUpload('.image-form', {msg_container:'.upload-messages', uploaded_container:'#img-container'});
        });
    }
    
    //remove photo
    $('.form-group').on('click', '.remove-photo', function(){ 
        var fieldname = $(this).attr('data-fieldname');
        $(this).parent().html('');
        $('input[name*="'+fieldname+'"]').val('');
    });


    $('#save_variation').click(function(){
        console.log('save');
        var length = $('#length').val();
        var width = $('#width').val();
        var height = $('#height').val();
        var length_class = $('#length_class').val();
        var weight = $('#weight').val();
        var weight_class = $('#weight_class').val();
        var logo = $('#logo').val();
        var attribute = $('#attribute').val();
        var var_price = $('#var_price').val();
        var pid = $('#pid').val();
        var variations = $('#table-products');

        $.post(base_url + 'administrator/save_variation', { pid:pid, length:length, width:width, height:height, length_class:length_class, weight:weight, weight_class:weight_class, var_logo:logo, var_attribute:attribute, var_price: var_price }, function(data){
            console.log(data);
            var dimension = length + 'x' + width + 'x' + height + ' ' + length_class;
            if(logo == undefined){
                var image = '';
            }else{
                var image = '<img src="'+ base_url +'uploads/products/' + logo + '" alt="" width="80">';
            }

            var html = '<tr class="gradeX odd" role="row">' +
                           '<td class="sorting_1">' + dimension + '</td>' +
                            '<td>' + weight + ' ' + weight_class + '</td>' +
                            '<td class="text-center">'+ image +'</td>' +
                            '<td>'+ attribute +'</td>' +
                            '<td class="text-right">' + var_price +'</td>' +
                            '<td class="text-right">' +
                                '<a class="btn btn-warning" href="'+ base_url +'administrator/edit_variations/' + data + '?route=catalog"><i class="fa fa-pencil"></i></a> ' +   
                                '<a class="btn btn-danger delete" href="'+ base_url +'administrator/delete_variation/' + data + '?route=catalog"><i class="fa fa-times"></i></a>' + 
                            '</td>' +
                        '</tr>';

            $(html).appendTo(variations);

            $("#no-record").addClass("hide");
            return false;            
        });    
    });


    $('#category').change(function(e) {
        var cat_id = $(this).val();

        $.post(base_url + 'administrator/dropdown_subcategories', {
            cat_id: cat_id
        }, function(data) {
            console.log(data);
            $('#subcategory').append('<option value="">Loading..Please Wait</option>');
            $('#subcategory').empty();
            $('#subcategory').append('<option value="">Please Select Subcategory</option>');
            var result = $.parseJSON(data);
            $.each(result, function(index, value) {
                $('#subcategory').append('<option value="' + value.cat_id + '">' + value.cat_name + '</option>');
            });

        });
    });
});