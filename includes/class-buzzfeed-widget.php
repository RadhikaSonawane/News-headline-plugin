<?php
/**
 * Adds BuzzFeed widget.
 * Show first three headlines in Wordpress
 */
class buzzfeed_widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
             'buzzfeed_widget', // Base ID
            'BuzzFeed Widget', // Name
            array( 'description' => __( 'BuzzFeed Widget', 'text_domain' ), ) // Args
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
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        
        echo $before_widget;


        //Display title
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        //echo __( 'Hello, World!', 'text_domain' );
        ?>
        

        <!-- Display random headlines -->
        <div class="buzzfeed-headlines">
            <div class="buzzfeed-headline">
            <!-- get content from js file -->
            </div>
        </div>

            
        <?php
        
        echo '</div>';

        echo $after_widget;
    }
 
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
 
        if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'New Headlines! ', 'text_domain' );
		}
		
		?>
        
        <!--  title -->
        <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

        <input 
            class="widefat" 
            id="<?php echo $this->get_field_id( 'title' ); ?>" 
            name="<?php echo $this->get_field_name( 'title' ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>" />
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
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        
        return $instance;
    }
 
} 
