<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
* Adds UAB_Author_List widget.
*/
class UAB_Author_List_Widget extends WP_Widget {
	/**
	* Register widget with WordPress.
	*/
	function __construct() {
		$widget_options = array( 
			'classname' => 'UAB_Author_List_Widget',
			'description' => esc_html__( 'Ultimate Author Box Author List Widget', 'ultimate-author-box' ),
		);
		parent::__construct(
			'uab_author_list_widget', 
			esc_html__( 'Author List Widget', 'ultimate-author-box' ), 
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Author List', 'ultimate-author-box' );
		$displayType = ! empty( $instance['displayType'] ) ? $instance['displayType'] : esc_html__( 'slider', 'ultimate-author-box' );
		$image_click = ! empty( $instance['image_click'] ) ? $instance['image_click'] : esc_html__( 'uab_archive', 'ultimate-author-box' );
		$authorNumber = ! empty( $instance['authorNumber'] ) ? $instance['authorNumber'] : esc_html__( '1', 'ultimate-author-box' );
		$orderBy = ! empty( $instance['orderBy'] ) ? $instance['orderBy'] : esc_html__( 'Post Count', 'ultimate-author-box' );
		$order = ! empty( $instance['order'] ) ? $instance['order'] : esc_html__( 'Post Count', 'ultimate-author-box' );
		$excludeAuthorList = ! empty( $instance['excludeAuthorList'] ) ? $instance['excludeAuthorList'] : array();
		$showAuthorPost = ! empty( $instance['showAuthorPost'] ) ? $instance['showAuthorPost'] : '';
		$showPostCount = ! empty( $instance['showPostCount'] ) ? $instance['showPostCount'] : '';
		$showSocial = ! empty( $instance['showSocial'] ) ? $instance['showSocial'] : '';
		?>
		<p>
			<label for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Widget Title:', 'ultimate-author-box' ); ?></label> 
			<input class="widefat" id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>" name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>">
		</p>
		<p>
			<label for="<?php esc_attr_e($this->get_field_id('displayType')); ?>"><?php esc_attr_e( 'Display Type:', 'ultimate-author-box' ); ?></label>
			<select class='widefat uab-widget-display-option' id="<?php esc_attr_e($this->get_field_id('displayType')); ?>"	name="<?php esc_attr_e($this->get_field_name('displayType')); ?>">
				<?php if (get_current_user()): ?>
					<option value='slider'<?php _e(($displayType =='slider')?'selected':''); ?>>
						<?php esc_html_e( 'Slider', 'ultimate-author-box' ); ?>
					</option>
				<?php endif ?>
				<option value='sidebar-grid'<?php _e(($displayType =='sidebar-grid')?'selected':''); ?>>
					<?php esc_html_e( 'Sidebar Grid', 'ultimate-author-box' ); ?>
				</option>
				<?php if (!get_current_user()): ?>
					<option value='full-grid'<?php _e(($displayType =='full-grid')?'selected':''); ?>>
						<?php esc_html_e( 'Full Grid', 'ultimate-author-box' ); ?>
					</option>
				<?php endif ?>
				<option value='list'<?php _e(($displayType =='list')?'selected':''); ?>>
					<?php esc_html_e( 'List', 'ultimate-author-box' ); ?>
				</option> 
			</select>                
		</p>
		<p>
			<label for="<?php esc_attr_e($this->get_field_id('image_click')); ?>"><?php esc_attr_e( 'On Image Click Option:', 'ultimate-author-box' ); ?></label>
			<select class='widefat uab-widget-display-option' id="<?php esc_attr_e($this->get_field_id('image_click')); ?>"	name="<?php esc_attr_e($this->get_field_name('image_click')); ?>">
				<option value='uab_archive'<?php _e(($image_click =='uab_archive')?'selected':''); ?>>
					<?php esc_html_e( 'Open Author Archive', 'ultimate-author-box' ); ?>
				</option>
				<option value='uab_popup_widget'<?php _e(($image_click =='uab_popup_widget')?'selected':''); ?>>
					<?php esc_html_e( 'Open Author Pop up', 'ultimate-author-box' ); ?>
				</option>
			</select>                
		</p>
		<p>
			<label for="<?php esc_attr_e( $this->get_field_id( 'authorNumber' ) ); ?>"><?php esc_attr_e( 'Author Number:', 'ultimate-author-box' ); ?></label> 
			<input class="widefat" id="<?php esc_attr_e( $this->get_field_id( 'authorNumber' ) ); ?>" name="<?php esc_attr_e( $this->get_field_name( 'authorNumber' ) ); ?>" type="number" value="<?php esc_attr_e( $authorNumber ); ?>" min="1" size="3">
		</p>
		<p>
			<label for="<?php esc_attr_e($this->get_field_id('orderBy')); ?>"><?php esc_attr_e( 'Order By:', 'ultimate-author-box' ); ?></label>
			<select class='widefat' id="<?php esc_attr_e($this->get_field_id('orderBy')); ?>"	name="<?php esc_attr_e($this->get_field_name('orderBy')); ?>">
				<option value='post_count'<?php _e(($orderBy =='post_count')?'selected':''); ?>>
					<?php esc_html_e( 'Post Count', 'ultimate-author-box' ); ?>
				</option>
				<option value='display_name'<?php _e(($orderBy=='display_name')?'selected':''); ?>>
					<?php esc_html_e( 'Author Name', 'ultimate-author-box' ); ?>
				</option> 
				<option value='most_view'<?php _e(($orderBy=='most_view')?'selected':''); ?>>
					<?php esc_html_e( 'Most Post Views', 'ultimate-author-box' ); ?>
				</option>
			</select>                
		</p>
		<p>
			<label for="<?php esc_attr_e($this->get_field_id('order')); ?>"><?php esc_attr_e( 'Order:', 'ultimate-author-box' ); ?></label>
			<select class='widefat' id="<?php esc_attr_e($this->get_field_id('order')); ?>"	name="<?php esc_attr_e($this->get_field_name('order')); ?>">
				<option value='ASC'<?php _e(($order=='ASC')?'selected':''); ?>>
					<?php esc_html_e( 'Ascending', 'ultimate-author-box' ); ?>
				</option>
				<option value='DESC'<?php _e(($order=='DESC')?'selected':''); ?>>
					<?php esc_html_e( 'Descending', 'ultimate-author-box' ); ?>
				</option> 
			</select>                
		</p>
		<p>
			<label><?php _e( 'Show Latest Author Post:', 'ultimate-author-box' ); ?></label>
			<input id="<?php esc_attr_e($this->get_field_id( 'showAuthorPost' )) . $user->ID; ?>" name="<?php esc_attr_e($this->get_field_name('showAuthorPost')); ?>" type="checkbox" <?php if($showAuthorPost) esc_attr_e('checked');?>>						
		</p>
		<p>
			<label><?php _e( 'Show Post/ View Count:', 'ultimate-author-box' ); ?></label>
			<input id="<?php esc_attr_e($this->get_field_id( 'showPostCount' )) . $user->ID; ?>" name="<?php esc_attr_e($this->get_field_name('showPostCount')); ?>" type="checkbox" <?php if($showPostCount) esc_attr_e('checked');?>>						
		</p>
		<p>
			<label><?php _e( 'Show Social Icons:', 'ultimate-author-box' ); ?></label>
			<input id="<?php esc_attr_e($this->get_field_id( 'showSocial' )) . $user->ID; ?>" name="<?php esc_attr_e($this->get_field_name('showSocial')); ?>" type="checkbox" <?php if($showSocial) esc_attr_e('checked');?>>						
		</p>
		<p>
			<div><?php esc_html_e( 'Exclude Author:', 'ultimate-author-box' ); ?></div>
			<div class="uab-author-post-list">
				<?php
				$filterArgs = array(
					'who'    => 'authors',
					'orderby' => 'display_name',
					'order' => 'ASC'
				);
				$authorList = get_users($filterArgs);
				foreach($authorList as $user){
					?>
					<input 
					id="<?php esc_attr_e($this->get_field_id( 'excludeAuthorList' )) . $user->ID; ?>" 
					name="<?php esc_attr_e($this->get_field_name('excludeAuthorList')); ?>[]" 
					type="checkbox" 
					value="<?php esc_attr_e($user->ID); ?>" 
					<?php if(in_array($user->ID, $excludeAuthorList)) esc_attr_e('checked');?>
					>						
					<label><?php esc_html_e($user->display_name); ?></label><br>
					<?php
				}
				?>
			</div>
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
		$instance['displayType'] = ( ! empty( $new_instance['displayType'] ) ) ? strip_tags( $new_instance['displayType'] ) : '';
		$instance['image_click'] = ( ! empty( $new_instance['image_click'] ) ) ? strip_tags( $new_instance['image_click'] ) : '';
		$instance['authorNumber'] = ( ! empty( $new_instance['authorNumber'] ) ) ? strip_tags( $new_instance['authorNumber'] ) : '';
		$instance['orderBy'] = ( ! empty( $new_instance['orderBy'] ) ) ? strip_tags( $new_instance['orderBy'] ) : '';
		$instance['order'] = ( ! empty( $new_instance['order'] ) ) ? strip_tags( $new_instance['order'] ) : '';
		$instance['excludeAuthorList'] = ( ! empty( $new_instance['excludeAuthorList'] ) ) ? $new_instance['excludeAuthorList'] : array();
		$instance['showAuthorPost'] = ( ! empty( $new_instance['showAuthorPost'] ) ) ? $new_instance['showAuthorPost'] : '';
		$instance['showPostCount'] = ( ! empty( $new_instance['showPostCount'] ) ) ? $new_instance['showPostCount'] : '';
		$instance['showSocial'] = ( ! empty( $new_instance['showSocial'] ) ) ? $new_instance['showSocial'] : '';

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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		$displayType = empty($instance['displayType']) ? '' : $instance['displayType'];
		$image_click = empty($instance['image_click']) ? 'uab_archive' : $instance['image_click'];
		$authorNumber = empty($instance['authorNumber']) ? '' : $instance['authorNumber'];
		$orderBy = empty($instance['orderBy']) ? '' : $instance['orderBy'];
		$order = empty($instance['order']) ? '' : $instance['order'];
		$excludeAuthorList = empty($instance['excludeAuthorList']) ? array() : $instance['excludeAuthorList'];
		$showAuthorPost = empty($instance['showAuthorPost']) ? '' : $instance['showAuthorPost'];
		$showPostCount = empty($instance['showPostCount']) ? '' : $instance['showPostCount'];
		$showSocial = empty($instance['showSocial']) ? '' : $instance['showSocial'];


		$tags = implode(',',$excludeAuthorList);

		_e(do_shortcode('[ultimate_author_list_widget showpostcount="'.$showPostCount.'" showsocial="'.$showSocial.'" showauthorpost="'.$showAuthorPost.'" display_type="'.$displayType.'" image_click="'.$image_click.'" author_number="'.$authorNumber.'" orderby="'.$orderBy.'" order="'.$order.'" excludeAuthorList="'.$tags.'" ]'));

		echo $args['after_widget'];
	}
} /* class UAB_Author_List_Widget*/

?>
