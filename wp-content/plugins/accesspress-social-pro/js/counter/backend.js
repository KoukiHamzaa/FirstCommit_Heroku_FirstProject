jQuery(document).ready(function($) {
     /*
      Settings Tabs Switching
      */
     $('.apsc-tabs-trigger').click(function() {
          $('.apsc-tabs-trigger').removeClass('apsc-active-tab');
          $(this).addClass('apsc-active-tab');
          var board_id = 'apsc-board-' + $(this).attr('id');
          $('.apsc-boards-tabs').hide();
          $('#' + board_id).show();
          var pageURL = $(this).attr("href");

          if (pageURL === '#import-export') {
               $('#optionsframework-submit').hide();
          } else {
               $('#optionsframework-submit').show();
          }
          $('.apsc-hashtag-save').find('input[type="hidden"]').val(pageURL);
     });

     $('.apsc-tabs-trigger').each(function() {
          var pageURL = $(this).attr("href");
          //alert(pageURL);
          //alert(location.hash);
          if (pageURL === location.hash) {
               $(this).click();
          }
     });

     /**
      * For sortable
      */
     // $('.apsc-sortable').sortable({containment: "parent"});

     // Major Update Coding Start

     $('.apsc-left-icon').css('cursor', 'pointer');
     $('.apsc-sortable').sortable({
          items: '.apsc-sortable-elements-wrap',
          handle: '.apsc-left-icon'
     });

     $('.apsc-colorpicker').wpColorPicker();

     $('body').on('click', '.apsc-abc', function(e) {
          if ($(this).closest('.apsc-option-outer-wrapper').find('span').hasClass("fa-chevron-down")) {
               var selector = $(this);
               $(this).addClass('apsc-element-border');
               selector.children('.apsc-element-action-buttons').find('span').removeClass().addClass("fa fa-chevron-up");
               $(this).closest('.apsc-option-outer-wrapper').find('.apsc-elements-settings-wrap').slideDown(1000, function() {
               });
          } else {
               var selector = $(this);

               selector.children('.apsc-element-action-buttons').find('span').removeClass().addClass("fa fa-chevron-down");
               $(this).closest('.apsc-option-outer-wrapper').find('.apsc-elements-settings-wrap').slideUp(1000, function() {

               });
               $(this).closest('.apsc-element').removeClass('apsc-element-border');
          }
     });

     $(".apsc-common").first().addClass("temp-active");
     $('#icon-template').on('change', function() {
          var template_value = $(this).val();
          var array_break = template_value.split('-');
          var current_id = array_break[1];
          //var current_id = template_value;
          if (current_id <= 42) {
               $('#apsc-temp-demo-' + current_id).removeClass('temp-active');
               $('.apsc-common').hide();
               $(this).addClass('temp-active');
               $('#apsc-temp-demo-' + current_id).show();
          }

          if (current_id <= 20) {
               $('#apsc-counter-ani-div').show();
          } else {
               $('#apsc-counter-ani-div').hide();
          }
     });
     if ($("#icon-template option:selected")[0]) {
          var cur_temp_val = $('#icon-template option:selected').val();
          var array_break = cur_temp_val.split('-');
          var current_id = array_break[1];
          //var current_id = cur_temp_val;
          $('.apsc-common').hide();
          $('#apsc-temp-demo-' + current_id).show();
     }


     $(".apsc-common-floating").first().addClass("temp-active");
     $('#floating-template').on('change', function() {
          var template_value = $(this).val();
          var array_break = template_value.split('-');
          var current_id = array_break[1];
          //var current_id = template_value;
          if (current_id <= 25) {
               $('#apsc-temp-demo-floating' + current_id).removeClass('temp-active');
               $('.apsc-common-floating').hide();
               $(this).addClass('temp-active');
               $('#apsc-temp-demo-floating' + current_id).show();
          }
     });
     if ($("#floating-template option:selected")[0]) {
          var cur_temp_val = $('#floating-template option:selected').val();
          var array_break = cur_temp_val.split('-');
          var current_id = array_break[1];
          //var current_id = cur_temp_val;
          $('.apsc-common-floating').hide();
          $('#apsc-temp-demo-floating' + current_id).show();
     }

     $('.apss-facebook-method').click(function() {
          var method = $(this).val();
          if (method === '1') {
               $('.apss-facebook-method-1').show();
               $('.apss-facebook-method-2').hide();
          } else {
               $('.apss-facebook-method-2').show();
               $('.apss-facebook-method-1').hide();
          }
     });


     $('.apsc-media-uploader').on('click', function() {
          var selector = $(this);
          var file = wp.media({
               title: 'Upload file',
               multiple: false //true if you want to upload multiple files at once
          }).open()
          .on('select', function(e) {
               var uploaded_file = file.state().get('selection').first();
               console.log(uploaded_file);
               var file_url = uploaded_file.toJSON().url;
               selector.parent().find('input[type="text"]').val(file_url);
               $('#apsc-imported-file-content').load(file_url);
          });
     });


     $('#apsc-import-file-button').click(function() {
          var imported_data = $('#apsc-imported-file-content').val();
          $.ajax({
               type: 'post',
               url: apsc_backend_js_obj.ajax_url,
               data: {
                    imported_data: imported_data,
                    action: 'apsc_imported_settings_ajax_action',
                    _wpnonce: apsc_backend_js_obj.ajax_nonce
               },
               beforeSend: function(xhr) {
               },
               success: function(res) {
                    location.reload();
                    alert("File sucessfully imported and implemented.");
               }
          });
     });
});

