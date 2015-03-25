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
			'client_id' => '536445865773-n524h8t2vsr3rud88kt8hm9gn5bf1atg.apps.googleusercontent.com',
			'client_secret' => 'uPMgvL_73fcIfwrGu8XEx2Wh',
			'scope' => array('userinfo_email', 'userinfo_profile'),
		),
		/**
		 * Twitter
		 */
		'Twitter' => array(
			'client_id' => 'fUYLt6FSmSMv465FyvXfOIdTi',
			'client_secret' => 'edU4iFpPvYoLEWJ5GhTrRNHj4a73qMVUCma1HQL9yzmUVjqNqO',
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
