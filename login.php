<?php include_once ('db_connect.php')?>
<?php include_once ('variables.php')?>
<?php include_once ('functions.php')?>
<?php include_once ('index.php')?>
<?php include_once ('header.php')?>

<?php
        if (
            (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
            || (!isset($_POST['password']) || empty($_POST['password']))
            ){
                    $errorConnexion = 'Saisissez vos identifiants';
                    echo $errorConnexion;       
            }else{
                    foreach($users as $user) {
                            if(
                            $_POST['email'] === $user['email'] && $_POST['password'] === $user['password']
                            ){
                            session_start();
                            $_SESSION['LOGGED_USER'] = $user['email'];
                            $connexionSucceed = 'Connexion réussi';
                           
                            }else{
                                    $errorId = 'Connexion impossible'; 
                            }
                    }
            } 
         
?>
<form action="" method="POST">  
    <?php if(!isset($_SESSION['LOGGED_USER'])):?>
    <?php if(isset($errorId)):?>
    <div class="alert alert-danger" role= ="alert"> <?php echo $errorId;?></div>
    <?php endif;?>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
    </div>
    <div>
        <label for="message" class="form-label">Mot de passe</label>
        <input type="password" name="password" value = '' class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php else: header('Location: home.php');?>
<?php endif;?>

