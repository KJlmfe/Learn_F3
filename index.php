<?php

require __DIR__.'/lib/base.php';

F3::set('CACHE',TRUE);
F3::set('DEBUG',1);
F3::set('UI','ui/');
//Routing Engine

//4 ways for Hello,World
F3::route('GET /hello1','hello');
	function hello()
	{
		echo "Hello,World";
	}
F3::route('GET /hello2',
	function()
	{
		echo "Hello,World";
	});
class webpage
{
	static function display()
	{
		echo "Hello,World";
	}
}
F3::route('GET /hello3','webpage::display');
F3::route('GET /hello4','webpage->display');
//Routes and Tokens
F3::route('GET /book/@abc','book');
	function book()
	{
		//2 ways to get abc
		echo F3::get('PARAMS["abc"]');
		echo F3::resolve('{{@PARAMS.abc}}');
	}
F3::route('GET /music/*',
	function()
	{
		echo "I can't get the world behind music/";
	});
//Multiple Route Handlers/Function Chains
F3::route('GET /hello5','rock; roll');
	function rock()
	{
		echo 'We rock!....';
	}
	function roll()
	{
		echo 'We roll!....';
	}
F3::route('GET /hello6','rock; roll; rattle');
	function rattle()
	{
		echo 'We rattel!...';
	}
//Import Files
F3::set('IMPORTS','inc/');
F3::route('GET /hello7','roll; abc.php');
//Calling Route Handlers
F3::route('GET /hello8',
	function()
	{
		F3::call('roll; abc.php');
	});
//Rerouting
F3::route('GET /hello9',
	function()
	{
		F3::reroute('http://www.baidu.com');
	});
//Triggering a 404
F3::route('GET /hello10',
	function()
	{
		F3::error(404);
	});
//The F3 Autoloader
F3::set('AUTOLOAD','inc/');
F3::route('GET /',
	function() {
		F3::set('modules',
			array(
				'apc'=>
					'Cache engine',
				'gd'=>
					'Graphics plugin',
				'hash'=>
					'Framework core',
				'imap'=>
					'Authentication',
				'json'=>
					'Various plugins',
				'ldap'=>
					'Authentication',
				'memcache'=>
					'Cache engine',
				'mongo'=>
					'M2 MongoDB mapper',
				'pcre'=>
					'Framework core',
				'pdo_mssql'=>
					'SQL handler, Axon ORM, Authentication',
				'pdo_mysql'=>
					'SQL handler, Axon ORM, Authentication',
				'pdo_pgsql'=>
					'SQL handler, Axon ORM, Authentication',
				'pdo_sqlite'=>
					'SQL handler, Axon ORM, Authentication',
				'session'=>
					'Framework core',
				'sockets'=>
					'Network plugin',
				'xcache'=>
					'Cache engine'
			)
		);
		echo Template::serve('welcome.htm');
	}
);

F3::run();

?>
