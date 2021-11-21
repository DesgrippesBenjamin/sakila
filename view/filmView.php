
    <?php $title = "Sakilla || " . htmlspecialchars($post['title']) ?>
    <?php ob_start(); ?>
    
        <div class="container bg-light mt-5">
            <a href="index.php">
                <i class="fas fa-arrow-circle-left fa-2x mt-3 text-black"></i>
            </a>

            <h2 class="d-flex justify-content-center">
                <?= htmlspecialchars($post['title']) ?>
            </h2>
            <div class="d-flex justify-content-evenly">
                <div>
                    <img src="images/lilo.jpg" class="rounded mx-auto d-block py-2" alt="...">
                    <div class="d-flex justify-content-evenly">
                        <p><i class="fas fa-tag"></i>&nbsp;Prix: <?= htmlspecialchars($post['rental_rate']) ?> $</p>
                        <p><i class="fas fa-stopwatch"></i>&nbsp;Temps: <?= htmlspecialchars($post['length']) ?> min</p>
                    </div>
                    <div style="max-width: 360px">
                        <p>Description:&nbsp;<?= nl2br(htmlspecialchars($post['description'])) ?></p>
                    </div>
                </div>
                <div class="my-auto bg-info p-2"> 
                    <h5 class="text-center">A savoir</h5>
                    <p> 
                        Le prix indiqué correspond à une semaine de location.<br>
                        Pour toute location, veuillez nous contacter au 89.65.00.
                    </p>
                </div>
            </div>
            <?php session_start();?>
            <?php if(isset($_SESSION['first_name'])){ ?>
                <div class="text-center">
                    <a href="index.php?action=rental&amp;id=<?=$post['film_id'] ?>" class="btn btn-success">
                        <i class="fas fa-cart-arrow-down "></i>    
                        Louer
                    </a>
                </div>
            <?php } ?>
        </div>
  
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?> 