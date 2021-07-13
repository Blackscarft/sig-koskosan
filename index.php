<?php
require_once 'models/DataModel.php';
require_once 'template/header.php';
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Selamat Datang di
        </div>
        <div class="card-body">
            <h4>Sistem Informasi Geografis Pemetaan Kos kosan di Grogol</h4>
            <div class="badge bg-dark text-wrap">
                Dibuat oleh Agus Nugroho
            </div>
        </div>
    </div>
    <div class="row mt-3">

        <div class="col-6 col-lg-3 mb-4">
            <div class="d-flex justify-content-center align-items-center flex-column rounded shadow">
                <i class="fa fa-home p-3" style="font-size:3rem;color:#0d6efd;"></i>
                <h3 id="kos">0</h3>
                <p class="text-muted">Kos Kosan</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 mb-4">
            <div class="d-flex justify-content-center align-items-center flex-column rounded shadow">
                <i class="fa fa-male p-3" style="font-size:3rem;color:#0d6efd;"></i>
                <h3 id="kosPria">0</h3>
                <p class="text-muted">Kos Pria</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 mb-4">
            <div class="d-flex justify-content-center align-items-center flex-column rounded shadow">
                <i class="fa fa-female p-3" style="font-size:3rem;color:#0d6efd;"></i>
                <h3 id="kosWanita">0</h3>
                <p class="text-muted">Kos Wanita</p>
            </div>
        </div>
        <div class="col-6 col-lg-3 mb-4">
            <div class="d-flex justify-content-center align-items-center flex-column rounded shadow">
                <i class="fa fa-restroom p-3" style="font-size:3rem;color:#0d6efd;"></i>
                <h3 id="kosCampur">0</h3>
                <p class="text-muted">Kos Campur</p>
            </div>
        </div>
    </div>

</div>

<script>
    // get data
    fetch('http://localhost/SIG/json.php?data=get')
        // convert to json
        .then(response => response.json())
        .then(data => {
            document.querySelector("#kos").innerHTML = data.length
            data.filter(data => data.kategori == "1")
                .map((item, index, array) => {
                    document.querySelector("#kosPria").innerHTML = array.length
                })
            data.filter(data => data.kategori == "2")
                .map((item, index, array) => {
                    document.querySelector("#kosWanita").innerHTML = array.length
                })
            data.filter(data => data.kategori === "3")
                .map((item, index, array) => {
                    document.querySelector("#kosCampur").innerHTML = array.length
                })
        });
</script>
<?php require_once 'template/footer.php' ?>