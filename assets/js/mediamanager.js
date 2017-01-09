var mediaModal = $('#media-modal'),
library = $('#library'),
image_type = ''; //tab
var productImagesContainer = $('.product-images'); //container
$('.media-modal-toggle').click(function(){
	image_type = $(this).data('image-type');
	productImagesContainer =  $('.img-preview.'+image_type);
});

library.on('click','a',function(e){
	e.preventDefault();

	//checkbox processing
	var radio = $(this).find('input[type=radio]');

	if(!radio.is(':checked')){
		radio.prop('checked', true);
	}else{
		radio.prop('checked', false);
	}
});

//insert button and send images to the form and hidden fields tooo....
$('.insert').click(function(e){
	//collect checked
	var radios = library.find('input[type=radio]');
	radios.each(function(i, el){
		if(el.checked){
			var image_filename = $(el).parent().data('image-filename');
			var img_src = $(el).siblings('img').attr('src');

			//template
			var template = get_template(image_filename, img_src, image_type);

			//replace placeholder
			productImagesContainer.html(template);
		}
	});
	//hide modal
	mediaModal.modal('hide');

	$('.newly-uploaded#nu-'+image_type).val(0);
});

$('.insert-uploaded').click(function(e){
	//var imageFilename = $('#media-modal .img-preview img').data('image-filename');
	var image_filename = $('#media-modal .img-preview img').attr('data-image-filename');
	var img_src = $('#media-modal .img-preview img').attr('src');

	//template
	var template = 	get_template(image_filename, img_src, image_type);

	//replace placeholder
	productImagesContainer.html(template);
	//hide modal
	mediaModal.modal('hide');

	$('.newly-uploaded#nu-'+image_type).val(1);
});

$('.media-content').click(function(){
	if ($(this).parent().hasClass('selected-img')) {
		$(this).parent().removeClass('selected-img');
	} else {
		$(this).parent().addClass('selected-img');
		$(this).parent().siblings().removeClass('selected-img');
	}
});

//remove product images js
$('.img-preview').on('click', '.remove', function(e){
	e.preventDefault();
	//fadeout animation and remove....
	$(this).parent('.product-img').fadeOut('100', function(){
		$(this).remove();
	});
});

//do the pagination
var divs = $("div.gallery-item");
var per_page = 25;
var j = 1;
for(var i = 0; i < divs.length; i+=per_page) {
  divs.slice(i, i+per_page).wrapAll("<div class='new' id='set-"+j+"'></div>");
  j++;
}
$('.new#set-1').css('display', 'block').siblings().css('display', 'none');

$('.pagination').twbsPagination({
        totalPages: Math.ceil(divs.length / per_page),
        visiblePages: 10,
        onPageClick: function(e, page){
        	$('.new#set-'+page).siblings().fadeOut('slow', 'swing', function(){
        		$('.new#set-'+page).fadeIn('slow');
        	});
        }
    });
//end pagination


function get_template(image_filename, img_src, image_type){
	// var name = '';
	// if(image_type == "featured"){
	// 	name = "f_image";
	// } else if(image_type == "background"){
	// 	name = "bg_image";
	// } else {
	// 	name = "thumb";
	// }

	var template = 	'<div class="product-img">'+
								'<input type="hidden" name="'+image_type+'" value="'+ image_filename +'" id="current-image">'+
								'<img src="'+ img_src +'" width="200" height="auto" />'+
								'<a href="#" class="btn btn-xs btn-danger remove">'+
								'<span class="glyphicon glyphicon-remove-sign"></span></a>'+
							'</div>';
	return template;
}