<?php include_once ('index.php')?>
<?php include_once ('header.php')?>
<h1>Message bien reçu !</h1>

<?php   
if (
    (!isset($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) 
    || (!isset($_GET['message']) || empty($_GET['message']))
    ){
   
    echo('Il faut un email et un message pour soumettre le formulaire.');
    
    return;
}
$message = $_GET['message'];
?>
<div class="card">
    
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
        <p class="card-text"><b>Message</b> : <?php echo strip_tags($message); ?></p>
    </div>
</div>

<?php var_dump($_GET);?>

<?php include ('footer.php')?>