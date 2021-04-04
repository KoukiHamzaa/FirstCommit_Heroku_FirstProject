<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
<div class="uab-settings-header-wrapper-main">
	<div class="uab-settings-header-wrapper-main-wrap uab-clearfix">
		<div class="uab-settings-header-title">
			<div class="uab-title-menu"><?php _e('Ultimate Author Box');?></div>
			<div class="uab-version-wrap">
				<span>Version <?php _e(UAB_VERSION);?></span>
			</div>
		</div>
		<div class="uab-header-social-link">
			<p class="uab-follow-us">Follow us for new updates</p>
			<iframe src="//www.facebook.com/plugins/follow?href=https%3A%2F%2Fwww.facebook.com%2FAccessPressThemes&amp;layout=button&amp;show_faces=true&amp;colorscheme=light&amp;width=450&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:px; height:20px;" allowTransparency="true"></iframe>
			<iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-follow-button twitter-follow-button-rendered" style="position: static; visibility: visible; width:px; height: 20px;" title="Twitter Follow Button" src="http://platform.twitter.com/widgets/follow_button.c4fd2bd4aa9a68a5c8431a3d60ef56ae.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=apthemes&amp;show_count=false&amp;show_screen_name=true&amp;size=m&amp;time=1484717853708" data-screen-name="accesspressthemes"></iframe>
		</div>
	</div>
</div><!--End of uab-settings-header-wrapper-main-->
<div class="uab-setting-page-wrapper">
<div class="uab-setting-page-wrapper-contain">
<h1>How to use the plugin</h1>
Once you have successfully installed the plugin, check on the left admin panel for Ultimate Author Box. Clicking on it will lead you to the Author Box General Settings.
<h2>General Settings</h2>
In General Setting, you can control where and how Author Box appears in the frontend.
<ul>
 	<li><strong>Disable Ultimate Author Box:</strong> This will disable the Author Box completely, even shortcode will not work.</li>
 	<li><strong>Choose place to show Author Box:</strong> This options allows you to append/add author box to your post/pages/custom post type. If you have custom post types and want to show the Author Box, a list of registered custom post types should appear and you can check the custom post types.</li>
 	<li><strong>Show Author Box at:</strong> Choose the positions where you want the Author Box to appear. The available positions are top/bottom or none.</li>
 	<li><strong>Hide Author Box if Author Biographical Info is empty:</strong> Sometimes if you have many authors, some people may not have filled their profile Biographical information in their Profile page. In such case, enable this feature to not show Author box for respective users.</li>
 	<li><strong>Show Default Biographical Info if empty:</strong> Sometimes if you have many authors, some people may not have filled their profile Biographical information in their Profile page. In such case, set a default message.</li>
 	<li><strong>Frontend link target options:</strong> Set this so that all links in the Author Box open in either a new page or the same page.</li>
 	<li><strong>Show Author Info Pop-up:</strong> Choose whether to show Author Info Pop-up on Author Box image click.</li>
</ul>
<h2>Permission Settings</h2>
In Permission Settings, you can select which Registered User Roles can have access to the Author Box settings in their Profile Page (Dashboard-&gt; Users-&gt; Your Profile). Some User roles may not have a Profile Page by default; in such cases the author box for those users cannot be set. <p>Please check WordPress Roles and Capabilities <a href="https://codex.wordpress.org/Roles_and_Capabilities">https://codex.wordpress.org/Roles_and_Capabilities</a> to check your User accessibility.</p>
<h2>Twitter Feeds Settings</h2>
For convenience and since Twitter allows this, we have made this feature so that the Admin can set a Twitter App once and other users can show their twitter feed by just using their Username.
If you are a not the admin and your twitter feed do not work, please contact your site admin to confirm that they have set the Twitter App.
<h3>Steps to configure Twitter:</h3>
<ul>
 	<li>First you need to go to <a href="https://apps.twitter.com/" target="_blank">https://apps.twitter.com/</a></li>
 	<li>You need to login to Twitter if you are not already logged in.</li>
 	<li>Click on Create New App</li>
 	<li>You will need to fill a Create an Application form where you need to specify the application Name, Description, Website, a callback URL(optional) and agree to the Developer Agreement. Once you have filled all the form fields click on create your Twitter Application.</li>
 	<li>Congratulation you have created a Twitter App! To get your Consumer Key(API Key) and Consumer Secret(API Secret), go to the Keys and Access Tokens Tab.</li>
 	<li>Check the Application setting to get your Consumer Key(API Key) and Consumer Secret(API Secret).</li>
 	<li>Look for Create my Access Token button to generate your Access token and Access token secret. Click on the button to view your Access token and Access token secret.</li>
 	<li>And you are done! Now you can use API Key, API Secret, Access token and Access token secret. Unlink Facebook, same twitter keys can be used for multiple sites.</li>
