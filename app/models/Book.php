<?php

class Book{

	static function search($name){
		$usr = trim($name);

		if(empty($usr)){
			return false;
		}

		$r = DB::sql('SELECT * FROM `books` WHERE `book_name` = :name', array(
			':name' => $name
		));

		if( count($r) > 0 ){
			return $r[0];
		}else{
			return false;
		}
	}

	static function 
};

?>
