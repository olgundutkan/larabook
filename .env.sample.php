<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	*/

	'APP_URL' => 'http://localhost',

	/*
	|--------------------------------------------------------------------------
	| Database Configurations
	|--------------------------------------------------------------------------
	*/
	
	'DB_DATABASE'  => 'database',
	'DB_USERNAME'  => 'username',
	'DB_PASSWORD'  => 'password',
	
	/**
	 * E-Mail configurations
	 */
	
	'FROM_EMAIL_ADDRESS' => 'admin@socialnetwork.com',
	'FROM_NAME' => 'Social Network',
	
	/** THIRD-PARTY  **/

	'MANDRILL_SECRET'  => 'secret',

	'MAILCHIMP_APIKEY' => 'secret',

	'MAILCHIMP_USERS_NEWSLETTER_LIST_ID' => 'list_id',
	
	'RECAPTCHA_SITE_KEY'	=> 'site',
	'RECAPTCHA_SECRET_KEY'	=> 'secret',

	/**
	 * AWS S3
	 */
	'AWS_S3_KEY'    => 'key',
	'AWS_S3_SECRET' => 'secret',
	'AWS_S3_REGION' => 'region',
	'AWS_S3_BUCKET' => 'bucket',
);