</ul>
<h2>Layout Settings</h2>
Set how your Author Box appears in the frontend.
<ul>
 	<li><strong>Select Template:</strong> Choose a Template to represent the Author Box according to your preference. We provide you with 15+ ready to go templates to select from or select the Custom Template Option.
This is a general template setting which can be overwritten by Template setting from the individual User Profile Page (Dashboard-&gt; Users-&gt; Your Profile).</li>
 	<li><strong>Enable custom CSS:</strong> Use this to enable the Custom CSS Section.</li>
 	<li><strong>Custom CSS Section:</strong> Enter custom CSS code here to custom modify our templates in the frontend.</li>
</ul>
<h2>Custom Settings</h2>
If you have selected Select Template as Custom Template, you can choose from a set of the pre-available templates and choose to modify its, primary, secondary and tertiary color and background image according to the Template. All custom options may not appear in all templates.

<h2>Save Changes</h2> Click on save changes to save your settings.

<h2>Restore Default Settings</h2>  Revert all setting to its initial installed settings.

The Default Settings are:
<table>
<tbody>
<tr>
<td width="297">Option</td>
<td width="293">Status</td>
</tr>
<tr>
<td width="297">Disable Ultimate Author Box</td>
<td width="293">False</td>
</tr>
<tr>
<td width="297">Choose place to show Author Box</td>
<td width="293">Post/Page/Custom Post Type</td>
</tr>
<tr>
<td width="297">Show Author Box at</td>
<td width="293">Bottom of Posts</td>
</tr>
<tr>
<td width="297">Hide Author Box if Author Biographical Info is empty</td>
<td width="293">False</td>
</tr>
<tr>
<td width="297">Show Default Biographical Info if empty</td>
<td width="293">True</td>
</tr>
<tr>
<td width="297">Frontend link target options</td>
<td width="293">New Page</td>
</tr>
<tr>
<td width="297">Show Author Info Pop-up</td>
<td width="293">True</td>
</tr>
<tr>
<td width="297">Permission Settings</td>
<td width="293">All Enabled</td>
</tr>
<tr>
<td width="297">Consumer Key (API Key)</td>
<td width="293">NULL</td>
</tr>
<tr>
<td width="297">Consumer Secret (API Secret)</td>
<td width="293">NULL</td>
</tr>
<tr>
<td width="297">Access Token</td>
<td width="293">NULL</td>
</tr>
<tr>
<td width="297">Access Token Secret</td>
<td width="293">NULL</td>
</tr>
<tr>
<td width="297">Cache Period</td>
<td width="293">1</td>
</tr>
<tr>
<td width="297">Select Template</td>
<td width="293">Template 1</td>
</tr>
<tr>
<td width="297">Enable Custom CSS Section</td>
<td width="293">True</td>
</tr>
<tr>
<td width="297">Custom CSS</td>
<td width="293">Empty</td>
</tr>
<tr>
<td width="297"></td>
<td width="293"></td>
</tr>
<tr>
<td width="297"></td>
<td width="293"></td>
</tr>
</tbody>
</table>


<strong>Go to Profile Settings:</strong> Once you are gone with General settings, click on Go to Profile Settings to begin editing your individual User Profiles.
<h1>Profile Settings</h1>
<p>After setting your General Settings, the next thing is the Profile Settings. To set your Profile settings go to Dashboard-&gt; Users-&gt; Your Profile.</p>

<p>If you are the admin, you can go to Dashboard-&gt; Users-&gt; All Users-&gt; Select a User and choose to edit any of your User profile.</p>

<p>The default user information such as Display name publicly as, Email, Website, Biographical Info, Profile Picture(Gravatar Image) provided by WordPress will be used by the plugin as name, email, website, description and default image. For additional settings you can configure Ultimate Author Box Profile Settings.</p>

