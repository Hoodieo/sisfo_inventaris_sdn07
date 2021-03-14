<?php session_start(); require_once'../includes/functions.php';?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SDN 07 Sejagan | Sistem Informasi Inventaris</title>
        <!-- Custom CSS -->
        <link href="../assets/css/style.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.css">
    </head>
    <body>
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
            data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

            <?php require_once '../includes/html-sidebar.php'; ?>

            <?php 
                if(isset($_GET['m'])){
                    $page = $_GET['m'].".php";

                    if (file_exists($page)) {
                        include $page;
                    }else{
                        include "../404.php";
                    }
                }else{
                    include "beranda.php";
                }
            ?>


            <footer class="footer text-center">
                Perancangan Sistem Informasi Inventaris Sarana dan Prasarana pada SDN 07 Sejagan Berbasis Web
            </footer>

            </div>
        </div>
        
        <?php require_once '../includes/html-body-end.html'; ?>
    </body>
</html>