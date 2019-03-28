<?php
session_start();

include 'Connection.php';
include 'controller/ShopController.php';
//when a user logout
if(isset($_POST['logout'])){
	session_destroy();
	header('Location: index.php');
}

$shop=new ShopController();
//when a user prefer a shop
if(isset($_POST['shop'])){
    $shop->createPreferredShop($_SESSION['id'],$_POST['shop']);
    header('Location: index.php');
}

//when a user dislike a shop
if(isset($_POST['disshop'])){
    $shop->createDislikedShop($_SESSION['id'],$_POST['disshop']);
    header('Location: index.php');
}
//when a user remove a shop from the preferred list
if(isset($_POST['delshop'])){
    $shop->removeShop($_SESSION['id'],$_POST['delshop']);
    header('Location: index.php');
}