<p>If you are not the admin and you do not have Ultimate Author Box Profile Settings, please contact your admin and ask them to enable Ultimate Author Box Profile Settings in your profile page. (If you are the admin, check Permission Settings).</p>

<p>If you have the Ultimate Author Box Profile Settings you should see an Author Details Tab there. This is a Default tab and cannot be deleted.</p>
<h2>Author Details tab:</h2>
<ul>
 	<li><strong>Frontend Tab Title:</strong> This content will replace the string ‘Author Details’ in the Frontend tab title and act as Author Detail Tab content header in template 4,5,6,10,12,14,16.</li>
 	<li><strong>Profile Image Settings</strong>:
<ul>
 	<li>Choose Image Type: You can use your Profile image as the default Gravatar Image or use image from Social Profile such as Facebook, Twitter, Instagram or Upload an image from the Media Library. By default your profile image is your Gravatar image. If you have made any mistake with your image settings then your image will revert back to your Gravatar image.
Getting Social Profile Images:
<ul>
 	<li><strong>Facebook:</strong> To display your Facebook Profile image, you will need your Facebook User ID. To get your User ID go to http://findmyfbid.com/ paste your Facebook Profile URL and click on Find Numeric ID.</li>
 	<li><strong>Instagram:</strong> To get your Instagram Image ID, Please open any image on Instagram you want in the single preview. If your image URL is https://www.instagram.com/p/7FfbBpSOaC/ then 7FfbBpSOaC is your Instagram Image ID</li>
 	<li><strong>Twitter: </strong>To get your Twitter Username, Please open your twitter profile. If your profile URL is https://twitter.com/apthemes then apthemes is your Twitter username.</li>
</ul>
</li>
 	<li><strong>Choose Image Shape:</strong> You can set your Profile image to be either round or boxed. This setting is applicable for all templates.</li>
</ul>
</li>
 	<li><strong>Company Information:</strong> You can enter your workplace and designation information here. If you leave any field blank, the respective field will not appear in the frontend.
<ul>
 	<li><strong>Company Name:</strong> Enter your work place name here.</li>
 	<li><strong>Company URL:</strong> Enter your Company Website link here.</li>
 	<li><strong>Designation:</strong> Enter your Designation link here.</li>
 	<li><strong>Separator:</strong> Enter a separator to separate your Designation and Company name. Designation [separator] Company Name. Example, Plugin Developer at AccessPress</li>
 	<li><strong>Phone Number:</strong> Enter a Phone number</li>
 </ul>
 	<li><strong>Social Media Icons:</strong> The plugin includes 20+ social icons. These include Instagram, Pin terest, YouTube, Facebook, Google Plus, Twitter, Tumblr, Reddit, Linkedin, Flickr, Vine, Meetup, Github, Soundcloud, Steam, Whatsapp, WordPress, Telegram, Spotify. You can assign the respective brand Profile URL to the URL option which will lead you to that specific URL. You can leave the URL field empty to not show that icon in the frontend. The icons settings are sortable i.e. you can drag and drop to position their order.</li>
</ul>
</li>
</ul>
<h1>Adding a New Tab</h1>
<p>You can click on the + button to add new tab. A pop-up should appear with Select Tab type where you can select a variation on 9 tabs. And Tab name. The Tab name you assign will also be the Tab header of your backend as well as your frontend. There is no option to edit this header. So, if you need to change the header label you will have to delete the tab and create a new one.</p>

<p>You can programmatically add unlimited number of tabs and repetitive tabs but design wise we recommend you to use at most 5 tabs. There are 3 types of tabs. These include Default tabs, Feed tabs and Custom Tabs. Default tabs include a Author post list tab, Company detail description tab, a contact form tab. The Feed tab includes Twitter Feed, Facebook Feed and RSS feed. Custom Tab includes Shortcode and WYSIWYG Editor.</p>
<h2>Default tab</h2>
<h3>Author Posts</h3>
<ul>
 	<li><strong>Frontend Tab Title:</strong> This will be the Tab title in the frontend.</li>
 	<li><strong>Number of Posts:</strong> You can set the number of post to display in the frontend here. Design wise we recommend you to not use more than three posts.</li>
 	<li><strong>Select Post Type:</strong> You can choose between Recent Posts and Selective posts. Recent post will fetch the latest post by the author and Selective post will allow you to select the post you want to appear in the frontend.</li>