function fbrev_init(data) {

     var el = document.querySelector('#' + data.widgetId);
     if (!el)
          return;

     var fbConnectBtn = el.querySelector('#apsc_fb_connect');
     WPacFastjs.on(fbConnectBtn, 'click', function() {
          fbrev_connect(el, data);
          return false;
     });
}

function fbrev_connect(el, data) {

     fbrev_popup('https://app.widgetpack.com/auth/fbrev?scope=manage_pages,pages_show_list', 670, 520, function() {
          WPacXDM.get('https://embed.widgetpack.com', 'https://app.widgetpack.com/widget/facebook/accesstoken', {}, function(res) {
               WPacFastjs.jsonp('https://graph.facebook.com/me/accounts', {access_token: res.accessToken, limit: 250}, function(res) {

                    var pagesEl = el.querySelector('.apsc-fb-pages-list'),
                    idEl = el.querySelector('.apsc-page-id'),
                    nameEl = el.querySelector('.apsc-page-name'),
                    tokenEl = el.querySelector('.apsc-page-token');

                    WPacFastjs.each(res.data, function(page) {

                         var pageEL = WPacFastjs.create('div', 'apsc-page');
                         pageEL.innerHTML = '<img src="https://graph.facebook.com/' + page.id + '/picture" class="apsc-page-photo">' +
                         '<div class="apsc-page-name">' + page.name + '</div>';
                         pagesEl.appendChild(pageEL);

                         WPacFastjs.on(pageEL, 'click', function() {
                              idEl.value = page.id;
                              nameEl.value = page.name;
                              tokenEl.value = page.access_token;
                              jQuery(tokenEl).change();

                              WPacFastjs.remcl(pagesEl.querySelector('.active'), 'active');
                              WPacFastjs.addcl(pageEL, 'active');

                              data.cb && data.cb();
                              return false;
                         });
                    });
               });
          });
     });
     return false;
}

function fbrev_popup(url, width, height, cb) {
     var top = top || (screen.height / 2) - (height / 2),
     left = left || (screen.width / 2) - (width / 2),
     win = window.open(url, '', 'location=1,status=1,resizable=yes,width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
     function check() {
          if (!win || win.closed !== false) {
               cb();
          } else {
               setTimeout(check, 100);
          }
     }
     setTimeout(check, 100);
}