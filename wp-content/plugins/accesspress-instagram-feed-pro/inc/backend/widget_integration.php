<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
 * Adds AccessPress Instagram Feed Widget
 */
class APIF_Widget_Instagram_Feeds extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'apif_pro_widget_integration', // Base ID
                __('AP : Instagram Feeds', 'accesspress-instagram-feed-pro'), // Name
                array('description' => __('AccessPress Instagram Feeds', 'accesspress-instagram-feed-pro')) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {

        echo $args['before_widget']; ?>
        <div class='apif-widget-wrapper'>
        <?php
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
            echo do_shortcode("[ap_instagram_feed_pro id='{$instance['feed_id']}']");
        ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        $title = isset($instance['title'])?$instance['title']:'';
        $feed_id = isset($instance['feed_id'])?$instance['feed_id']:'';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'accesspress-instagram-feed-pro'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>

            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Feed Name :', 'accesspress-instagram-feed-pro'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('feed_id'); ?>" name="<?php echo $this->get_field_name('feed_id'); ?>" >
                
                <?php
                global $wpdb;
                $table_name = $instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
                $in_feeds = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");
                 // print_r($in_feeds);
                foreach ($in_feeds as $key => $value) {
                    $each_settings = unserialize($value->feed_settings);
                     ?>
                   <option value="<?php echo $value->id; ?>" <?php selected($feed_id, $value->id);?> > <?php echo $each_settings['feed_name']; ?></option>
                <?php } ?>
            </select>
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
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? sanitize_text_field($new_instance['title']) : '';
        $instance['feed_id'] = (!empty($new_instance['feed_id']) ) ? sanitize_text_field($new_instance['feed_id']) : '';
        return $instance;
    }
}
// class APS_PRO_Widget
?>