</ul>
<h3>Company Description</h3>
<ul>
 	<li><strong>Upload Custom Image:</strong> Upload an image from the Image Library which will act as a Company logo representing your brand.</li>
 	<li><strong>Company Detail Description:</strong> Enter your company description with the CK Editor.</li>
</ul>
<h3>Contact form</h3>
The plugin allow you to add contact form as one of the tabs. You can use a default contact form provided by the plugin or use a Shortcode to add external Contact form.
<ul>
 	<li><strong>Default Contact form:</strong> The default contact form is a simple contact form. All the fields expect Subject is a required field in the frontend. If you do not enter a label of a field that field will not appear in the frontend. The available fields are:
<ul>
 	<li><strong>Name Label:</strong> Enter name label</li>
 	<li><strong>Email Label:</strong> Enter email label</li>
 	<li><strong>Subject Label:</strong> Enter subject label</li>
 	<li><strong>Message Label:</strong> Enter Message label</li>
 	<li><strong>Success Message:</strong> Enter Subject Message</li>
 	<li><strong>Send To Email:</strong> Enter destination/receiver email address</li>
</ul>
</li>
 	<li><strong>External Contact Form:</strong> You can use a Shortcode of any external contact form here.</li>
</ul>
<h2>Feeds</h2>
The Author Box Plugin can fetch Twitter feeds, Facebook feeds and RSS feeds.
<h3>Twitter Feeds</h3>
To use the Twitter feeds simply put your Twitter Username and Number of Feeds. Contact your Admin to know if they have set up Twitter application or not.
<h3>RSS Feeds</h3>
<ul>
 	<li><strong>RSS URL :</strong> Enter the RSS URL where you want to fetch the RSS feeds from</li>
 	<li><strong>Link Target Options:</strong> Set to link read more link to open in new page or same page.</li>
 	<li><strong>Number of RSS Feeds:</strong> Set the Number of feed to display in the frontend.</li>
</ul>
<h3>Facebook Feeds</h3>
To set the Facebook Feeds you need to follow the following steps.
<ul>
 	<li>First you need to go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a></li>
 	<li>You need to login to Facebook if you are not already logged in.</li>
 	<li>Go My App and Add a New App</li>
 	<li>A pop-up should appear asking for Display Name, Contact email, a category. Fill the fields accordingly and click on Create App ID.</li>
 	<li>Congratulation you have created a Facebook App! Now, you need to configure it before you can use it.</li>
 	<li>You should now be able to see your App Dashboard. On the left side, you have a navigation panel.</li>
 	<li>Go to Settings-&gt; Basic and choose to Add Platform.</li>
 	<li>Choose Website.</li>
 	<li>Enter your site URL and Save Changes. Facebook app is site specific so an app can be used only for one website. If you want to use this app for a different site, just change site URL.</li>
 	<li>The next thing is to make this app Public. To do this, check your left panel for App Review. You will see Make [Your App Name] Public. Slider the button to enable it.</li>
 	<li>And you are done! You can check for your App ID and App Secret from your Dashboard. You may need to enter your Facebook password to View your App Secret.</li>
 	<li>Now you can use your Facebook ID, App ID and App Secret on your respective Facebook related plugin.</li>
</ul>
Set the APP ID, APP secret and set the Number of feeds. After this you will need to Save the Page. If you have set APP ID and APP secret properly, you should see the Fetch Facebook Feeds. Click on it to fetch new Facebook feeds. If you successfully fetch the feed a message should appear “Facebook Feeds Fetched Successfully!”. Save the page again to save the new posts.


<h2>Custom Tabs</h2>
<h3>Shortcode tab</h3>
In this tab you can place your Shortcode and it will appear in the frontend. The tab name fields will appear as the tab title in the frontend.
<h3>WYSIWYG Editor</h3>
Use the CK editor to place custom content into your tab. The tab name fields will appear as the tab title in the frontend.
<h3>Widgets Tab</h3>
You can add one widget per tab. Click on Select Widget. Select a Widget. Click on Edit to edit the Widget settings. Click on save to save the widget settings. Click on Update profile file to save the settings.
<h2>Profile Customizer</h2>
Click on the Profile Customize to add individual theme to your author profile.

