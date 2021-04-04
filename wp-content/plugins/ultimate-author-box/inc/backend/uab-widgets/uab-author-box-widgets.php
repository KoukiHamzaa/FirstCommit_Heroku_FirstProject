<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
/**
 * Adds UAB_Author_Box widget.
 */
class UAB_Author_Box_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		$widget_options = array( 
			'classname' => 'UAB_Author_Box_Widget',
			'description' => esc_html__( 'Ultimate Author Box Author Widget', 'ultimate-author-box' ),
		);

		parent::__construct(
			'uab_author_box_widget', // Base ID
			esc_html__( 'Author Box Widget', 'ultimate-author-box' ), // Name
			$widget_options
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Author box', 'ultimate-author-box' );
		$authorList = ! empty( $instance['authorList'] ) ? $instance['authorList'] : esc_html__( 'Post Count', 'ultimate-author-box' );	
		$detectAuthor = ! empty( $instance['detectAuthor'] ) ? $instance['detectAuthor'] : '';
		$showAuthorBox = ! empty( $instance['showAuthorBox'] ) ? $instance['showAuthorBox'] : '';
		$displayAuthorName = ! empty( $instance['displayAuthorName'] ) ? $instance['displayAuthorName'] : '';
		$displayAuthorDesignation = ! empty( $instance['displayAuthorDesignation'] ) ? $instance['displayAuthorDesignation'] : '';
		$displayAuthorDescription = ! empty( $instance['displayAuthorDescription'] ) ? $instance['displayAuthorDescription'] : '';
		$displaySocialIcons = ! empty( $instance['displaySocialIcons'] ) ? $instance['displaySocialIcons'] : '';
		$displayContacts = ! empty( $instance['displayContacts'] ) ? $instance['displayContacts'] : '';
		$displayType = ! empty( $instance['displayType'] ) ? $instance['displayType'] : esc_html__( 'template-1', 'ultimate-author-box' );
		?>
		<p>
			<label for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title:', 'ultimate-author-box' ); ?></label> 
			<input class="widefat" id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>" name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
		</p>
		<p>
			<label for="<?php esc_attr_e($this->get_field_id('authorList')); ?>"><?php esc_html_e( 'Choose Author', 'ultimate-author-box' ); ?></label>
			<select class='widefat' id="<?php esc_attr_e($this->get_field_id('authorList')); ?>"	name="<?php esc_attr_e($this->get_field_name('authorList')); ?>">
				<?php
				$filterArgs = array(
					'who'    => 'authors',
				);
				$authors = get_users($filterArgs);
				foreach($authors as $user){
					?>
					<option value="<?php esc_attr_e($user->ID);?>" <?php if($authorList == $user->ID) esc_attr_e('selected');?>>
						<?php esc_html_e($user->display_name); ?>
					</option>
					<?php
				}
				?>
			</select> 
		</p>
		<p>
			<label for="<?php esc_attr_e($this->get_field_id('displayType')); ?>"><?php esc_attr_e( 'Display Type:', 'ultimate-author-box' ); ?></label>
			<select class='widefat uab-widget-display-option' id="<?php esc_attr_e($this->get_field_id('displayType')); ?>"	name="<?php esc_attr_e($this->get_field_name('displayType')); ?>">
				<option value='template-1'<?php _e(($displayType =='template-1')?'selected':''); ?>>
					<?php esc_html_e( 'Template 1', 'ultimate-author-box' ); ?>
				</option>
				<option value='template-2'<?php _e(($displayType =='template-2')?'selected':''); ?>>
					<?php esc_html_e( 'Template 2', 'ultimate-author-box' ); ?>
				</option>
			</select>                
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php if(!empty($detectAuthor)) esc_attr_e('checked'); ?> id="<?php esc_attr_e($this->get_field_id( 'detectAuthor' )); ?>" name="<?php esc_attr_e($this->get_field_name( 'detectAuthor' )); ?>" /> 
			<label for="<?php esc_attr_e($this->get_field_id( 'detectAuthor' )); ?>"><?php esc_html_e('Auto Detect Author','ultimate-author-box');?></label>
			<small class="howto"><?php esc_html_e('Use this option to automatically detect author if this sidebar is used on single post template or author template','ultimate-author-box');?></small>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php if(!empty($showAuthorBox)) esc_attr_e('checked'); ?> id="<?php esc_attr_e($this->get_field_id( 'showAuthorBox' )); ?>" name="<?php esc_attr_e($this->get_field_name( 'showAuthorBox' )); ?>" /> 
			<label for="<?php esc_attr_e($this->get_field_id( 'showAuthorBox' )); ?>"><?php esc_html_e('Show Author Box Only in Single Post Page and Author Archive Page','ultimate-author-box');?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php if(!empty($displayAuthorName)) esc_attr_e('checked'); ?> id="<?php esc_attr_e($this->get_field_id( 'displayAuthorName' )); ?>" name="<?php esc_attr_e($this->get_field_name( 'displayAuthorName' )); ?>" /> 
			<label for="<?php esc_attr_e($this->get_field_id( 'displayAuthorName' )); ?>"><?php esc_html_e('Display Author Name','ultimate-author-box');?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php if(!empty($displayAuthorDesignation)) esc_attr_e('checked'); ?> id="<?php esc_attr_e($this->get_field_id( 'displayAuthorDesignation')); ?>" name="<?php esc_attr_e($this->get_field_name( 'displayAuthorDesignation' )); ?>" /> 
			<label for="<?php esc_attr_e($this->get_field_id( 'displayAuthorDesignation' )); ?>"><?php esc_html_e('Display Author Designation','ultimate-author-box');?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php if(!empty($displayAuthorDescription)) esc_attr_e('checked'); ?> id="<?php esc_attr_e($this->get_field_id( 'displayAuthorDescription' )); ?>" name="<?php esc_attr_e($this->get_field_name( 'displayAuthorDescription' )); ?>" /> 
			<label for="<?php esc_attr_e($this->get_field_id( 'displayAuthorDescription' )); ?>"><?php esc_html_e('Display Author Description','ultimate-author-box');?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php if(!empty($displaySocialIcons)) esc_attr_e('checked'); ?> id="<?php esc_attr_e($this->get_field_id( 'displaySocialIcons' )); ?>" name="<?php esc_attr_e($this->get_field_name( 'displaySocialIcons' )); ?>" /> 
			<label for="<?php esc_attr_e($this->get_field_id( 'displaySocialIcons' )); ?>"><?php esc_html_e('Display Social Icons','ultimate-author-box');?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php if(!empty($displayContacts)) esc_attr_e('checked'); ?> id="<?php esc_attr_e($this->get_field_id( 'displayContacts' )); ?>" name="<?php esc_attr_e($this->get_field_name( 'displayContacts' )); ?>" /> 
			<label for="<?php esc_attr_e($this->get_field_id( 'displayContacts' )); ?>"><?php esc_html_e('Display Contacts','ultimate-author-box');?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['authorList'] = ( ! empty( $new_instance['authorList'] ) ) ? strip_tags( $new_instance['authorList'] ) : '';
		$instance['detectAuthor'] = ( ! empty( $new_instance['detectAuthor'] ) ) ? strip_tags( $new_instance['detectAuthor'] ) : '';
		$instance['showAuthorBox'] = ( ! empty( $new_instance['showAuthorBox'] ) ) ? strip_tags( $new_instance['showAuthorBox'] ) : '';
		$instance['displayAuthorName'] = ( ! empty( $new_instance['displayAuthorName'] ) ) ? strip_tags( $new_instance['displayAuthorName'] ) : '';
		$instance['displayAuthorDesignation'] = ( ! empty( $new_instance['displayAuthorDesignation'] ) ) ? strip_tags( $new_instance['displayAuthorDesignation'] ) : '';
		$instance['displayAuthorDescription'] = ( ! empty( $new_instance['displayAuthorDescription'] ) ) ? strip_tags( $new_instance['displayAuthorDescription'] ) : '';
		$instance['displaySocialIcons'] = ( ! empty( $new_instance['displaySocialIcons'] ) ) ? strip_tags( $new_instance['displaySocialIcons'] ) : '';
		$instance['displayContacts'] = ( ! empty( $new_instance['displayContacts'] ) ) ? strip_tags( $new_instance['displayContacts'] ) : '';
		$instance['displayType'] = ( ! empty( $new_instance['displayType'] ) ) ? strip_tags( $new_instance['displayType'] ) : '';
		
		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

			

			$authorList = empty($instance['authorList']) ? '' : $instance['authorList'];
			$detectAuthor = empty($instance['detectAuthor']) ? '' : $instance['detectAuthor'];
			$showAuthorBox = empty($instance['showAuthorBox']) ? '' : $instance['showAuthorBox'];
			$displayAuthorName = empty($instance['displayAuthorName']) ? '' : $instance['displayAuthorName'];
			$displayAuthorDesignation = empty($instance['displayAuthorDesignation']) ? '' : $instance['displayAuthorDesignation'];
			$displayAuthorDescription = empty($instance['displayAuthorDescription']) ? '' : $instance['displayAuthorDescription'];
			$displaySocialIcons = empty($instance['displaySocialIcons']) ? '' : $instance['displaySocialIcons'];
			$displayContacts = empty($instance['displayContacts']) ? '' : $instance['displayContacts'];
			$displayType = empty($instance['displayType']) ? '' : $instance['displayType'];

			if($showAuthorBox){
				if(!is_single()){
					return;
				}
			}
			
			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
			
			_e(do_shortcode('[ultimate_author_box_widget author_list="'.$authorList.'" detect_author="'.$detectAuthor.'" display_author_name="'.$displayAuthorName.'" display_author_designation="'.$displayAuthorDesignation.'" display_author_description="'.$displayAuthorDescription.'" display_social_icons="'.$displaySocialIcons.'" display_contacts="'.$displayContacts.'" display_type="'.$displayType.'"]'));			
			
			echo $args['after_widget'];
	}

			
} // class UAB_Author_Box_Widget
?>
