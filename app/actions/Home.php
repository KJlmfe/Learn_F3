<?php

class Home{
	function run(){
		echo Template::serve('login.html');
	}
	
	function login(){
		$success = Account::valid(F3::get('POST.usr'), F3::get('POST.pwd'));
		if($success != false)
			echo Template::serve('search.html');
		else
		{
			F3::set('login_status','false');
			echo Template::serve('login.html');
		}
	}
};

?>
