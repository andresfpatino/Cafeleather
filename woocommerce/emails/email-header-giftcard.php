<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
	</head>

	
	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">


		<div bgcolor="#eee" style="background-color: #eee; margin: 0; padding: 70px 0; width: 100%;">

			<div align="center" valign="top" width="650" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/pattern-bg.png'); width: 650px; margin: 0 auto;">

				<img style="margin:35px auto; width: 150px; max-width: 150px;" width="150" src="<?php echo get_option( "woocommerce_email_header_image" ); ?>" alt="<?php echo get_bloginfo( 'name', 'display' );?>"/>
						

