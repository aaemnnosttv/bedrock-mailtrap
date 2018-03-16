<?php
/**
 * Plugin Name: Mailtrap
 * Description: Capture outgoing mail in non-production environments.  Set Mailtrap credentials using <code>MAILTRAP_USER</code> and <code>MAILTRAP_PASS</code> environment variables.
 * Author: Evan Mattson
 * Author URI: https://aaemnnost.tv
 *
 * Version: 1.0.1
 */

if ('production' == WP_ENV) {
    return;
}

add_action('phpmailer_init', function($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host     = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port     = 2525;
    $phpmailer->Username = getenv('MAILTRAP_USER');
    $phpmailer->Password = getenv('MAILTRAP_PASS');
}, 999);
