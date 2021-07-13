<?php

function result($query)
{
    global $link;
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    return $result;
}

function get()
{
    $query = "SELECT * FROM maps";
    return result($query);
}

function getById($id)
{
    $query = "SELECT * FROM maps WHERE id = $id";
    return result($query);
}

function insert($judul, $harga, $url, $deskripsi, $kategori, $latitude, $longitude)
{
    $query = "INSERT INTO maps (judul, harga, url, deskripsi, kategori, latitude, longitude) VALUES ('$judul', '$harga', '$url', '$deskripsi', '$kategori', $latitude, $longitude)";
    return result($query);
}

function update($id, $judul, $harga, $url, $deskripsi, $kategori, $latitude, $longitude)
{
    $query = "UPDATE maps SET judul='$judul', harga='$harga', url='$url', deskripsi='$deskripsi', kategori='$kategori', latitude=$latitude, longitude=$longitude WHERE id = $id";
    return result($query);
}

function delete($id)
{
    $query = "DELETE FROM maps WHERE id = $id";
    return result($query);
}
