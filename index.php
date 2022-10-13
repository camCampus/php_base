

<?php
$requested_page = $_GET['page'] ?? 'home';

match($requested_page) {
   "home" => include(__DIR__."/accueil.php"),
    "contact" => include(__DIR__."/contact.php"),
      default => include(__DIR__."/404.php")
};
?>



