<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meilleur Business
 */
/**
* Hook - meilleur_business_action_doctype.
*
* @hooked meilleur_business_doctype -  10
*/
do_action( 'meilleur_business_action_doctype' );
?>
<head>
<?php
/**
* Hook - meilleur_business_action_head.
*
* @hooked meilleur_business_head -  10
*/
do_action( 'meilleur_business_action_head' );
?>

<?php wp_head(); ?>
<script async src="https://cdn.ampproject.org/v0.js"></script>
    <title>Hello, AMPs</title>
    <link rel="canonical" href="https://amp.dev/documentation/guides-and-tutorials/start/create/basic_markup/">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "Open-source framework for publishing content",
        "datePublished": "2015-10-07T12:02:41Z",
        "image": [
          "logo.jpg"
        ]
      }
    </script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - meilleur_business_action_before.
*
* @hooked meilleur_business_page_start - 10
*/
do_action( 'meilleur_business_action_before' );

/**
*
* @hooked meilleur_business_header_start - 10
*/
do_action( 'meilleur_business_action_before_header' );

/**
*
*@hooked meilleur_business_site_branding - 10
*@hooked meilleur_business_header_end - 15 
*/
do_action('meilleur_business_action_header');

/**
*
* @hooked meilleur_business_content_start - 10
*/
do_action( 'meilleur_business_action_before_content' );

/**
 * Banner start
 * 
 * @hooked meilleur_business_banner_header - 10
*/
do_action( 'meilleur_business_banner_header' );  
