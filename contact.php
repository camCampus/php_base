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
    "radio" => $_POST['radio'],
    "area" => $_POST['area'],
);

if (!filter_var($form_info["email"], FILTER_VALIDATE_EMAIL) || empty($form_info["email"])) {
    $emailErr = "Format de mail non valide";
}
if ($form_info["civ"] === "null") {
    $civErr = "Vous devez faire un choix";
}
if (empty($form_info['nom']) || empty($form_info['prenom'])) {
    $nameErr = "Vous devez remplir Nom et Prenom";
}
if ($form_info["radio"] === null) {
    $radioErr = "Vous devez faire un choix";
}
if (strlen($form_info['area']) < 5) {
    $areaErr = "Votre message doit contenir au moins 5 caractères ";
}

$_SESSION['tab'] = $form_info;

file_put_contents('form.txt', $_SESSION['tab']);
?>

    <pre>
    <?php var_dump($_SESSION['tab']); ?>
    </pre>

    <form class="first-form" action="index.php?page=contact" method="post" class="contend">
        <div class="container-fluid col-6">

            <select class="form-select mb-3" aria-label="Default select example" name="civ">
                <option value="null">Civilité</option>
                <?php
                $madame = "Madame";
                $monsieur = "Monsieur";
                $noRep = "Je ne souhaite pas répondre";

                if ($_SESSION['tab']['civ'] == $madame) {
                    echo "<option selected value = '" . $_SESSION['tab']['civ'] . "'>" . $_SESSION['tab']['civ'] . "</option>";
                } else {

                    echo "<option value='" . $madame . "'>" . $madame . "</option>";
                }
                ?>
                <?php
                if ($_SESSION['tab']['civ'] == $monsieur) {
                    echo "<option selected value = '" . $_SESSION['tab']['civ'] . "'>" . $_SESSION['tab']['civ'] . "</option>";
                } else {

                    echo "<option value='" . $monsieur . "'>" . $monsieur . "</option>";
                }
                ?>
                <?php
                if ($_SESSION['tab']['civ'] == $noRep) {
                    echo "<option selected value = '" . $_SESSION['tab']['civ'] . "'>" . $_SESSION['tab']['civ'] . "</option>";
                } else {
                    echo "<option value='" . $noRep . "'>" . $noRep . "</option>";
                }
                ?>
            </select>

            <p class="error"><?php echo strip_tags($civErr) ?></p>
            <div class="mb-3">
                <label class="form-label">Nom </label>
                <input type="text" class="form-control" name="nom" value="<?php
                echo (isset($_SESSION['tab']['nom'])) ? $_SESSION['tab']['nom'] : ""; ?>">
                <p class="error"><?php echo strip_tags($nameErr) ?></p>


            </div>
            <div class="mb-3">
                <label class="form-label">Prenom </label>
                <input type="text" class="form-control" name="prenom" value="<?php
                echo (isset($_SESSION['tab']['prenom'])) ? $_SESSION['tab']['prenom'] : ""; ?>">
                <p class="error"><?php echo strip_tags($nameErr) ?></p>


            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email" value="<?php
                echo (isset($_SESSION['tab']['email'])) ? $_SESSION['tab']['email'] : ""; ?>">
                <p class="error"><?php echo strip_tags($emailErr) ?></p>
            </div>


            <label class="mb-3">Raison de votre message :</label>

            <div class="mb-3 form-check">


                <?php
                $radA = "Une passion pour les formulaires";
                if ($_SESSION['tab']['radio'] === $radA) {
                    echo "<input checked class='form-check-input mt-0' type='radio' value='" . $_SESSION['tab']['radio'] . "'name='radio'><label class='form-check-label' for='exampleCheck1'>" . $radA . "</label>";
                } else {
                    echo "<input  class='form-check-input mt-0' type='radio' value='" . $radA . "' name='radio'><label class='form-check-label' for='exampleCheck1'>" . $radA . "</label>";
                }
                ?>
            </div>
            <div class="mb-3 form-check">
                <?php
                $radB = "J ai rien d autre à faire";
                if ($_SESSION['tab']['radio'] === $radB) {
                    echo "<input checked class='form-check-input mt-0' type='radio' value='" . $_SESSION['tab']['radio'] . "'name='radio'><label class='form-check-label' for='exampleCheck1'>" . $radB . "</label>";
                } else {
                    echo "<input class='form-check-input mt-0' type='radio' value='" . $radB . "' name='radio'><label class='form-check-label' for='exampleCheck1'>" . $radB . "</label>";
                }
                ?>
            </div>
            <div class="mb-3 form-check">
                <?php
                $radC = "J adore qu on recolte mes données <3";
                if ($_SESSION['tab']['radio'] === $radC) {
                    echo "<input checked class='form-check-input mt-0' type='radio' value='" . $_SESSION['tab']['radio'] . "'name='radio'><label class='form-check-label' for='exampleCheck1'>" . $radC . "</label>";
                } else {
                    echo "<input  class='form-check-input mt-0' type='radio' value='" . $radC . "' name='radio'><label class='form-check-label' for='exampleCheck1'>" . $radC . "</label>";
                }
                ?>
            </div>
            <p class="error"><?php echo strip_tags($radioErr) ?></p>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Votre message ici" id="floatingTextarea2"
                          style="height: 100px" name="area"><?= (isset($_SESSION['tab']['area']))? htmlspecialchars($_SESSION['tab']['area']):"";?></textarea>
                <label for="floatingTextarea2">Commentaires</label>
                <p class="error"><?php echo strip_tags($areaErr) ?></p>
            </div>

            <button type="submit" class="btn btn-primary m-3">Submit</button>
        </div>
    </form>
    <form class="up-file m-3" action="/storage/upload.php" method="post" enctype="multipart/form-data">
        Upload une image pour votre avatar.
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        <input class="m-3" type="file" name="upload_img" id="upload_img">
        <input class="m-3"type="submit" value="img_upload" name="img_submit">
    </form>
<?php require 'footer.php'; ?>