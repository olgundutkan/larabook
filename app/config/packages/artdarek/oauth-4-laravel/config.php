<?php

return array(

/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
*/

/**
 * Storage
 */
'storage' => 'Session',

/**
 * Consumers
 */
'consumers' => array(

		/**
		 * Facebook
		 */
		'Facebook' => array(
			'client_id' => '1086484361367967',
			'client_secret' => '12f985c614ebb8a1002d92a75d20c5af',
			'scope' => array(),
		), 
		/**
		 * Google
		 */
		'Google' => array(
			'client_id' => 'Your Google client ID',
			'client_secret' => 'Your Google Client Secret',
			'scope' => array('userinfo_email', 'userinfo_profile'),
		),
		/**
		 * Twitter
		 */
		'Twitter' => array(
			'client_id' => 'Your Twitter client ID',
			'client_secret' => 'Your Twitter Client Secret',
		),
		/**
		 * Linkedin
		 */
		'Linkedin' => array(
			'client_id' => 'Your Linkedin API ID',
			'client_secret' => 'Your Linkedin API Secret',
		),
	)
);
