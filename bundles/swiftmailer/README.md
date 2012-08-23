## Swift Mailer Bundle, by Taylor Otwell

A Laravel Swift Mailer bundle, installable via the Artisan CLI:

	php artisan bundle:install swiftmailer

You must then auto-load the bundle in bundles.php:

	return array(
		'swiftmailer' => array('auto'=>true)
	);

In your code, you need to get a Swift_Mailer instance:

	$mailer = IoC::resolve('mailer');

You will also need a message instance that will allow you to construct your message and later send:

	$message = Swift_Message::newInstance('Subject Of Email');

Ultimately the final code to construct a message will look something like this:

	// If you do not want to auto-load the bundle, you can use this
	Bundle::start('swiftmailer');
	
	// Get the Swift Mailer instance
	$mailer = IoC::resolve('mailer');
	
	// Construct the message
	$message = Swift_Message::newInstance('Message From Website')
		->setFrom(array('example@example.com'=>'Mr Example'))
		->setTo(array('example@example.com'=>'Mr Example'))
		->addPart('My Plain Text Message','text/plain')
		->setBody('<p>My HTML Message</p>','text/html');

	// Send the email
	$mailer->send($message);

Or, since your controllers have dynamic access to the IoC container:

	$this->mailer->send($message);

## Swift Mailer, by Chris Corbyn

Swift Mailer is a component based mailing solution for PHP 5.
It is released under the LGPL license.

- Homepage:      http://swiftmailer.org
- Documentation: http://swiftmailer.org/docs
- Mailing List:  http://groups.google.com/group/swiftmailer
- Bugs:          https://github.com/swiftmailer/swiftmailer/issues
- Repository:    https://github.com/swiftmailer/swiftmailer

Swift Mailer is highly object-oriented by design and lends itself
to use in complex web application with a great deal of flexibility.

For full details on usage, see the documentation.

## IMPORTANT

Users upgrading from version 3.x or earlier absolutely MUST read the documentation.  In short, the API is considerably different so your old code won't "just work".

## Donations

If you'd like to make a donation, we are working on a system where
donations are taken on a per-feature-request basis via the website
with target amounts for each feature. In the meantime however you
may donate directly to the author via PayPal:

  PayPal: chris@w3style.co.uk

Donations are certainly voluntary, but seriously, you donors are
complete legends and drive this project! :)