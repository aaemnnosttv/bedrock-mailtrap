<?php
/**
 * Plugin Name: Mailtrap
 * Description: Capture outgoing mail in non-production environments.  Set Mailtrap credentials using 'MAILTRAP_USER' and 'MAILTRAP_PASS' environment variables.
 * Author: Evan Mattson
 * Author URI: https://aaemnnost.tv
 *
 * Version: 0.1
 */

if ('production' == WP_ENV) {
    return;
}

add_action('phpmailer_init', function($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host     = 'mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port     = 2525;
    $phpmailer->Username = getenv('MAILTRAP_USER');
    $phpmailer->Password = getenv('MAILTRAP_PASS');
}, 999);