Click on Enable Personal Template to enable your Personal Template.

Select one of the many Default Templates or Select Custom Template.

If you select Custom Template, select one of the Default Template and choose the Primary, Secondary, Tertiary color or Background image.
<h2>Widgets</h2>
The Author box plugin comes with two different plugins.
<ul>
 	<li><strong>Author Box Widget:</strong> Author Box width shows your single author with Author Details and Social Icons. You can select one of two templates. You can use Auto Detect to auto select the respective post author.</li>
 	<li><strong>Author List Widget:</strong> This widget lists all your registered authors. You can list the authors as Slider, Grid or List.</li>
</ul>
<h2>Page Meta Settings</h2>
If you check your Post Editor you should be able to see the Ultimate Author Box Options meta box. You can use this to disable Author box per post and choose a position to place the Author Box in that Post.
<h2>Using Shortcode</h2>
<p>
You can use Shortcode to place the Author box between posts or page.
</p>
<h3>Shortcode structure</h3>
<h3>Ultimate Author Box shortcode</h3>
<p><strong>Basic Structure</strong></p>
<p><code>[ultimate_author_box]</code></p>
<p><strong>Shortcode with parameters</strong></p>
<p>You can pass two parameters to the Shortcode, user_id and template.</p>
<p><code>[ultimate_author_box user_id="1" template='uab-template-1']</code></p>
<p>You cannot use custom template with shortcode.</p>
<h3>Author Box Widget shortcode</h3>
<p>Use the shortcode <code>[ultimate_author_box_widget]</code> to display Author Box Widget.</p>
<p>This shortcode accepts the following parameters.</p>
<table>
	<tbody>
		<tr>
			<th>Parameters</th>
			<th>Description</th>
			<th>Default Value</th>
			<th>Options</th>
		</tr>
		<tr>
			<td width="100">author_list</td>
			<td width="200">Manually enter the Author ID you want to show.<br/>Accepts only singular value.
			</td>
			<td width="50">1</td>
			<td width="100">You can get the User ID from <a href="#uab-userID">User and User ID</a> section.</td>
		</tr>
		<tr>
			<td width="100">display_type</td>
			<td width="200">Set the Template you want.</td>
			<td width="50">template-1</td>
			<td width="100">template-1<br/>template-2</td>
		</tr>
		<tr>
			<td width="100">detect_author</td>
			<td width="200">Set author detect author Feature.<br/>Auto detect only works in Single Post page and Author Archive Page.</td>
			<td width="50">0</td>
			<td width="100">1 to Enable<br/>0 to Disable</td>
		</tr>
		<tr>
			<td width="100">display_author_name</td>
			<td width="200">Choose to display the Author Name.</td>
			<td width="50">1</td>
			<td width="100">1 to Enable<br/>0 to Disable</td>
		</tr>
		<tr>
			<td width="100">display_author_designation</td>
			<td width="200">Choose to display the Author Designation.</td>
			<td width="50">1</td>
			<td width="100">1 to Enable<br/>0 to Disable</td>
		</tr>
		<tr>
			<td width="100">display_author_description</td>
			<td width="200">Choose to display the Author Description.</td>
			<td width="50">1</td>
			<td width="100">1 to Enable<br/>0 to Disable</td>
		</tr>
		<tr>
			<td width="100">display_social_icons</td>
			<td width="200">Choose to display the Social Icons.</td>
			<td width="50">1</td>
			<td width="100">1 to Enable<br/>0 to Disable</td>
		</tr>
		<tr>
			<td width="100">display_contacts</td>
			<td width="200">Choose to display Contact information (Phone / Email / Website).</td>
			<td width="50">0</td>
			<td width="100">1 to Enable<br/>0 to Disable</td>
		</tr>
	</tbody>
</table>
<p><strong>An example with all parameters:</strong></p><p><code>[ultimate_author_box_widget author_list="2" detect_author="1" display_author_name="1" display_author_designation="1" display_author_description="1" display_social_icons="1"  display_contacts="1" display_type="template-2"]</code></p>

