<?php
require_once 'models/DataModel.php';
require_once 'template/header.php';
?>

<?php

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $harga = $_POST['harga'];
    $url = $_POST['url'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
}

if (isset($_GET['id'])) {
    $title = "Edit";
    $id = $_GET['id'];
    $row = mysqli_fetch_array(getById($id));

    if (isset($_POST['simpan'])) {
        if (update($id, $judul, $harga, $url, $deskripsi, $kategori, $latitude, $longitude)) {
            $_SESSION['notif'] = "Data berhasil di edit !";
            header('Location:data.php');
        }
    }
} else {
    $title = "Tambah";
    if (isset($_POST['simpan'])) {
        if (insert($judul, $harga, $url, $deskripsi, $kategori, $latitude, $longitude)) {
            $_SESSION['notif'] = "Data berhasil di tambahkan !";
            header('Location:data.php');
        }
    }
}
?>

<!-- Maps -->
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <?= $title ?> Data
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3 row">
                    <label for="title" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="judul" required value="<?= @$row['judul'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga" placeholder="Masukan harga per bulan" name="harga" required value="<?= @$row['harga'] ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Url" class="col-sm-2 col-form-label">Url Gambar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Url" name="url" required value="<?= @$row['url'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Desc" class="col-sm-2 col-form-label">Deskripsi Fasilitas</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="deskripsi" id="Desc" rows="5" required><?= @$row['deskripsi'] ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kategri" class="col-sm-2 col-form-label">Kategri Kos</label>
                    <div class="col-sm-10">
                        <select name="kategori" id="kategri" class="form-control" required>
                            <option value="">-- Pilih kategori--</option>
                            <option <?= @$row['kategori'] == "1" ? "selected" : "" ?> value="1">Pria</option>
                            <option <?= @$row['kategori'] == "2" ? "selected" : "" ?> value="2">Wanita</option>
                            <option <?= @$row['kategori'] == "3" ? "selected" : "" ?> value="3">Campur</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="latitude" name="latitude" required step=any value="<?= @$row['latitude'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="longitude" name="longitude" required step=any value="<?= @$row['longitude'] ?>">
                    </div>
                </div>

                <a href="data.php" class="btn btn-light me-3"><i class="fa fa-times"></i> Batal</a>
                <button name="simpan" type="submit" href="#" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- End Maps -->

<?php require_once 'template/footer.php' ?>