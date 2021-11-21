<?php
require_once("model/ConnexionManager.php");

class RentalManager extends DataBassConnexion {

    public $staffs = [];
    public $customers = [];
    public $inventory = [];

    //Post Information

    function rentalFilm(){
        $rental_date=$_POST['rental_date'];
        $inventory_id=$_POST['inventory_id'];
        $customer_id=$_POST['customer_id'];
        $return_date=$_POST['return_date'];
        $staff_id=$_POST['staff_id'];

        $conn = $this->connectDatabase();
        $comments = $conn->prepare('INSERT INTO rental(rental_date, inventory_id, customer_id, return_date, staff_id) VALUES(?, ?, ?, ?, ?)');
        $affectedValue = $comments->execute(array($rental_date, $inventory_id, $customer_id, $return_date, $staff_id));
        return $affectedValue;

    }

    // get staff information

    public function getStaffs() {
        
        $conn = $this->connectDatabase();
        $staffs = $conn->prepare("SELECT * FROM staff");
        $staffs->execute();
        return $staffs->fetchAll();
        
    }

    // get staff information

    public function getCustomers() {
        
        $conn = $this->connectDatabase();
        $customers  = $conn->prepare("SELECT * FROM customer order by first_name ASC");
        $customers ->execute();
        return $customers ->fetchAll();
        
    }

    // get inventory

    public function getInventory($filmId) {

        $conn = $this->connectDatabase();
        $inventorys = $conn->prepare( 
        "SELECT DISTINCT inventory.inventory_id, film.film_id, store.store_id FROM inventory
            JOIN film ON film.film_id = inventory.film_id
            JOIN store ON store.store_id = inventory.store_id 
            WHERE film.film_id = '$filmId'
            AND store.store_id =2");  
        $inventorys->execute();
        $values = $inventorys->fetch(PDO::FETCH_ASSOC);
        return $values;
    }
}