<h3>Author List Widget shortcode</h3>
<p>Use the shortcode <code>[ultimate_author_list_widget]</code> to display Author List Widget.</p>
<p>This shortcode accepts the following parameters.</p>
<table>
	<tbody>
		<tr>
			<th>Parameters</th>
			<th>Description</th>
			<th>Default Value</th>
			<th>Options</th>
		</tr>
		<tr>
			<td width="100">display_type</td>
			<td width="200">Set the list format you want to either a Slider, Grid.</td>
			<td width="50">full-grid</td>
			<td width="100">slider<br/>sidebar-grid<br/>full-grid<br>list<br></td>
		</tr>
		<tr>
			<td width="100">image_click</td>
			<td width="200">Set the on Image Click Option.</td>
			<td width="50">uab_archive</td>
			<td width="100"><strong>uab_archive</strong> for navigation to Author Archive page.<br/><strong>uab_popup_widget</strong> to open Author pop-up description.</td>
		</tr>
		<tr>
			<td width="100">author_number</td>
			<td width="200">Set the number of Authors to be displayed in the List.</td>
			<td width="50">10</td>
			<td width="100">Any positive number.</td>
		</tr>
		<tr>
			<td width="100">orderby</td>
			<td width="200">Choose to order the list in terms of Post count, Alphabetical order or Most Views.</td>
			<td width="50">display_name</td>
			<td width="100">display_name<br/>post_count<br/>most_view</td>
		</tr>
		<tr>
			<td width="100">order</td>
			<td width="200">Sort the list ascendeing or descending.</td>
			<td width="50">ASC</td>
			<td width="100">ASC<br/>DESC</td>
		</tr>
		<tr>
			<td width="100">excludeauthorlist</td>
			<td width="200">Enter the Author ID of the Authors you want to exclude from the list. 
			</td>
			<td width="50">-</td>
			<td width="100">Accepts comma separated values. For example, 1,2,3,4, etc. You can get the User ID from <a href="#uab-userID">User and User ID</a> section.</td>
		</tr>
		<tr>
			<td width="100">showpostcount</td>
			<td width="200">Show / Hide post count option. 
			</td>
			<td width="50">1</td>
			<td width="100">1 to Enable<br/>0 to disable</td>
		</tr>
		<tr>
			<td width="100">showauthorpost</td>
			<td width="200">Show / Hide author's latest post. 
			</td>
			<td width="50">1</td>
			<td width="100">1 to Enable<br/>0 to disable</td>
		</tr>
		<tr>
			<td width="100">showsocial</td>
			<td width="200">Show / Hide author's social links. 
			</td>
			<td width="50">1</td>
			<td width="100">1 to Enable<br/>0 to disable</td>
		</tr>
		
	</tbody>
</table>
<p><strong>An example with all parameters:</strong></p><p><code>[ultimate_author_list_widget display_type="list" image_click="uab_popup_widget" author_number="5" orderby="post_count" order="ASC" excludeAuthorList="2,3,4" showpostcount="on" showauthorpost="on" showsocial="on"]</code></p>

<h3 id="uab-userID">User and User id</h3>
<table>
	<tbody>
		<tr>
			<th width="200">User ID</th>
			<th width="200">User Name</th>
			<th width="200">User Email</th>
		</tr>
		<?php
		$filterArgs = array(
			'who'    => 'authors',
			'orderby'  => 'ID',
			'order'  => 'ASC',
		);
		$authorList = get_users($filterArgs);
		//$this->print_array($authorList);
		foreach($authorList as $user){
			?>
			<tr>
				<td width="200"><?php esc_html_e($user->ID);?></td>
				<td width="200"><?php esc_html_e($user->display_name);?></td>
				<td width="200"><?php esc_html_e($user->user_email);?></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<blockquote>Please visit <a href="https://accesspressthemes.com/documentation/ultimate-author-box/" target="_blank">https://accesspressthemes.com/documentation/ultimate-author-box/</a> for more detail documentation.</blockquote>
<h3>Video Tutorial</h3>
<iframe width="640" height="360" src="https://www.youtube.com/embed/videoseries?list=PLdSqn2S_qFxG2AGlcEJgkKGff38iYUMQ9" frameborder="0" allowfullscreen></iframe>
<blockquote>Please visit our <a href="https://www.youtube.com/playlist?list=PLdSqn2S_qFxG2AGlcEJgkKGff38iYUMQ9" target="_blank">YouTube Channel</a> for video tutorial.</blockquote>
</div>
</div>
