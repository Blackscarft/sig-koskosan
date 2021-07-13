<?php

require_once 'models/DataModel.php';
require_once 'template/header.php';

?>

<!-- Delete -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (delete($id)) {
        $_SESSION['notif'] = "Data berhasil di hapus !";
        header('Location:data.php');
    }
}
?>



<div class="container mt-5">
    <!-- notif -->
    <?php if (isset($_SESSION["notif"])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION["notif"] ?>
            <button type="submit" name="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    endif;
    unset($_SESSION['notif']);
    ?>
    <!-- end notif -->

    <!-- button tambah -->
    <a href="input.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
    <table id="myTable" class="table table-borderless" style="width:100%">
        <thead class="mt-5">
            <tr>
                <th>Url Foto</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Latitude, longitude</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $data = get();
            while ($row = mysqli_fetch_assoc($data)) :
                if ($row['kategori'] == "1") {
                    $kategori = "Pria";
                } else if ($row['kategori'] == "2") {
                    $kategori = "Wanita";
                } else {
                    $kategori = "Campur";
                }
            ?>
                <tr>
                    <td><img src="<?= $row['url'] ?>" width="200px" height="100px"></td>
                    <td><?= $row['judul'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><?= $kategori ?></td>
                    <td><?= $row['latitude'] ?> , <?= $row['longitude'] ?></td>
                    <td>
                        <a href="input.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary mb-2"> <i class="fa fa-edit"></i> Edit</a>
                        <a href="data.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')"> <i class="fa fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once 'template/footer.php' ?>