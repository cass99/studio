<?php

define('THEMEPATH', get_template_directory());
define('FUNCTIONSPATH', THEMEPATH . '/functions/');
define('COMPONENTSPATH', THEMEPATH . '/components/');


// Setup
require_once( FUNCTIONSPATH . 'init.php' );

// Enqueue all scripts
require_once( FUNCTIONSPATH . 'enqueues-scripts.php' );

// Connect acf with proper files
require_once( FUNCTIONSPATH . 'acf-handler.php' );

// Components
require_once( COMPONENTSPATH . '02-atoms/init.php' );
require_once( COMPONENTSPATH . '03-molecules/init.php' );
require_once( COMPONENTSPATH . '04-modules/init.php' );
require_once( COMPONENTSPATH . '05-organism/init.php' );
