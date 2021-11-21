<?php session_start();?>

<?php $title = "Sakilla || Register"  ?>
<?php ob_start(); ?>
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card text-center w-50">
            <h5 class="card-header">Login staff</h5>
            <form method="post" action="index.php?_sakiladmin$ecret=checkconnexion">
                Nom:<br>
                <input type="text" name="first_name" >
                <br><br>
                Mot de passe:<br>
                <input type="password" name="password">
                <br><br>
                <button  type="submit" value="Submit" class="btn btn-primary mb-2">login</button>
            </form>
            <div class="card-footer text-muted">
                Sakilla
            </div> 
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?> 