<?php include_once ('index.php')?>
<?php include_once ('header.php')?>

<form action="submit_contact.php" method="GET" enctype="multipart/form-data">
    <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value='Ecrivez votre mail içi'>
    </div>
    <div>
        <label for="message" class="form-label">Votre message</label>
        <textarea placeholder="Exprimez vous" name="message"><script> alert('Boom')</script></textarea>
    </div>
    <div class="mb-3">
        <label for="screenshot" class="form-label">Insérer votre image</label>
        <input type="file" name="screenshot" class="form-control" id="screenshot"></textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>


<?php include ('footer.php')?>