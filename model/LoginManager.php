<?php

require_once("model/ConnexionManager.php");

class LoginManager extends DataBassConnexion {

	//check staff is exact first name and password

	public function sessionUser($first_name, $password){

		$conn =  $this->connectDatabase();

		//  Récupération de l'utilisateur et de son pass hashé
		
		$request = $conn->prepare("SELECT staff_id, password FROM staff WHERE first_name = ? and password = ? ");
		$request->execute(array( $first_name, $password ));
		return $request;
	}
}