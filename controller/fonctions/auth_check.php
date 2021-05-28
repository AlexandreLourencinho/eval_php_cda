<?php
if(!isset($_SESSION['user_id'])){
    header("location: ".$_SERVER['DOCUMENT_ROOT']."/view/connexion.php");
} ?>