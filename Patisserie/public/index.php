<?php

include_once '../vendor/SimpleOrm.class.php';

// Connect to the database using mysqli
$conn = new mysqli('localhost', 'root', '');

if ($conn->connect_error)
  die(sprintf('Unable to connect to the database. %s', $conn->connect_error));

// Tell Simple ORM to use the connection you just created.
SimpleOrm::useConnection($conn, 'db_exemple');

$path = null;
if(isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
}

if($path === '/admin/cake') {
    include __DIR__."/../src/Controller/AdminCakeController.php";
    index();
} 
else if($path === '/admin/cake/add') {
    include __DIR__."/../src/Controller/AdminCakeController.php";
    add();
} 
else {
    die("Not Found " + $path);
}

?>