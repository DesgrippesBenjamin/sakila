
<?php

  /** ROUTEUR **/

   
  require('./controller/controller.php');

  try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'listPosts') {
          listMouvies();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
              mouvie();
            }
            else {
                throw new Exception('Aucun identifiant de film envoyé');
            }
        }

        if ($_GET['action'] == 'rental') {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
            mouvieForm();
          }
          else {
              throw new Exception('Aucun identifiant de film envoyé');
          }
        } elseif ($_GET['action'] == 'addRental') {
          // if (isset($_GET['id']) && $_GET['id'] > 0) {
              if (!empty($_POST['rental_date']) && !empty($_POST['inventory_id']) && !empty($_POST['customer_id']) && !empty($_POST['return_date']) && !empty($_POST['staff_id'])) {
                  addRental($_POST['rental_date'], $_POST['inventory_id'], $_POST['customer_id'], $_POST['return_date'], $_POST['staff_id']);
                  header('location:index.php');
              }
              else {
                  throw new Exception('Tous les champs ne sont pas remplis !');
              }
          //  }
          //  else {
          //      throw new Exception('Aucun identifiant de la location envoyé !');
          //  }
        }
    } elseif(isset($_GET['_sakiladmin$ecret'])){
      
      if(($_GET['_sakiladmin$ecret'] == 'connexion')){
        viewlogin();
      }elseif ($_GET['_sakiladmin$ecret'] == 'checkconnexion') {
        if(!empty($_POST['first_name']) && !empty($_POST['password'])){
            connexion($_POST['first_name'], $_POST['password']);
        }   
        else {
            //erreur
            throw new Exception('Tous les champs ne sont pas remplis !');
        } 
      }elseif ($_GET['_sakiladmin$ecret'] == 'deconnexion') {
      deconnexion();
  }
    }
    else {
      listMouvies();
    }
  }
  catch(Exception $e) {
    echo 'Erreur :' . $e->getMessage();
  }

