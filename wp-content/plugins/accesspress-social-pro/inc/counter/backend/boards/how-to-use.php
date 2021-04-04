<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="wrap">
     <div class="apsc-add-set-wrapper clearfix">
          <div class="apsc-panel">
               <div class="apsc-settings-header">
                    <div class="apsc-logo">
                         <img src="<?php echo SC_PRO_IMAGE_DIR; ?>/logo.png" alt="<?php esc_attr_e( 'AccessPress Social Counter Pro', 'ap-social-pro' ); ?>" />
                    </div>
               </div>
               <div class="apsc-boards-tabs" id="apsc-board-how_to_use-settings">
                    <h1>AccessPress Social Counter</h1>
                    <div class="apsc-tab-wrapper">
                         <p>
                              The social profiles with counter can be implemented in your site by either using a [aps-counter-pro] <strong>Shortcode</strong> or a<strong> AccessPress Social Counter Pro Widget</strong> from Appearance's widget section or a <strong>floating sidebar</strong>. Each one of them has been described below
                         </p>
                         <h3> Shortcode <strong> [aps-counter-pro] </strong> </h3>
                         <div class="social-text">
                              <p>
                                   You will see that there are a total of five sub tabs inside the Counter Menu. When you use just the shortcode [aps-counter-pro] with no further parameters passed to it. It will take the settings set in the below tabs.
                              </p>
                              <ol>
                                   <li>
                                        <p> <strong>Social Profile:</strong> </p>
                                        <p> This tab here consists of all the social medias that you can use for the counter. You will need to click on the social media you wish to display in the frontend, enable them and then enter all the required details to get the number of followers from the respective social profile. </p>
                                   </li>
                                   <li>
                                        <p> <strong>Display Settings:</strong> </p>
                                        <ul>
                                             <li>
                                                  <strong> Social Profile Order </strong>: You can set a order in which the social networking buttons will be displayed in the frontend by dragging them
                                             </li>
                                             <li>
                                                  <strong>Icon Hover Animations</strong>: You can set a hover animations for your social networking buttons
                                             </li>
                                             <li>
                                                  <strong>Hide Counter</strong>: You can enable this option if you want to hide the (fan/followers) counts
                                             </li>
                                             <li>
                                                  <strong>Counter Format</strong>: You can set a number format of your followers count
                                             </li>
                                             <li>
                                                  <strong>Show Total Count</strong>: Enable this option if you want to show the total number of counts at the end of your social profiles in the backend
                                             </li>
                                             <li>
                                                  <strong>Choose Theme</strong>: You can set any one of the templates for your social networking buttons
                                             </li>
                                        </ul>
                                   </li>
                              </ol>

                              <div class= 'apss-title-div'>
                                   However, if you want multiple shortcode each with different values set to it, you can pass parameters in the shortcode itself. All the possible parameters that you can set in the above shortcode is described below.
                                   <ol>
                                        <li>
                                             <p>theme: </p>
                                             <p> You can pass "theme" parameter to get the desired theme. eg: theme ="theme-1".  One of the following values can be passed to the 'theme' parameter. </p>
                                             <p class="description"> theme-1 , theme-2, theme-3, ............ , theme-41, theme-42</p>
                                        </li>
                                        <li>
                                             <p>hide_count:</p>
                                             <p>You can disable the display of the counter using "hide_count" parameter. eg: hide_count ='1', hide_count='0' .  One of the following values can be passed to the 'hide_count' parameter. </p>
                                             <p class="description">1 : Setting the parameter value to '1' will hide the counter </p>
                                             <p class="description">0 : Setting the value to '0' with display the counter</p>
                                        </li>
                                        <li>
                                             <p>animation:</p>
                                             <p> You can set the animation for the counter buttons using the 'animation' parameter. One of the following values can be passed to the 'animation' parameter.</p>
                                             <p class="description">animation-1, animation-2, animation-3, animation-4, animation-5 </p>
                                        </li>
                                        <li>
                                             <p> counter_format:</p>
                                             <p> You can set the number format for the counter using the "counter_format" parameter. One of the following values can be passed to the 'counter_format' parameter.</p>
                                             <p class="description">default, short, comma</p>
                                        </li>
                                        <li>
                                             <p>profiles:</p>
                                             <p> You can set the social media you want to set in your social counter buttons using the "profiles" parameter.One of the following values can be passed to the 'profile' parameter. </p>
                                             <p class="description">facebook, twitter, instagram, google-plus, soundcloud, dribbble, youtube, steam, vimeo, pinterest, forrst, vk, flickr, behance, github, envato, posts, comments, spotify, twitch, feedly, slideshare, foursquare, delicious, weheartit </p>
                                        </li>
                                        <h4>  For example: [aps-counter-pro theme="theme-19" hide_count='1']</h4>
                                   </ol>

                              </div>
                         </div>
                         <h3>  <strong> Floating Sidebar </strong> </h3>
                         <div class="social-text">
                              <p>
                                   Among the five sub tabs you have in the Social Counter menu, there is a tab named 'Floating Sidebar Settings' that you will need to use inorder to enable the floating sidebar in your site. This tab consists of all the options available for the floating sidebar that you can set.
                              </p>
                              <ul>
                                   <li>
                                        <strong>Enable Floating Sidebar</strong>: Check if you want to show floating sidebar in the frontend
                                   </li>
                                   <li>
                                        <strong>Display Floating Sidebar in</strong>:Select where you want your floating buttons to be displayed in the frontend
                                   </li>
                                   <li>
                                        <strong>Choose Theme</strong>: Select any one of the themes for the sidebar
                                   </li>
                                   <li>
                                        <strong>Hover Background Color</strong>: Select your hover background color for the icon here. You can keep it blank if you dont want any.
                                   </li>
                                   <li>
                                        <strong>Floating Sidebar Position</strong>: A total of 6 different positions are available for the sidebar. Select any one of them from here.
                                   </li>
                                   <li> <strong>Counter Format</strong>:Select any one of the available counter format for your sidebar  </li>

                                   <li> <strong>Hide In Mobile Devices</strong>: Check if you want to hide floating sidebar in the mobile devices</li>

                                   <li> <strong>Social Profiles</strong>: Enter the list of social profiles separated with comma if you want the social networking buttons or their format to be different than one set previously in "Display Settings" tab</li>

                                   <li> <strong>Semi Transparent</strong>: Check if you want to make floating sidebar semi transparent </li>
                              </ul>
                         </div>
                         <h3>  <strong> Widgets </strong> </h3>
                         <div class="social-text">
                              <p>
                                   As soon as you install the plugin, you will find a widget named “AccessPress Social Counter Pro” in the widget section which you can place in any widget area and configure as per your requirement. Since the widget has the multi instance, you can add the same widget as much as you want. You can again set the social profiles, theme, animation and counter number format for the AccessPress Social Counter Pro Widget.
                              </p>
                         </div>
                         <h3>  <strong> Others </strong> </h3>
                         <div class="social-text">
                              <p> Besides all these settings and tabs there are other two tabs inside the Social Counter menu that might be helpful. They are both described below</p>

                              <h4> <strong>1. Cache Settings:</strong> </h4>
                              <p> This option here enables you to set a cache for the plugin so that the counter APIs are not called everytime your page is loaded and hence saving your load time. </p>

                              <h4> <strong>2. Import Export Settings: </strong> </h4>
                              <p> This tab here enables you to import/export all the settings you have set in the plugin's social counter menu. This will help you keep backup of your settings and make changes in the plugin.</p>

                              <h4> <strong>3. Shortcode [aps-get-count] </strong></h4>

                              <p>There is an another shortcode in social counter pro that might be helpful for you all. It is <strong> [aps-get-count] </strong>. It can be used to get the individual folowers count of the social media.  The possible parameters that you can set in this shortcode is described below.</p>
                              <ol>
                                   <li>
                                        <p> social_media:</p>
                                        <p>  You can set the social media you want to set in your social counter buttons using the "social_media" parameter.One of the following values can be passed to the 'profile' parameter. </p>
                                        <p class="description">facebook, twitter, instagram, google-plus, soundcloud, dribbble, youtube, steam, vimeo, pinterest, forrst, vk, flickr, behance, github, envato, posts, comments, spotify, twitch, feedly, slideshare, foursquare, delicious, weheartit </p>
                                   </li>
                                   <li>
                                        <p>count_format:</p>
                                        <p> You can set the number format for the counter using the "count_format" parameter. One of the following values can be passed to the 'counter_format' parameter.</p>
                                        <p class="description">default, short, comma</p>
                                   </li>
                              </ol>
                              <div>
                                   <h4> For example [aps-get-count social_media="facebook" count_format="short"] </h4>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="apss-tab-contents apss-how-to-use" id="tab-apss-how-to-use" >
                    <h1>AccessPress Social Share </h1>
                    <div class="apsc-tab-wrapper">
                         <p>
                              The social profiles with share option can be implemented in your site by either using a [apss-share] <strong> Shortcode</strong> and/or a<strong> AccessPress Social Share Widget</strong> from Appearance's widget section. They can also be displayed inline and/or in a <strong>popup</strong>, and/or a flyin, and/or floating sidebar and/or as a sticky header, depending on your requirements . All of them are described below.
                         </p>

                         <p>
                              Before proceeding with creating an inline button, popup window or flyin window, lets understand what all settings we will need to set that will be common for all of them.
                         </p>
                         <p>
                              When you click on Social Share Pro, you will see that it has a total of 5 main tabs, The tab on the top - Social Share will have further six sub tabs inside it. All the settings that you will set in these sub tabs of Social Share will be common for all the buttons through out your site, unless you use a shortcode to display the buttons with social profile. However, the values set for the other two main tabs - Url shortner and Share Counter Settings will be common for the shortcode aswell.
                         </p>
                         <ol>
                              <li>
                                   <p><strong>Social Network</strong></p>
                                   <p>
                                        You can configure the social media you want to display and sort the orders of selected social medias here
                                   </p>
                              </li>
                              <li>
                                   <p><strong>Share Options</strong></p>
                                   <p>
                                        From Share options tab, you can configure the options for display of the social share icons. You can show the social shares in posts, pages, archive, categories, custom post types, custom taxonomies. Additionally you will get an options for display of the pineterest hover social share options for images.
                                   </p>
                              </li>
                              <li>
                                   <p><strong>Miscellaneous</strong></p>
                                   <p> All the options that you
                                        can set for the social share icons are described below </p>
                                   <ul>
                                        <li>
                                             <p><strong>Twitter Username</strong></p>
                                             <p>
                                                  Enter your twitter username here. This will help extract your twitter share count.
                                             </p>
                                        </li>
                                        <li>
                                             <p><strong>Twitter 3rd Party API Integration</strong></p>
                                             <p>
                                                  Select any one of the two available third party APIs to extract the total share count for Twitter
                                             </p>
                                        </li>
                                        <li>
                                             <p><strong>Facebook APP ID</strong></p>
                                             <p>If facebook counter is not working. Please setup the facebook APP and enter your Facebook App Id here </p>
                                        </li>
                                        <li>
                                             <p><strong>Facebook APP Secret</strong></p>
                                             <p>If facebook counter is not working. Please setup the facebook APP and enter your Facebook App Secret here</p>
                                        </li>
                                        <li>
                                             <p><strong>Fetch Share Counts from HTTP URL</strong></p>
                                             <p>Please set this option as 'Yes', if you have moved your site from HTTP to HTTPS. For Facebook and Google+, The crawler still needs to be able to access the old page, so exempt the crawler's user agent from the redirect and only send an HTTP redirect to non-Facebook crawler clients. If you have done 301 redirect then the old url share counts will be lost.</p>
                                        </li>
                                        <li>
                                             <p><strong>Social Share Link Option</strong></p>
                                             <p>Select how you wish your share link to be opened in the windows</p>
                                        </li>
                                        <li>
                                             <p><strong>Disable WhatsApp Share</strong></p>
                                             <p>
                                                  Select 'Yes' to disable WhatsApp share in non mobile devices
                                             </p>
                                        </li>
                                        <li>
                                             <p><strong>Disable Viber Share</strong></p>
                                             <p>
                                                  Select 'Yes' to disable Viber share in non mobile devices
                                             </p>
                                        </li>
                                        <li>
                                             <p><strong>Disable SMS Share</strong></p>
                                             <p>
                                                  Select 'Yes' to disable SMS share in non mobile devices
                                             </p>
                                        </li>
                                        <li>
                                             <p><strong>Disable Messenger Share</strong></p>
                                             <p>
                                                  Select 'Yes' to disable Messenger share in non mobile devices
                                             </p>
                                        </li>
                                   </ul>
                              </li>
                              <li>
                                   <p><strong>Custom Text</strong></p>
                                   <p> You can set the custom short and long share texts here. If you keep it blank the default values will be loaded.</p>
                              </li>
                              <li>
                                   <p><strong>Template Settings</strong></p>
                                   <p></p>
                                   <ul>
                                        <li>
                                             <p><strong>Social Icon Sets</strong></p>
                                             <p>Please select any one of the available templates</p>
                                        </li>
                                        <li>
                                             <p><strong>Enable Animation</strong></p>
                                             <p>Check to enable animation in the share buttons</p>
                                        </li>
                                        <li>
                                             <p><strong>Animation Template</strong></p>
                                             <p>Please select any one of the available animation templates</p>
                                        </li>
                                   </ul>
                              </li>
                         </ol>
                         <p>
                              Now that all the common settings has been set for the social share icons, we can proceed with the individual settings for each of the display methods. Each of them has been described below.
                         </p>
                         <h3> <strong>Inline Display</strong> </h3>
                         <div class = "social-text">
                              <p>
                                   The social share icon can be placed above or below the post content of any page/post. Please go to the "Display Settings" sub tab inside "Social Share" tab. You will find the "Inline Buttons Settings" there. The options taken by inline button settings are as follows.
                              </p>
                              <ul>
                                   <li>
                                        <p><strong>Display Position</strong></p>
                                        <p>
                                             Please select any one of the postions for inline share buttons
                                        </p>
                                   </li>
                                   <li>
                                        <p><strong>Buttons Align</strong></p>
                                        <p>
                                             Please select one of the available alignments for inline share buttons
                                        </p>
                                   </li>
                              </ul>
                         </div>
                         <h3> <strong> Popup Display </strong> </h3>
                         <div class = "social-text">
                              <p>
                                   Please go to the "Display Settings" sub tab inside "Social Share" tab. You will find the "Popup Settings" there. The options taken by popup display settings are as follows.
                              </p>
                              <ul>
                                   <li>
                                        <p><strong>Enable Popup</strong></p>
                                        <p>Select 'Yes' to enable popup display of share buttons</p>
                                   </li>
                                   <li>
                                        <p><strong>Popup Window Title</strong></p>
                                        <p>Please enter a popup window title for the popup window</p>
                                   </li>
                                   <li>
                                        <p><strong>Popup Window Message</strong></p>
                                        <p>Please enter a popup window message for the popup window</p>
                                   </li>
                                   <li>
                                        <p><strong>Popup Optimization</strong></p>
                                        <p>Select any one of the available options to display the popup window</p>
                                   </li>
                                   <li>
                                        <p><strong>Popup Delay Time</strong></p>
                                        <p>Enter the time value after which you want your popup to be displayed. Note: time must be entered in seconds</p>
                                   </li>
                                   <li>
                                        <p><strong>Percent of content viewed</strong></p>
                                        <p>Enter the percent value after which you want your popup to be displayed</p>
                                   </li>
                              </ul>
                         </div>
                         <h3><strong>Flyin Display</strong></h3>
                         <div class = "social-text">
                              <p>
                                   Please go to the "Display Settings" sub tab inside "Social Share" tab. You will find the "Flyin Settings" there. The options taken by flyin display settings are as follows.
                              </p>
                              <ul>
                                   <li>
                                        <p><strong>Enable Flyin</strong></p>
                                        <p>Select 'Yes' to enable Flyin window</p>
                                   </li>
                                   <li>
                                        <p><strong>Fly in Window Title</strong></p>
                                        <p>Enter title for the flyin window</p>
                                   </li>
                                   <li>
                                        <p><strong>Fly in Window Message</strong></p>
                                        <p>Enter message to be displayed in the flyin window</p>
                                   </li>
                                   <li>
                                        <p><strong>Fly in Location</strong></p>
                                        <p>Select any one of the positions for the flyin window</p>
                                   </li>
                              </ul>
                         </div>
                         <h3><strong>Sticky Header Display</strong></h3>
                         <div class = "social-text">
                              <p>
                                   Sticky Header Share Settings is one of the sub tabs of 'Social Share' tab. The options taken by it are as follows.
                              </p>
                              <ul>
                                   <li>
                                        <p><strong>Enable Sticky Share Buttons At Top</strong></p>
                                        <p>Enable this option to display sticky share button at the top of your site</p>
                                   </li>
                                   <li>
                                        <p><strong>Upload Site Logo</strong></p>
                                        <p>Enable your site logo here</p>
                                   </li>
                                   <li>
                                        <p><strong>URL address of the site logo</strong></p>
                                        <p>The link to your uploaded site logo will be placed here upon completion of the upload</p>
                                   </li>
                                   <li>
                                        <p><strong>Sticky Header Share Site Logo Preview</strong></p>
                                        <p>The preview of your uploaded site logo will be displayed here</p>
                                   </li>
                              </ul>
                         </div>
                         <h3><strong>Floating Sidebar Display</strong> </h3>
                         <div class = "social-text">
                              <p>
                                   Please go to the "Display Settings" sub tab inside "Social Share" tab. You will find the "Floating Buttons Settings" there. The options taken by floating buttons settings are as follows.
                              </p>
                              <ul>
                                   <li>
                                        <p><strong>Enable Floating Social Share</strong></p>
                                        <p>Select 'Yes' to enable the floating share buttons</p>
                                   </li>
                                   <li>
                                        <p><strong>Social Network</strong></p>
                                        <p>Select the social medias you want to be displayed in the floating sidebar. Also, please drag drop to set an order for them</p>
                                   </li>
                                   <li>
                                        <p><strong>Enable 'Hide/Show' Button</strong></p>
                                        <p>Select 'Yes' to enable hide/show button for floating sidebar. Note: It is only available for top left, top right, middle left and middle right sidebar positions</p>
                                   </li>
                                   <li>
                                        <p><strong>Semi Transparent</strong></p>
                                        <p>Select 'Yes' to make the sidebar semi transparent</p>
                                   </li>
                                   <li>
                                        <p><strong>Disable In Mobile Devices</strong></p>
                                        <p>Select 'Yes' to disable floating sidebar in mobile devices</p>
                                   </li>
                                   <li>
                                        <p><strong>Theme selection</strong></p>
                                        <p>Please select any one of the available templates</p>
                                   </li>
                                   <li>
                                        <p><strong>Floating positions</strong></p>
                                        <p>Select any one of the positions for floating sidebar. Please note that if you have enabled to show floating sidebar in mobile devices, the theme you have selected will not take effect and the social share buttons will always appear at the bottom of the page</p>
                                   </li>
                                   <li>
                                        <p><strong>Enable Share Count</strong></p>
                                        <p>Select 'Yes' to display share count in floating sidebar</p>
                                   </li>
                                   <li>
                                        <p><strong>Enable Total Share Count</strong></p>
                                        <p>Select 'Yes' to display total share count in floating sidebar</p>
                                   </li>
                                   <li>
                                        <p><strong>Enable Show All Button</strong></p>
                                        <p>Select 'Yes' to display the show all button at the end of the floating sidebar. This button will display all the social medias in a popup.</p>
                                   </li>
                              </ul>
                         </div>
                         <h3><strong>Widget Display</strong></h3>
                         <div class = "social-text">
                              <p>
                                   As soon as you install the plugin, you will find a widget named “AccessPress Social Share Pro” in the widget section which you can place in any widget area and configure as per your requirement. Since the widget has the multi instance, you can add the same widget as much as you want. The options you can set for the widget are as follows.
                              </p>
                              <ul>
                                   <li>
                                        <p><strong>Theme</strong></p>
                                        <p>Set any one of the available themes for the social share icons that will be displayed in the widget </p>
                                   </li>
                                   <li>
                                        <p><strong>Enable Counter</strong></p>
                                        <p>Select 'Yes' to display share counter in the social share icons</p>
                                   </li>
                                   <li>
                                        <p><strong>Enable Total Counter</strong></p>
                                        <p>Select 'Yes' to display total share count in the social share icons</p>
                                   </li>
                                   <li>
                                        <p><strong>Networks</strong></p>
                                        <p>Enter the name of the social medias that you want to display in the widget</p>
                                   </li>
                                   <li>
                                        <p><strong>Share Text</strong></p>
                                        <p>Enter custom share text for the social share icons of the widget</p>
                                   </li>
                                   <li>
                                        <p><strong>Custom Share Link</strong></p>
                                        <p>Enter the custom share link for the social share icons</p>
                                   </li>
                                   <li>
                                        <p><strong>Alignment</strong></p>
                                        <p>Set the alignment for the social share icon</p>
                                   </li>
                                   <li>
                                        <p><strong>Widget Background Color</strong></p>
                                        <p>Set a background color for the widget</p>
                                   </li>
                              </ul>
                         </div>
                         <h3><strong>Shortcode [apss-share]</strong></h3>
                         <div class = "social-text">
                              <p>
                                   Besides all the methods of integrating the social share buttons in your site, you can also use shortcode to display your share icon any where you want. When you click/hover on the AccessPress Social Pro menu in WordPress's left admin menu, you will see a sub menu named 'Shortcode Generator'. You will need to use the 'Social Share' tab inside this submenu inorder to generate a shortcode.
                              </p>
                              <ol>
                                   <li>
                                        <p><strong>Social Network Settings</strong></p>
                                        <p>
                                             You can configure the social media you want to display and sort the orders of selected social medias here
                                        </p>
                                   </li>
                                   <li>
                                        <p><strong>Display Settings</strong></p>
                                        <p></p>
                                        <ul>
                                             <li>
                                                  <p><strong>Template Settings</strong></p>
                                                  <p>Please select any one of the available templates</p>
                                             </li>
                                             <li>
                                                  <p><strong>Enable Animation</strong></p>
                                                  <p>Check to enable animation in the share buttons</p>
                                             </li>
                                             <li>
                                                  <p><strong>Animation Template</strong></p>
                                                  <p>Please select any one of the available animation templates</p>
                                             </li>
                                             <li>
                                                  <p><strong>Display Type</strong></p>
                                                  <p>Please choose any one of the available display methods and set their respective options</p>
                                             </li>
                                        </ul>
                                   </li>
                                   <li>
                                        <p><strong>Miscellaneous</strong></p>
                                        <p> All the options that you
                                             can set for the social share icons are described below </p>
                                        <ul>
                                             <li>
                                                  <p><strong>Twitter Username</strong></p>
                                                  <p>
                                                       Enter your twitter username here. This will help extract your twitter share count.
                                                  </p>
                                             </li>
                                             <li>
                                                  <p><strong>Twitter 3rd Party API Integration</strong></p>
                                                  <p>
                                                       Select any one of the two available third party APIs to extract the total share count for Twitter
                                                  </p>
                                             </li>
                                             <li>
                                                  <p><strong>Facebook APP ID</strong></p>
                                                  <p>If facebook counter is not working. Please setup the facebook APP and enter your Facebook App Id here </p>
                                             </li>
                                             <li>
                                                  <p><strong>Facebook APP Secret</strong></p>
                                                  <p>If facebook counter is not working. Please setup the facebook APP and enter your Facebook App Secret here</p>
                                             </li>
                                             <li>
                                                  <p><strong>Enable Share Count</strong></p>
                                                  <p>Select 'Yes' to enable share count</p>
                                             </li>
                                             <li>
                                                  <p><strong>Enable Total Share Count</strong></p>
                                                  <p>Select 'Yes' to enable total share count</p>
                                             </li>
                                             <li>
                                                  <p><strong>Custom Share Link</strong></p>
                                                  <p>Enter the custom share link for the share icons</p>
                                             </li>
                                             <li>
                                                  <p><strong>Fetch Share Counts from HTTP URL</strong></p>
                                                  <p>Please set this option as 'Yes', if you have moved your site from HTTP to HTTPS. For Facebook and Google+, The crawler still needs to be able to access the old page, so exempt the crawler's user agent from the redirect and only send an HTTP redirect to non-Facebook crawler clients. If you have done 301 redirect then the old url share counts will be lost.</p>
                                             </li>
                                             <li>
                                                  <p><strong>Social Share Link Option</strong></p>
                                                  <p>Select how you wish your share link to be opened in the windows</p>
                                             </li>
                                             <li>
                                                  <p><strong>Disable WhatsApp Share</strong></p>
                                                  <p>
                                                       Select 'Yes' to disable WhatsApp share in non mobile devices
                                                  </p>
                                             </li>
                                             <li>
                                                  <p><strong>Disable Viber Share</strong></p>
                                                  <p>
                                                       Select 'Yes' to disable Viber share in non mobile devices
                                                  </p>
                                             </li>
                                             <li>
                                                  <p><strong>Disable SMS Share</strong></p>
                                                  <p>
                                                       Select 'Yes' to disable SMS share in non mobile devices
                                                  </p>
                                             </li>
                                             <li>
                                                  <p><strong>Disable Messenger Share</strong></p>
                                                  <p>
                                                       Select 'Yes' to disable Messenger share in non mobile devices
                                                  </p>
                                             </li>
                                        </ul>
                                   </li>
                                   <li>
                                        <p><strong>Custom Text</strong></p>
                                        <p> You can set the custom short and long share texts here. If you keep it blank the default values will be loaded.</p>
                                   </li>
                              </ol>
                              <p>
                                   Set all the available options in the Social Share's shortcode tabs and once done, click on the "Click Me To Generate Shortcode" button at the end of the page. This will generate a shortcode with all your entered setting. The generated shortcode can then be copied and pasted in your desired location.
                              </p>
                         </div>
                         <h3><strong>Others</strong></h3>
                         <div class= "social-text">
                              <p>You can use <code>[apss_count]</code> shortcode to display the share counts number only in the content using shortcode. You can wrap that number in your reqired html tags and use it as per your need. The share count displayed will be the sum of entered network attributes.</p>
                              <ul class="how-list">
                                   <li>Example: <code>[apss_count]</code></li>
                                   <li>Available shortcode Parameters
                                        <ol>
                                             <li>
                                                  <p><strong> network </strong></p>
                                                  <p> You can define which social medias to show total share counts. You need to enter the networks name in string in comma separated values. You need to enter at least one network attribute. </p>
                                                  <p>Available network parameters are: facebook, twitter, google-plus, pinterest, linkedin, delicious, reddit, stumbleupon, vkontakte, buffer</p>
                                                  <p>Example 1.1: <code>[apss_count network='facebook, pinterest']</code></p>
                                                  <p>This will show the sum of share counts from facebook and pinterest.</p>
                                             </li>
                                             <li>
                                                  <p><strong>custom_url_link</strong> </p>
                                                  <p>Now you can use attribute "custom_url_link" to fetch the share counts for custom url as well.</p>
                                                  <p>Example 1.2: <code>[apss_count network='facebook, pinterest' custom_url_link='<?php echo site_url( 'sample-page' ); ?>']</code></p>
                                                  <p>This attribute is useful in case if the shortcode is not fetching the share counts for shortcode placed url and force the shortcode to use the url from the attribute defined in  custom_url_link.</p>
                                             </li>
                                        </ol>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>