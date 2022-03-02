<!--INDEX.PHP - PROJET3W - Isabelle Jacob - 02/2022---->
<?php

session_start();

require "config/Database.php";
require "controllers/AdminController.php";
require "controllers/ArticleController.php";
require "controllers/ContactController.php";
require "controllers/GalleryController.php";

$adminController = new AdminController();
$articleController = new ArticleController();
$contactController = new ContactController();
$galleryController = new GalleryController();

if(array_key_exists("action",$_GET))
{
    switch($_GET['action'])
    {
        // case "createAdmin" : 
        //   $adminController -> createAdmin();
        //   break;
        case "admin":
            $adminController -> connectAdmin();
            break;
        case "isAdmin":
            $adminController -> isAdmin();
            break;
        case "index":
            $adminController -> index();
            break;
        case "deconnexion" :
            $adminController -> deconnexion();
            break;
        case "home" :
            $galleryController -> home();
            break;
        case "about" :
            $galleryController -> about();
            break;
        case "contact" :
            $contactController -> contact();
            break;
        case "pictures" :
            $galleryController -> pictures();
            break;
        case "videos" :
            $galleryController -> videos();
            break;
        case "drawing" :
            $galleryController -> drawing();
            break;
        case "homeAdmin" :
            $galleryController -> articles();
            break;
        case "adminTabel" :
            $adminController -> adminTabel();
            break;
        case "addArticle" :
            $articleController -> addArticle();
            break;
        case "modifyArticle" :
            $articleController -> modifyArticle();
            break;
        case "deleteArticle" :
            $articleController -> deleteArticle();
            break;
    }
}
else 
{
    $galleryController -> home();
}
?>


