jQuery(document).ready(function($){

//Template Preview Js
$('.uab-template-select').on('change',function(){
	var selected_template = $(this).val();
	if(selected_template!='uab-custom-template'){
		$(this).closest('.uab-template-settings').find('.uab-template-image-preview').show();
		var image_path = uab_variable.plugin_image_path + '/uab-template-screenshorts/'+selected_template+'.PNG';
		$(this).closest('.uab-template-settings').find('.uab-template-image-preview img').attr('src',image_path);
	}else{
		$(this).closest('.uab-template-settings').find('.uab-template-image-preview').hide();
	}
	
});

//Template Preview Js Custom Template
$('.uab-custom-template').on('change',function(){
	var selected_template = $(this).val();
	var image_path = uab_variable.plugin_image_path + '/uab-template-screenshorts/'+selected_template+'.PNG';
	$(this).closest('.uab-custom-settings-content-wrapper').find('.uab-template-image-preview img').attr('src',image_path);
});

//Template Preview Js Profile
/*$('.uab-select-template').on('change',function(){
	var selected_template = $(this).val();
	var image_path = uab_variable.plugin_image_path + '/uab-template-screenshorts/'+selected_template+'.PNG';
	$(this).closest('.uab-personal-template-select').find('.uab-template-image-preview	 img').attr('src',image_path);
});*/


//Profile Custom Template hide/show
$('.uab-select-template').on('change',function(){
	selected_template = $('option:selected',this).val();
	if(selected_template=='uab-custom-template'){
		$(this).closest('.uab-profile-content-wrapper').find('.uab-personal-template-select').show();
		$(this).closest('.uab-profile-content-wrapper').children('.uab-template-image-preview').hide();
		
	}else{
		$(this).closest('.uab-profile-content-wrapper').find('.uab-personal-template-select').hide();
		$(this).closest('.uab-profile-content-wrapper').find('.uab-template-image-preview').show();
		var image_path = uab_variable.plugin_image_path + '/uab-template-screenshorts/'+selected_template+'.PNG';
		$(this).closest('.uab-profile-content-wrapper').find('.uab-template-image-preview img').attr('src',image_path);
	}
});

//User profile custom template tab settings
$('#uab-template-settings').on('click',function(){
	$('.uab-backend-tabs .ui-tab').each(function(){
		if($(this).attr('role')=='tab'){
			$(this).removeClass('ui-tabs-active ui-state-active');
			$(this).attr({
				'aria-selected': 'false',
				'aria-expanded': 'false'
			});
		}
	});
	$('.uab-backend-tabs .ui-tabs-panel').each(function(){
		if($(this).attr('role')=='tabpanel'){
			$(this).fadeOut();
		}
	});
	$('.uab-backend-tabs .uab-custom-tab').fadeIn();
});

$('.uab-variable-width-wrapper ul').on('click',function(){
	$('.uab-variable-width-wrapper ul li.ui-tabs-tab').each(function(){
		if($(this).attr('tabindex')=='0'){
			$(this).addClass('ui-tabs-active ui-state-active');
			$(this).attr({
				'aria-selected': 'true',
				'aria-expanded': 'true'
			});
		}
	});
	$('.uab-backend-tabs .ui-tabs-panel').each(function(){
		if($(this).attr('aria-hidden')=='false'){
			$(this).fadeIn();
		}
	});
	$('.uab-backend-tabs .uab-custom-tab').fadeOut();
});

$('.uab-color-picker').wpColorPicker();

//Template color options
	var uabPrimaryColor = $('.uab-primary-color-picker').val() || '';
	var uabSecondaryColor = $('.uab-primary-color-picker').val() || '';
	var uabTertiaryColor = $('.uab-primary-color-picker').val() || '';
	//Custom Template options
	function chooseTemplateOptions(post_option){
		//alert(post_option);
		switch(post_option) {
			case 'uab-template-1':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-2':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-3':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			break;
			case 'uab-template-4':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-5':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			break;
			case 'uab-template-6':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-7':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			$('.uab-tertiary-color').show();
			break;
			case 'uab-template-8':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-9':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-10':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-11':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			break;
			case 'uab-template-12':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-13':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			$('.uab-background').show();
			$('.background-image-preview').show();
			break;
			case 'uab-template-14':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			break;
			case 'uab-template-15':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-background').show();
			$('.background-image-preview').show();
			break;
			case 'uab-template-16':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			$('.uab-tertiary-color').show();
			break;
			case 'uab-template-17':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			break;
			case 'uab-template-18':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-secondary-color').show();
			$('.uab-background').show();
			$('.background-image-preview').show();
			break;
			case 'uab-template-19':
			$('.uab-custom-template-option').hide();
			$('.uab-primary-color').show();
			$('.uab-background').show();
			$('.background-image-preview').show();
			break;
			default:
			$('.uab-custom-template-option').hide();
		}	
	}

	$('.uab-custom-settings-content-wrapper').on('change','.uab-custom-template',function(){
		var post_option = $('option:selected',this).val();
		chooseTemplateOptions(post_option);

	});

	$('.uab-profile-content-wrapper').on('change','.uab-custom-template',function(){
		var post_option = $('option:selected',this).val();
		var image_path = uab_variable.plugin_image_path + '/uab-template-screenshorts/'+post_option+'.PNG';
		$(this).closest('.uab-personal-template-select').find('.uab-template-image-preview img').attr('src',image_path);
		chooseTemplateOptions(post_option);
	});

//Js For Media Uploader for Custom Template
	if($('.uab_upload_background_url').val() != ''){
		$('.current-background-image').show(); 
	}else{
		$('.current-background-image').hide();    
	} 

	$('.custom_image_background_button').click(function(e) {
		e.preventDefault();
		
		var image = wp.media({ 
			title: 'Upload Image',
			multiple: false
		}).open()

		.on('select', function(e){
			var uploaded_image = image.state().get('selection').first();
			console.log(uploaded_image);
			var image_url = uploaded_image.toJSON().url;
			$('.uab_upload_background_url').val(image_url);
			$('.current-background-image').find('img').attr('src', image_url);
			if($('.uab_upload_background_url').val(image_url) != ''){
				$('.current-background-image').show(); 
			}else{
				$('.current-background-image').hide();    
			}
		});
	});
/*$('.uab-variable-width').bxSlider({
  minSlides: 3,
  maxSlides: 6,
  infiniteLoop: false,
  pager: false,
  slideWidth: 200,
});*/

//Social Icons ToggleSlide
/*$('.uab-default-tab-wrapper .uab-profile-content-wrapper').hide();
$('.uab-default-tab-wrapper .uab-profile-header').on('click',function(){
	$(this).siblings('.uab-profile-content-wrapper').slideToggle();
});
*/


/**
 * Select Box Jquery
 *  
 * @since 1.0.0
 */
//$('.uab-select-input').selectbox();


/**
 * Backend Settings Tabs Configuration
 *  
 * @since 1.0.0
 */
 $('ul.uab-tabs li').click(function(){
 	var tab_id = $(this).attr('data-tab');

 	$('ul.uab-tabs li').removeClass('current');
 	$('.uab-tab-content').removeClass('current');

 	$(this).addClass('current');
 	$("#"+tab_id).addClass('current');
 });

/**
 * Media Uploader for Custom Template Background
 *  
 * @since 1.0.0
 */
 if($('.uab_upload_background_url').val() != ''){
 	$('.current-background-image').show(); 
 }else{
 	$('.current-background-image').hide();    
 }  

 $('.custom_image_background_button').click(function(e) {
 	e.preventDefault();

 	var image = wp.media({ 
 		title: 'Upload Image',
 		multiple: false
 	}).open()

 	.on('select', function(e){
 		var uploaded_image = image.state().get('selection').first();
 		console.log(uploaded_image);
 		var image_url = uploaded_image.toJSON().url;
 		$('.uab_upload_background_url').val(image_url);
 		$('.current-background-image').find('img').attr('src', image_url);
 		if($('.uab_upload_background_url').val(image_url) != ''){
 			$('.current-background-image').show(); 
 		}else{
 			$('.current-background-image').hide();    
 		}
 	});
 });

/**
 * Media Uploader for Custom Profile Image
 *  
 * @since 1.0.0
 */
 if($('.uab_upload_image_url').val() != ''){
 	$('.image-preview').show(); 
 }else{
 	$('.image-preview').hide();    
 }  

 $('.uab_upload_image_button').click(function(e) {
 	e.preventDefault();

 	var image = wp.media({ 
 		title: 'Upload Image',
 		multiple: false
 	}).open()

 	.on('select', function(e){
 		var uploaded_image = image.state().get('selection').first();
 		console.log(uploaded_image);
 		var image_url = uploaded_image.toJSON().url;
 		$('.uab_upload_image_url').val(image_url);
 		$('.current-image').find('img').attr('src', image_url);
 		if($('.uab_upload_image_url').val(image_url) != ''){
 			$('.image-preview').show(); 
 		}else{
 			$('.image-preview').hide();    
 		}
 	});
 });

 /**
 * Profile Social Icons Sortable js
 *  
 * @since 1.0.0
 */
$('.uap-social-outlets-fields').sortable({containment: "parent"	});


/**
 * Get a random integer between `min` and `max`.
 * 
 * @param {number} min - min number
 * @param {number} max - max number
 * @return {int} a random integer
 */
 function eg_getRandomInt(min, max) {
 	return Math.floor(Math.random() * (max - min + 1) + min);
 }

/**
 * Generates random string
 * 
 * @param {int} length
 * @returns {string}
 * 
 * @since 1.0.0
 */
 function eg_generate_random_string(length) {
 	var string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 	var random_string = '';
 	for (var i = 1; i <= length; i++) {
 		random_string += string[eg_getRandomInt(0, 61)];
 	}
 	return random_string;

 }


 /**
 * Backend jQuery UI Tabs
 *  
 * @since 1.0.0
 */

	var tabs = $( "#tabs" ).tabs({hide: { effect: "fadeOut", duration: 250 },show: { effect: "fadeIn", duration: 250 }});

	// Modal dialog init: custom buttons and a "close" callback resetting the form inside
    var dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      modal: true,
      dialogClass: 'uab-tab-selection-dialog',
      buttons: {
        Add: function() {
          addTab();
          
          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });

    // AddTab form: calls addTab function on submit and closes the dialog
    var form = dialog.find( "form" ).on( "submit", function( event ) {
      addTab();
      dialog.dialog( "close" );
      event.preventDefault();
    });

    //Deleting Tab
	tabs.on( "click", "span.ui-icon-close", function() {
		var panelId = $( this ).closest( "li" ).remove().attr( "aria-controls" );
		$( "#" + panelId ).remove();
		tabs.tabs( "refresh" );
	});

    // AddTab button: just opens the dialog
    $( "#uab-add-field" ).button().on( "click", function() {
        dialog.dialog( "open" );
    });

	keyArray = $('.uab-tab-keys').val();

	//Settings Tab Width
    var activeCounter = $("#tabs .ui-tabs-nav li").length;
    if(activeCounter > 5){
    	var tabWidth = (100/activeCounter);
    	$("#tabs .ui-tabs-nav li").width(tabWidth+'%');	
    }
    else{
    	$("#tabs .ui-tabs-nav li").width('200px');		
    }

	var tabTitle = $( "#uab_tab_title" ),
		tabTemplate = "<li><a href='#{href}'>#{label}<span class='ui-icon ui-icon-close' role='presentation'></span></a></li>";
				
	// Actual addTab function: adds new tab using the input from the form above
	function addTab(){
		tabCounter = eg_generate_random_string(10);
		keyArray = keyArray+','+tabCounter;
		$('.uab-tab-keys').val(keyArray);

		var activeCounter = $("#tabs .ui-tabs-nav li").length;

		$("#tabs .ui-tabs-nav li").width(tabWidth+'%');
		var label = tabTitle.val() || "Tab" + tabCounter,
		id = "tabs-" + tabCounter,
		li = $( tabTemplate.replace( /#\{href\}/g, "#" + id ).replace( /#\{label\}/g, label ) );
		tab_selector = $('.uab-tab-type-selection',this);
		uab_tab_type = $('.uab-tab-type-selection :selected').val();
		switch(uab_tab_type) {
			case 'uab_author_post':
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-recent-post-outer-wrapper').html();
			break;
			case 'uab_company_description':
			$('.new-tab-outer-wrapper .uab-company-info-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-company-info-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-company-info-outer-wrapper').html();
			break;
			case 'uab_contact_form':
			$('.new-tab-outer-wrapper .uab-contact-form-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-contact-form-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-contact-form-outer-wrapper').html();
			break;
			case 'uab_twitter_feeds':
			$('.new-tab-outer-wrapper .uab-twitter-feeds-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-twitter-feeds-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-twitter-feeds-outer-wrapper').html();
			break;
			case 'uab_rss_feeds':
			$('.new-tab-outer-wrapper .uab-rss-feeds-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-rss-feeds-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-rss-feeds-outer-wrapper').html();
			break;
			case 'uab_external_link':
			$('.new-tab-outer-wrapper .uab-external-link-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-external-link-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-external-link-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-external-link-wrapper').html();
			break;
			case 'uab_facebook_feeds':
			$('.new-tab-outer-wrapper .uab-facebook-feeds-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-facebook-feeds-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-facebook-feeds-outer-wrapper').html();
			break;
			case 'uab_shortcode':
			$('.new-tab-outer-wrapper .uab-shortcode-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-shortcode-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-shortcode-outer-wrapper').html();
			break;
			case 'uab_widget':
			$('.new-tab-outer-wrapper .uab-widget-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-widget-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-widget-outer-wrapper').html();
			break;
			case 'uab_editor':
			$('.new-tab-outer-wrapper .uab-editor-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-editor-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-recent-post-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-editor-outer-wrapper').html();
			break;
			case 'uab_linkedin_profile':
			$('.new-tab-outer-wrapper .uab-linkedin-profile-wrapper').find('.uab_tab_name').val(label);
			$('.new-tab-outer-wrapper .uab-linkedin-profile-wrapper').find('.uab_tab_type').val(uab_tab_type);
			$('.new-tab-outer-wrapper .uab-linkedin-profile-wrapper').find('#uab_tab_id').val(tabCounter);
			tabContentHtml = $('.new-tab-outer-wrapper').find('.uab-linkedin-profile-outer-wrapper').html();
			break;
			default:
			alert('nothing selected');
		}


		tabs.find( ".ui-tabs-nav" ).append( li );

		tabs.append( "<div id='" + id + "'>" + tabContentHtml + "</div>");
		
		tab_type_selector = $('#'+id);

		tab_type_selector.find('input').each(function() {
			var name_attr = $(this).attr('name');
			if (name_attr) {

				name_attr = name_attr.replace('uab_id', tabCounter);

				$(this).attr('name', name_attr);

                   // alert(tabCounter);
               }
           });
		tab_type_selector.find('select').each(function() {
			var name_attr = $(this).attr('name');
			if (name_attr) {

				name_attr = name_attr.replace('uab_id', tabCounter);
				$(this).attr('name', name_attr);
			}
		});
		tab_type_selector.find('textarea').each(function() {
			var name_attr = $(this).attr('name');
			if (name_attr) {
				
				name_attr = name_attr.replace('uab_id', tabCounter);
				$(this).attr('name', name_attr);
			}
			var id_attr = $(this).attr('id');
			if (id_attr) {
				
				id_attr = id_attr + '-' + tabCounter;
				$(this).attr('id', id_attr);

				tinymce.execCommand( 'mceRemoveEditor', false, id_attr );
                tinymce.execCommand( 'mceAddEditor', false, id_attr );
                quicktags({id : id_attr});
                //init tinymce
                tinymce.init({
                    selector: id_attr,          
                    relative_urls:false,
                    remove_script_host:false,
                    convert_urls:false,
                    browser_spellcheck:true,
                    fix_list_elements:true,
                    entities:"38,amp,60,lt,62,gt",
                    entity_encoding:"raw",
                    keep_styles:false,
                    paste_webkit_styles:"font-weight font-style color",
                    preview_styles:"font-family font-size font-weight font-style text-decoration text-transform",
                    wpeditimage_disable_captions:false,
                    wpeditimage_html5_captions:true,
                    plugins:"charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                    // selector:"#" + fullId,
                    resize:"vertical",
                    menubar:false,
                    wpautop:true,
                    indent:false,
                    toolbar1:"bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv",
                    toolbar2:"formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                    toolbar3:"",
                    toolbar4:"",
                    tabfocus_elements:":prev,:next",
                    body_class:"id post-type-post post-status-publish post-format-standard",
                }); //init tinymce ends
			}
		});		
		tabs.tabs( "refresh" ).tabs({ active: activeCounter});
		var activeCounter = $("#tabs .ui-tabs-nav li").length;
		if(activeCounter > 5){
			var tabWidth = (100/activeCounter);
			$("#tabs .ui-tabs-nav li").width(tabWidth+'%');	
		}
		else{
			$("#tabs .ui-tabs-nav li").width('200px');		
		}

	};


 function choosePostSelectionType(post_option, currentTabID){
 	switch(post_option) {
 		case 'uab_selective_posts':
 		currentTabID.find('.uab-selective-posts').show();
 		break;
 		default:
 		currentTabID.find('.uab-selective-posts').hide();
 	}	
 }

 $('.uab-backend-tabs').on('change',' select.uab_post_select',function(){
 	var currentTabID = $('#'+$(this).closest('.uab-recent-post-wrapper').parent().attr('id'));
 	var post_option = $('option:selected',this).val();
 	choosePostSelectionType(post_option, currentTabID);
 });

 /**
 * Media Uploader for Company Logo
 *  
 * @since 1.0.0
 */
 if($('.uab_upload_company_url').val() != ''){
 	$('.company-image-preview').show(); 
 }else{
 	$('.company-image-preview').hide();    
 }  	

 $('.uab-backend-tabs').on('click','input.uab_company_image_button', function() {
 	var currentTabID = $('#' + $(this).closest('.uab-company-info-wrapper').parent().attr('id'));
 	var image = wp.media({ 
 		title: 'Upload Image',
 		multiple: false
 	}).open()

 	.on('select', function(e){
 		var uploaded_image = image.state().get('selection').first();
 		console.log(uploaded_image);
 		var image_url = uploaded_image.toJSON().url;
 		currentTabID.find('.uab_upload_company_url').val(image_url);
 		currentTabID.find('.current-company-image').find('img').attr('src', image_url);
 		if(currentTabID.find('.uab_upload_company_url').val(image_url) != ''){
 			currentTabID.find('.company-image-preview').show(); 
 		}else{
 			currentTabID.find('.company-image-preview').hide();    
 		}
 	});
 });

 /**
 * Contact Form Selector
 *  
 * @since 1.0.0
 */
 $('.uab-backend-tabs').on('change',' select.uab-contact-type-selection',function(){
 	var currentTabID = $('#'+$(this).closest('.uab-contact-form-wrapper').parent().attr('id'));
 	var post_option = $('option:selected',this).val();
 	chooseContactSelectionType(post_option, currentTabID);
 });

 function chooseContactSelectionType(post_option, currentTabID){
 	switch(post_option) {
 		case 'uab_shortcode_contact_form':
 		currentTabID.find('.contact-shortcode-wrapper').show();
 		currentTabID.find('.custom-contact-form-fields-wrapper').hide();
 		break;
 		default:
 		currentTabID.find('.contact-shortcode-wrapper').hide();
 		currentTabID.find('.custom-contact-form-fields-wrapper').show();
 	}	
 }

/**
 * Profile Image Selector
 *  
 * @since 1.0.0
 */

function chooseImageType(){
	var image_option = $('.uab_image_select :selected').val();
	switch(image_option) {
		case 'uab_facebook':
		$('.uab-image-upload-option-wrapper').hide();
		$('.uab-facebook-image-upload-wrapper').show();
		break;
		case 'uab_instagram':
		$('.uab-image-upload-option-wrapper').hide();
		$('.uab-instagram-image-upload-wrapper').show();
		break;
		case 'uab_twitter':
		$('.uab-image-upload-option-wrapper').hide();
		$('.uab-twitter-image-upload-wrapper').show();
		break;
		case 'uab_google_plus':
		$('.uab-image-upload-option-wrapper').hide();
		$('.uab-google-plus-image-upload-wrapper').show();
		break;
		case 'uab_upload_image':
		$('.uab-image-upload-option-wrapper').hide();
		$('.uab-custom-image-upload-wrapper').show();
		break;
		default:
		$('.uab-image-upload-option-wrapper').hide();
	}	
}

$('.uab_image_select').on('change',function(){
	chooseImageType();
});

 /**
 * Code Mirror for Custom CSS
 *  
 * @since 1.0.0
 */
 $('.uab-layout-setting-tab').on('click', function() {
 	codeMirrorDisplay();

 });

 function codeMirrorDisplay() {
 	var $codeMirrorEditors = $('.uab-codemirror-textarea');
 	$codeMirrorEditors.each(function(i, el) {
 		var $active_element = $(el);
 		if ($active_element.data('cm')) {
 			$active_element.data('cm').doc.cm.toTextArea();
 		}
 		var codeMirrorEditor = CodeMirror.fromTextArea(el, {
 			lineNumbers: true,
 			lineWrapping: true
 		});
 		$active_element.data('cm', codeMirrorEditor);
 	});
 }

//Widget JS
	var AjaxUrl                   = uab_variable.ajax_url;
	var admin_nonce               = uab_variable._wpnonce;
	var selected_widget_limits    = uab_variable.selected_widget_limits;
	var saving_data               = uab_variable.saving_msg;
	var saved_data                = uab_variable.saved_data;

	$('.lists_widgets').hide();

	$('.uab-backend-tabs').on('click','.uab_add_widgets',function(){
		widgetList = $(this).closest('.uab-select-widget-wrapper').find('.lists_widgets');
		widgetList.show();
	});

	$('.uab-profile-backend-wrapper').on('click', '.all_wp_widgets', function(){
		var count = $(this).parents('.uab-widget-wrapper').find('.uab_widget_area').length;
		var listed_widget = $(this).parents('.uab-widget-wrapper').find('.uab_listed_widgets');
		var append_listed_widget = $(this).parents('.uab-widget-wrapper').find('.listed_selected_widgets');
		var widget_id =$(this).attr('data-value');
		var widget_title =$(this).attr('data-text');  
		var tab_key = $(this).closest('.uab-widget-wrapper').find('#uab_tab_key').attr('name');


		if(count == 1){
			alert(selected_widget_limits);
			$(this).parents('.lists_widgets').hide();
		}else{     

			var widgets = {
				action: "add_selected_widget",
				widget_id: widget_id,
				title: widget_title,
				widget_key: tab_key,
				nonce : admin_nonce
			};

			$.post(AjaxUrl, widgets, function (response) {
				var widget = $(response.data); 
				listed_widget.show();
				append_listed_widget.append(widget);
				add_events_widget(widget);
			});

			$(this).parents('.lists_widgets').hide();
		}

	});
	function add_events_widget(widget) {
		var widget_instance = $(this);
		var widget_title = widget.find(".widget_title span.wptitle");
		var widget_edit = widget.find(".widget-action");
		var widget_inner = widget.find(".widget_inner");
		var widget_id = widget.attr("data-id");

		widget_edit.on('click',function(){
			widget_inner.toggle();
			if (! widget.hasClass("uab_open") && ! widget.data("uab_loaded")) {
				widget_title.addClass('uab_loading');
				$.post(AjaxUrl, {
					action: "edit_widget_data",
					widget_id: widget_id,
					_wpnonce: admin_nonce,
					dataType : 'html'
				}, function (response) {

					var $response = $(response);
					var $form = $response.find('form');


					$(".uab_delete", $form).on("click", function (e) {
						e.preventDefault();

						var data = {
							action: "uab_delete_widget",
							widget_id: widget_id,
							_wpnonce: admin_nonce
						};

						$.post(AjaxUrl, data, function (delete_response) {
							widget.remove();

						});

					});

					$(".uab_close", $form).on("click", function (e) {
						e.preventDefault();
						widget.toggleClass("uab_open");
						widget_inner.hide();
					});


					$form.on("submit", function (e) {
						e.preventDefault();
						var dataa = $(this).serialize();
						$('.uab_save_data').show();
						$('.saving_msg').text(saving_data);
						$.post(AjaxUrl, dataa, function (submit_response) {    
							$('.uab_save_data').fadeOut('slow');
						});

					});

					widget_inner.html($response);

					widget.data("uab_loaded", true).toggleClass("uab_open");

					widget_title.removeClass('uab_loading');

				});

			} else {

				widget.toggleClass("uab_open");
			}

			$(".uab_widget_area").not(widget).removeClass("uab_open");

		}); 

	}

	var widget_area = $('.uab_listed_widgets').find('.listed_selected_widgets');
	$('.uab_widget_area', widget_area).each(function() {
		add_events_widget($(this));
	});	

	if ($('#uab-custom-desc-status').prop('checked')) {
		$('.user-custom-description-wrap').show();
	}
	$('#uab-custom-desc-status').on('click',function(){
		if ($(this).prop('checked')) {
			$('.user-custom-description-wrap').show();
		}
		else{
			$('.user-custom-description-wrap').hide();
		}
	});

	uab_co_author_scripts();
	uabChangeSelection();
	uab_light_checkbox('.uab-bulb-switch');
	$('.uab-bulb-switch').on('click',function(){
		uab_light_checkbox(this);
	});

});


function uabChangeSelection(){
	jQuery('.uab-guest-details-group .uab_selector_field').on('change',function(){
		var selected_group = jQuery(this).attr('id');
		var selected_field = jQuery(this).val();
		jQuery('.uab-guest-details-group .uab_guest_image_selector').hide();
		jQuery('.uab-guest-details-group .uab_'+selected_field+'_option').show();
	});
	jQuery('.uab-guest-details-group .uab_selector_field').trigger('change');
}

function uab_co_author_scripts(){
	jQuery('button.uab_guest_media_manager').click(function(e) {

	var title = 'Choose a Profile';
	var button = 'Select Image';
	var hidden_field = jQuery(this).data('input');
	var preview_img = jQuery(this).data('preview');

	if (jQuery(this).attr('id') == 'uab_bg_image_manager') {
		title = 'Select Background Image';
		button = 'Select Image';
	}

     e.preventDefault();
     $this = this;
       var image = wp.media({
            title: title,
            multiple: false,
            library : {
                type : 'image',
            },
            button:{
            	text: button
            }
        }).open()
                .on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var uab_img_url = uploaded_image.toJSON().url;
                    jQuery($this).parent().children('.' + hidden_field).val(uab_img_url);
                    jQuery($this).parent().children('.' + preview_img).attr('src', uab_img_url);
                });

     });
}

function uab_light_checkbox(current){
	if (jQuery(current).prop('checked')) {
		jQuery(current).parent().parent().siblings('.uab-light-bulb').show();
	}
	else{
		jQuery(current).parent().parent().siblings('.uab-light-bulb').hide();
	}
}