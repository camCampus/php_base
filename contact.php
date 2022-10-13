<?php (!isset($_SESSION)) ? : session_start(); ?>
<?php
$titre = 'Contact';
$nav = 'contact';
require 'header.php'; ?>
<?php

$form_info = array(
    "civ" => $_POST['civ'],
    "nom" => $_POST['nom'],
    "prenom" => $_POST['prenom'],
    "email" => $_POST['email'],
    "radioA" => $_POST['radioA'],
//    "radioB" => $_POST['radioB'],
//    "radioC" => $_POST['radioC'],
    "area" => $_POST['area'],
);
$check_info = array(
    "civ" => false,
    "nom" => false,
    "prenom" => false,
    "email" => false,
    "radio" => false,
    "area" => false,
);
if(!filter_var($form_info["email"], FILTER_VALIDATE_EMAIL) || empty($form_info["email"])) {
    $emailErr = "Format de mail non valide";
}
if ($form_info["civ"] === "null") {
    $civErr = "Vous devez faire un choix";
}
if (empty($form_info['nom']) || empty($form_info['prenom'])) {
    $nameErr = "Vous devez remplir Nom et Prenom";
}
if ($form_info["radioA"] === null && $form_info['radioB'] === null && $form_info['radioC'] === null) {
    $radioErr = "Vous devez faire un choix";
}
if (strlen($form_info['area']) < 5) {
    $areaErr = "Votre message doit contenir au moins 5 caractères ";
}
$_SESSION['tab'] = $form_info;
file_put_contents('form.txt', $form_info."\n");
?>
    <!--    <pre>-->
    <!--    --><?php //var_dump($form_info); ?>
    <!--    </pre>-->

    <pre>
    <?php var_dump($_SESSION['tab']); ?>
    </pre>

    <form action="contact.php" method="post" class="contend">
        <div class="container-fluid col-6">
            <select class="form-select mb-3" aria-label="Default select example" name="civ">
                <option value="null">Civilité</option>
                <option value="<?php
                echo (($_SESSION['tab']['civ']!= null)) ? $_SESSION['tab']['nom'] : "Madame";?>">Madame
                </option>
                <option value="<?php
                echo (($_SESSION['tab']['civ'] != null)) ? $_SESSION['tab']['nom'] : "Monsieur";?>">Monsieur</option>
            </select>

            <p class="error"><?php echo strip_tags($civErr) ?></p>
            <div class="mb-3">
                <label class="form-label">Nom </label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="nom" value="<?php
                echo (isset($_SESSION['tab']['nom'])) ? $_SESSION['tab']['nom'] : "";?>">
                <p class="error"><?php echo strip_tags($nameErr) ?></p>


            </div>
            <div class="mb-3">
                <label class="form-label">Prenom </label>
                <input type="text" class="form-control" i aria-describedby="emailHelp" name="prenom" value="<?php
                echo (isset($_SESSION['tab']['prenom'])) ? $_SESSION['tab']['prenom'] : "";?>">
                <p class="error"><?php echo strip_tags($nameErr) ?></p>


            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email" value="<?php
                echo (isset($_SESSION['tab']['email'])) ? $_SESSION['tab']['email'] : "";?>">
                <p class="error"><?php echo strip_tags($emailErr) ?></p>
            </div>


            <label class="mb-3">Raison de votre message :</label>

            <div class="mb-3 form-check">
                <input class="form-check-input mt-0" type="radio" value="<?php
                echo (isset($_SESSION['tab']['radio'])) ? $_SESSION['tab']['radio'] : "Une passion pour les formulaires";?>"
                       aria-label="Radio button for following text input" name="radioA">
                <label class="form-check-label" for="exampleCheck1">Une passion pour les formulaires</label>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input mt-0" type="radio" value="<?php
                echo (isset($_SESSION['tab']['radio'])) ? $_SESSION['tab']['radio'] : "J'ai rien d'autre à faire";?>"
                       aria-label="Radio button for following text input" name="radioA">
                <label class="form-check-label" for="exampleCheck2">J'ai rien d'autre à faire</label>
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input mt-0" type="radio" value="<?php
                echo (isset($_SESSION['tab']['radio'])) ? $_SESSION['tab']['radio'] : "J'adore qu'on recolte mes données";?>"
                       aria-label="Radio button for following text input" name="radioA">
                <label class="form-check-label" for="exampleCheck3">J'adore qu'on recolte mes données <3</label>
            </div>
            <p class="error"><?php echo strip_tags($radioErr) ?></p>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Votre message ici" id="floatingTextarea2"
                          style="height: 100px" name="area"></textarea>
                <label for="floatingTextarea2">Commentaires</label>
                <p class="error"><?php echo strip_tags($areaErr) ?></p>
            </div>

            <button type="submit" class="btn btn-primary m-3">Submit</button>
        </div>

    </form>
<?php require 'footer.php'; ?>