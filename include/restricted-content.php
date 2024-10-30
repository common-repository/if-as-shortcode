<?php
/**
 * Restricted Content
 */
add_action( 'widgets_init', 'restricted_content' );

function restricted_content() {
    register_widget( 'restricted_content' );
}
class restricted_content extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'restricted_content_widget',
            __('The restricted content', IFLANG),
            array( 'description' => __( 'Display restrict content for some roles', IFLANG ) )
        );
    }

    function widget( $args, $instance ) {
        extract( $args );
        $title              = apply_filters('widget_title', $instance['title'] );

        $select_if_types        = $instance['select_if_types'];
        $centent_between_if        = $instance['centent_between_if'];
        $centent_between_else       = $instance['centent_between_else'];

        echo $before_widget;
        if( $title ) {
            echo $before_title.$title.$after_title;
        }
        echo do_shortcode( '[if '.$select_if_types.']'.$centent_between_if.'[else]'.$centent_between_else.'[/if]' );
        echo $after_widget;
    }


    function update( $new_instance, $old_instance ) {
        $instance                       = $old_instance;
        $instance['title']              = strip_tags( $new_instance['title'] );
        $instance['select_if_types']        = strip_tags( $new_instance['select_if_types'] );
        $instance['centent_between_if']       = strip_tags( $new_instance['centent_between_if'] );
        $instance['centent_between_else']       = strip_tags( $new_instance['centent_between_else'] );
        return $instance;
    }

    function form( $instance ) {
        $defaults = array( 
        'title' =>__( 'The restricted content' , IFLANG ), 
        'centent_between_if' => __( 'Put your content if condition return true' , IFLANG ), 
        'centent_between_else' => __( 'Put your content if condition return false' , IFLANG )
      );
        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo _e('Title', IFLANG) ?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'select_if_types' ); ?>"><?php echo _e('Select type of conditions', IFLANG) ?></label>
            <select style="width: 275px;" id="<?php echo $this->get_field_id( 'select_if_types' ); ?>" name="<?php echo $this->get_field_name( 'select_if_types' ); ?>" >
                <option value="current_user_can capability='administrator'" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "current_user_can capability='administrator'" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content for administrators only', IFLANG ) ?></option>
                <option value="current_user_can capability='editor'" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "current_user_can capability='editor'" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content for editors only', IFLANG) ?></option>
                <option value="current_user_can capability='author'" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "current_user_can capability='author'" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content for authors only', IFLANG) ?></option>
                <option value="current_user_can capability='contributor'" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "current_user_can capability='contributor'" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content for contributors only', IFLANG) ?></option>
                <option value="current_user_can capability='subscriber'" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "current_user_can capability='subscriber'" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content for subscribers only', IFLANG) ?></option>
                <option value="cis_user_logged_in" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "is_user_logged_in" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content for users logged in', IFLANG) ?></option>
                <option value="has_post_thumbnail" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "has_post_thumbnail" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if post has thumbnail', IFLANG) ?></option>
                <option value="comments_open" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "comments_open" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if comments open inside post/page', IFLANG) ?></option>
                <option value="has_tag" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "has_tag" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if post has tags', IFLANG) ?></option>
                <option value="is_attachment" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "is_attachment" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if post/page has attachments', IFLANG) ?></option>
                <option value="has_excerpt" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "has_excerpt" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if post/page has excerpt', IFLANG) ?></option>
                <option value="pings_open" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "pings_open" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if pings open inside post/page', IFLANG ) ?></option>
                <option value="is_home" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "is_home" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if the page is home page', IFLANG) ?></option>
                <option value="is_rtl" <?php if( !empty( $instance['select_if_types'] ) && $instance['select_if_types'] == "is_rtl" ) echo "selected=\"selected\""; else echo ""; ?>><?php echo _e('Show content if the directions for WP is RTL', IFLANG ) ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'centent_between_if' ); ?>"><?php echo _e('The content between condition', IFLANG) ?></label>
            <textarea rows="5" cols="35" id="<?php echo $this->get_field_id( 'centent_between_if' ); ?>" name="<?php echo $this->get_field_name( 'centent_between_if' ); ?>"><?php echo $instance['centent_between_if']; ?></textarea>
        </p> 

         <p>
            <label for="<?php echo $this->get_field_id( 'centent_between_else' ); ?>"><?php echo _e('The content if not true condition', IFLANG) ?></label>
            <textarea rows="5" cols="35" id="<?php echo $this->get_field_id( 'centent_between_else' ); ?>" name="<?php echo $this->get_field_name( 'centent_between_else' ); ?>"><?php echo $instance['centent_between_else']; ?></textarea>
        </p>
    <?php
    }
}
?>