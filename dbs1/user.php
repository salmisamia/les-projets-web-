<?php

public class user {
	
	private $id;
	private $name;
	private $surname;
	private $sex;
	private $birthdate;
	private $state;
	
	public static function __construct($id=NULL) {
		
	}
	
	public function add() {
		$bdd = dbConnect();
		$query = "INSERT INTO user VALUES(NULL,?,?,?,?,?)";
		$bdd->prepare($query);
		$bdd->execute(array($this->name, $this->surname, $this->sex, $this->birthday, $this->state));
	}
}

?>
