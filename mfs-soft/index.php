<?php
/*======================================
Thirrja e Kontrollerave (interaktivi me Klienta)
========================================*/
require_once "Controllers/TemplateController.php";
/*======================================
Thirrja e Modelave ( interaktivi me Databaze )
========================================*/
require_once "Models/Connection.php";
require_once "Models/regjistrimimallitModels.php";
require_once "Models/furnizimiModels.php";
require_once "Models/postaModels.php";
require_once "Models/borgjiModels.php";
require_once "Models/cashModels.php";
require_once "Models/shfrytzuesitModels.php";
require_once "Models/statistikatModels.php";
require_once "Models/arkaModels.php";
require_once "Models/ADMConnection.php";
require_once "Models/administrataModels.php";
//klient template
$Template = new TemplateController();
$Template->ViewTemplate();
?>