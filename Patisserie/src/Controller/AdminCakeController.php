<?php

function index() {
    include __DIR__."/../Model/Cake.php";
    $cakes = Cake::all();

    //include __DIR__."../../View/navbar.html.php";
    include __DIR__."/../../View/admin_cake/index.html.php";
}

function add() {
    $name = $_POST['cake-name'];
    $description = $_POST['cake-description'];
    $price = $_POST['cake-price'];

    include __DIR__."/../Model/Cake.php";

    $myCake = new Cake();

    $myCake->name = $name;
    $myCake->description = $description;
    $myCake->price = $price;

    $myCake->save();

    header("Location: /admin/cake");
}

?>