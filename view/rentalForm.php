<?php $title = "Sakilla || " . htmlspecialchars($post['title']) ?>
    <?php ob_start(); ?>

    <?php session_start();?>
    <?php if(isset($_SESSION['first_name'])){ ?>
    
        <div class="container bg-light mt-5">
            <a href="index.php?action=post&amp;id=<?= $post['film_id']?>">
                <i class="fas fa-arrow-circle-left fa-2x mt-3 text-black"></i>
            </a>

            <h2 class="d-flex justify-content-center">
                location
            </h2>
            <div class="d-flex flex-column">
                <span>
                    Référence du film: 
                    <?= htmlspecialchars($post['film_id']) ?>
                </span>
                <span>
                    Nom du film: 
                    <?= htmlspecialchars($post['title']) ?>
                </span>
            </div>
            
            <form method="POST" action="index.php?action=addRental">
                    <div class="mt-5 d-flex flex-column ">
                    
                        <!--Staff-->
                        <label for="userStaff"> Enregistré par
                        <select name="staff_id" class="form-select" aria-label="Default select example">
                            <option disabled selected hidden> Id staff n° </option>
                            <?php foreach ($staffs as $staff) { ?>
                            <option value="<?php echo $staff['staff_id']; ?>"> 
                                <?php echo $staff['last_name']; ?> 
                                <?php echo $staff['first_name'];?>
                            </option>
                            <?php } ?>
                        </select>
                        
                        <!--customer-->
                        <label for="validationTooltip02" class="form-label">N° client</label>
                        <select name="customer_id" class="form-select" aria-label="Default select example">
                            <option disabled selected hidden> N° </option>
                            <?php foreach ($customers as $customer) { ?>
                            <option value="<?php echo $customer['customer_id']; ?> ">
                                <?php echo $customer['first_name']; ?>
                                <?php echo $customer['last_name']; ?>
                            </option>
                            <?php } ?>
                        </select>

                        <!--Date of rental-->
                        </label>
                        <label for="rental_date">Date debut de location
                            <input type="date" id="rental_date" name="rental_date" class="form-control" required>
                        </label>

                        <!--Date of return rental-->
                        <label for="return_date">Date fin de location
                            <input type="date" id="return_date" name="return_date" class="form-control" required>
                        </label>

                        <!--movie id-->
                        <!-- <input type="hidden" id="film_id" name="film_id" value="<?php // echo $post['film_id'] ?>"> -->

                        <!--movie inventary id-->
                        <input type="hidden" id="inventory_id" name="inventory_id" value="<?php echo $inventory['inventory_id'] ?>">


                    </div>
                    <div class="col-12 mb-3 text-center">
                        <button type="submit" class="btn btn-success mt-2" name="submit" id="submit">Submit
                        </button>
                    </div>
                </form>

        </div>
    <?php } ?>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?> 