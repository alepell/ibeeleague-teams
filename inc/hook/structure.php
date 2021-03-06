<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Meilleur Business
 */

if ( ! function_exists( 'meilleur_business_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function meilleur_business_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'meilleur_business_action_doctype', 'meilleur_business_doctype', 10 );


if ( ! function_exists( 'meilleur_business_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function meilleur_business_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
}
endif;
add_action( 'meilleur_business_action_head', 'meilleur_business_head', 10 );

if ( ! function_exists( 'meilleur_business_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function meilleur_business_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'meilleur-business' ); ?></a><?php
	}
endif;

add_action( 'meilleur_business_action_before', 'meilleur_business_page_start', 10 );

if ( ! function_exists( 'meilleur_business_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function meilleur_business_header_start() {

        $show_contact = meilleur_business_get_option( 'show_header_contact_info' );
        $location     = meilleur_business_get_option( 'header_location' );
        $email        = meilleur_business_get_option( 'header_email' );
        $phone        = meilleur_business_get_option( 'header_phone' ); 
        $show_social  = meilleur_business_get_option( 'show_header_social_links' );
        $class = 'col-1';

        if( ( ( ! empty( $email ) || ! empty( $phone ) || ! empty( $location ) ) && $show_contact ) && ( $show_social ) ) {
            $class = 'col-2';
        }

        if( $show_contact || $show_social ){ ?>
    
            <div id="top-bar" class="top-bar-widgets <?php echo esc_attr( $class ); ?>">
                <div class="wrapper">
                    <?php if( ( ! empty( $email ) || ! empty( $phone ) || ! empty( $location ) ) && $show_contact ) : ?>
                        
                        <div class="widget widget_address_block">
                            <ul>
                                <?php 

                                    if( ! empty( $location ) ){
                                        echo '<li><i class="fa fa-map-marker"></i>'. esc_html( $location ) .'</li>';
                                    }
                                    if( ! empty( $phone ) ){
                                        echo '<li><i class="fa fa-phone"></i><a href="tel:'. esc_attr( preg_replace( '/\D/', '', $phone ) ) .'" class="phone">'. esc_html( $phone ) .'</a></li>';
                                    }
                                    if( ! empty( $email ) ){
                                        echo '<li><i class="fa fa-envelope"></i><a href="mailto:'. sanitize_email( $email ) .'" class="email">'. esc_html( $email ) .'</a></li>';
                                    }
                                ?>
                            </ul>
                        </div><!-- .widget_address_block -->
                    <?php endif; 

                    if ( $show_social ){ ?>
                        <div class="widget widget_social_icons">
                           <?php meilleur_business_render_social_links(); ?>
                        </div><!-- .widget_social_icons -->
                    <?php } ?>
                </div><!-- .wrapper -->
            </div><!-- #top-bar -->
        <?php
        } ?>
		<header id="masthead" class="site-header" role="banner"><?php
	}
endif;
add_action( 'meilleur_business_action_before_header', 'meilleur_business_header_start' );

if ( ! function_exists( 'meilleur_business_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function meilleur_business_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'meilleur_business_action_header', 'meilleur_business_header_end', 15 );

if ( ! function_exists( 'meilleur_business_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function meilleur_business_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'meilleur_business_action_before_content', 'meilleur_business_content_start', 10 );

if ( ! function_exists( 'meilleur_business_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function meilleur_business_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
	}
endif;
add_action( 'meilleur_business_action_before_footer', 'meilleur_business_footer_start' );

if ( ! function_exists( 'meilleur_business_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function meilleur_business_footer_end() {?>
		</footer><div class="backtotop"><i class="fa fa-angle-up"></i></div><?php
	}
endif;
add_action( 'meilleur_business_action_after_footer', 'meilleur_business_footer_end' );
