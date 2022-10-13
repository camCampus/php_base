<?php
$titre = 'Contact';
$nav = 'contact';
require 'header.php'; ?>
<?php
$form_info = array(
    "civ" => $_POST['civilite'],
    "nom" => $_POST['nom'],
    "prenom" => $_POST['prenom'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
    "radioA" => $_POST['radioA'],
    "radioB" => $_POST['radioB'],
    "radioC" => $_POST['radioC'],
    "area" => $_POST['area'],
);
if (!filter_var($form_info["email"], FILTER_VALIDATE_EMAIL) || empty($form_info["email"])) {
    $email = "Format de mail non valide";
}


?>
<pre>
    <?php var_dump($form_info); ?>
</pre>

    <form action="contact.php" method="post" class="contend">
        <div class="container-fluid col-6">
            <select class="form-select mb-3" aria-label="Default select example" name="civilite">
                <option selected>Civilité</option>
                <option value="1">Madame</option>
                <option value="2">Monsieur</option>
            </select>
            <div class="mb-3">
                <label class="form-label">Nom </label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="nom">
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Prenom </label>
                <input type="text" class="form-control" i aria-describedby="emailHelp" name="prenom">
                <div class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <p><?php echo strip_tags($email)?></p>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <label class="mb-3">Le campus numérique est :</label>

            <div class="mb-3 form-check">
                <input class="form-check-input mt-0" type="radio" value=""
                       aria-label="Radio button for following text input" name="radioA">
                <label class="form-check-label" for="exampleCheck1">Bine trop cool</label>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input mt-0" type="radio" value=""
                       aria-label="Radio button for following text input" name="radioB">
                <label class="form-check-label" for="exampleCheck2">Vraiment trop cool</label>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input mt-0" type="radio" value=""
                       aria-label="Radio button for following text input" name="radioC">
                <label class="form-check-label" for="exampleCheck3">Beacoup trop cool</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Votre message ici" id="floatingTextarea2"
                          style="height: 100px" name="area"></textarea>
                <label for="floatingTextarea2">Commentaires</label>
            </div>

            <button type="submit" class="btn btn-primary m-3">Submit</button>
        </div>

    </form>
<?php require 'footer.php'; ?>