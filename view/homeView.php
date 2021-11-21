<?php $title = "Sakilla || Homme "?>
<?php ob_start(); ?>
    
    <header class="header d-flex justify-content-center">
        <img src="images/header.jpeg">
    </header>
    <section> 
        <div class=" row d-flex justify-content-around mt-5">
            <?php while ($data = $req->fetch()) { ?>
                <div class="col-6 card card-movie my-2" style="width: 18rem;">
                    <img src="images/lilo.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($data['title']); ?>
                            <?php echo $data['film_id']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo nl2br(htmlspecialchars($data['description']));?>
                        </p>
                        <a href="index.php?action=post&amp;id=<?=$data['film_id'] ?>" class="btn btn-success">
                            <i class="fas fa-play-circle"></i>
                        </a>
                    </div>
                </div>
            <?php 
            } 
            $req->closeCursor(); ?>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?> 

    
