<?php

  /********* CONTROLLER ***********/

  //Upload class
    require_once('model/MoviesManager.php');
    require_once('model/RentalManager.php');
    require_once('model/LoginManager.php');


  /*
  * This is a part for movies controller management
  */

  // Get all mouvies
    function listMouvies() {

      $movies = new MoviesManager();
      $req = $movies->getMovies();
      require('view/homeView.php');
    };

  // Get one mouvie
    function mouvie () {

      $movie = new MoviesManager();
       $post = $movie->findOneMovie($_GET['id']);
      require('view/filmView.php');
    };

    /*
    * This is a part for rental controller management
    */


    /*controller fetch all data for form rental on mouvie*/
    function mouvieForm () {

      //find all staffs
      $rental = new RentalManager();
      $staffs = $rental->getStaffs();
      $customers = $rental->getCustomers();
      $inventory =  $rental->getInventory($_GET['id']);

      //find one movie by id
      $movie = new MoviesManager();
      $post = $movie->findOneMovie($_GET['id']);
      require('view/rentalForm.php');
  };

    /*controller add rental*/
    function addRental($rental_id, $staff_id, $customeur_id) {

      $rental = new RentalManager();
      $affectedValue = $rental->rentalFilm($rental_id, $staff_id, $customeur_id);
        
      if ($affectedValue === false) {
          throw new Exception('Impossible d\'ajouter la location !');
      }
      else {
           header('Location: index.php?action=post&id=' . $postId);
      }
    }

    /*
     * This is a part for login controller management
     */

    // controller for view login

    function viewlogin(){
      require('view/login.php');
    }

    //controller check staff login

    function connexion ($first_name, $password) {

      $loginManager = new LoginManager();

      $login  = $loginManager->sessionUser($first_name, $password);
      $user = $login->fetch(PDO::FETCH_OBJ);
      
      if (!$user){
            echo 'Mauvais identifiant ou mot de passe !';
        }
      else
      {
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);

        $validPassword = $password;

          if ($validPassword) {

            session_start();
            $_SESSION['first_name'] = $first_name;
            $_SESSION['login'] = true;
            header('Location: index.php?');
          }
          else {
              echo 'Mauvais identifiant ou mot de passe !';
          }

      }
  }

   // controller checklogout staff login

   function deconnexion()
    {
      session_start();

      $_SESSION = array();
      session_destroy();
      setcookie('connexion', '');
      setcookie('pass_hash', '');
      header('Location: index.php?_sakiladmin$ecret=connexion');
    exit;
}
  