<?php
require_once "../Models/Connection.php";
require_once "../Models/statistikatModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['filtromemuaj'])) {
    $fillimimuajit = $_POST['fillimimuajit'];
    $mbarimimuajit = $_POST['mbarimimuajit'];
    $results = statistikatModels::krahasomemuaj();
    echo json_encode($results);
}
