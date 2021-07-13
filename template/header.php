<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIG - Project</title>
    <link rel="icon" href="https://cdn.iconscout.com/icon/free/png-256/map-and-location-2569358-2148268.png">
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
    </style>
</head>

<!-- Koneksi database -->
<?php session_start(); ?>
<?php require_once 'db/koneksi.php' ?>
<!-- get basename -->
<?php $uri = basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container d-flex">
            <a class="navbar-brand" href="index.php">
                <img src="https://cdn.iconscout.com/icon/free/png-256/map-and-location-2569358-2148268.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                GIS-KOS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link <?= $uri == 'index' ? 'active' : '' ?>" aria-current="page" href="index.php"> <i class="fa fa-home"></i> Home</a>
                    <a class="nav-link <?= $uri == 'map' ? 'active' : '' ?>" href="map.php"> <i class="fa fa-map"></i> Maps</a>
                    <a class="nav-link <?= (in_array($uri, array('data', 'input'))) ? 'active' : '' ?>" href="data.php"> <i class="fa fa-database"></i> Data</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->