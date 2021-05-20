<?php
echo "<pre>" . $_SERVER["DOCUMENT_ROOT"] . "\n". __FILE__ . "\n" . getcwd() . "\n</pre>";
$titre = "Index de l'évaluation php";
include $_SERVER["DOCUMENT_ROOT"]."/view/header_footer/header.php";
?>
<div class="d-flex flex-column">
    <div class="d-flex justify-content-center">
        <h1>PHP-CRUD</h1>
    </div>
    <div class="d-flex justify-content-center">
        <a href="https://ncode.amorce.org/ressources/Pool/CDA/WEB_PHP_frc/PHP_PDO_CRUD.html">Enoncé de l'exercice</a>
    </div>
    <div class="d-flex justify-content-center">
        <img src="/view/assets/images/image_crud.png" alt="image de présentation du crud-php à faire pour l'éval"
             title="image du crud a réaliser" class="p-1 m-1">
    </div>
</div>

<?php
include $_SERVER["DOCUMENT_ROOT"]."/view/header_footer/footer.php";
?>
