<?php
/**
 * The template for displaying search forms in Lingonberry
 *
 * @package Lingonberry
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<!-- <label> -->
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'lingonberry' ); ?></span>
		<input type="search" value="<?php esc_attr_e('Type and press enter', 'lingonberry'); ?>" onfocus="if(this.value=='<?php echo esc_js( __('Type and press enter', 'lingonberry') ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_js( __('Type and press enter', 'lingonberry') ); ?>';" name="s" id="s" />
	<!-- </label>  -->
	<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'lingonberry' ); ?>" class="button hidden">
</form>

