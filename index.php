<?php

require __DIR__.'/app/lib/base.php';

F3::config('app/cfg/setup.cfg');
F3::config('app/cfg/routes.cfg');

F3::set('DB', new DB(
	'mysql:host=localhost;port=3306;dbname=library',
	'root',
	''
));

F3::run();

?>
