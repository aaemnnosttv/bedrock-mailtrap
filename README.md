# Bedrock Mailtrap

A [Mailtrap](https://mailtrap.io/) plugin for [Roots Bedrock](https://github.com/roots/bedrock/).

## Elevator

Don't let those emails get sent to real people from your non-production environments! We still want to see those emails and make sure that they are sent and are looking good though.  

**Enter: Mailtrap**.  Mailtrap is an email service for just this. With Mailtrap, you can setup as many target inboxes as you want, for different projects, etc.  When mail is sent there, you can view it in your browser, as if it had been sent to you!

## Elevator (cont.)

This plugin is a simple always-on integration, which merely hijacks emails as they are being sent from your website if it is a non-production environment.

Designed for Bedrock WordPress installs, the package is installed as an mu-plugin, which is then autoloaded by the Bedrock mu-plugin autoloader.
Simply install this package, set your Mailtrap credentials, and you're done.

## Installation

Require the package with Composer.
```
composer require aaemnnosttv/bedrock-mailtrap:^0.1
```

Set your Mailtrap credentials in your project's `.env` file like so
```
MAILTRAP_USER=xxxxxxxxxxxxxx
MAILTRAP_PASS=xxxxxxxxxxxxxx
```

That's it.  Whenever your `WP_ENV` is not equal to `production`, your emails will be sent to Mailtrap instead.

## Considerations

As long as the environment condition is true, mail will be attempted to be sent to Mailtrap.  So, if you forget to add your credentials to the environment file, it will still be sent to Mailtrap, the email will just not make it to your account/inbox.

### IMPORTANT
**THIS DOES NOT WORK WITH MAIL SENT USING THE HTTP API**
If you use a transactional mail service like Mandrill, Mailgun, or the like, there is a good chance that you will need to deactivate that plugin in your non-production environments in order for this to work.  (You may consider using something like [WP Plugin Activation Manifest](https://github.com/PrimeTimeCode/wp-plugin-activation-manifest) to do this automatically)
Most of these plugins have the option of sending mail through their service using SMTP or their API.  If you have the option, choose sending via SMTP as it should be compatible.  Don't take my word for it, test for yourself.

**As with anything, always thoroughly test this under safe circumstances first before trusting it with mail that you really do not want to be sent.**
