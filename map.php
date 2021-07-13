<?php
require_once 'template/header.php';
?>


<!-- Maps -->
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-lg-4">
            <a href="#" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">

                <span class="fs-5 fw-semibold"><i class="fa fa-home"></i> List Kos Kosan</span>
            </a>
            <div class="overflow-auto" style="height: 500px;">
                <div class="list-group list-group-flush border-bottom scrollarea">
                    <div id="list-data"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    Pemetaan Kos kosan Daerah Grogol, Sukoharjo
                </div>
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Maps -->

<!-- map lengend -->
<div class="container">
    <!-- table -->
    <h5 class="mt-5">Map Legend</h5>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Icon</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img src="icons/man.png"></td>
                <td>Kos Kosan Pria</td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="icons/woman.png"></td>
                <td>Kos Kosan Wanita</td>
            </tr>
            <tr>
                <td>3</td>
                <td><img src="icons/mix.png"></td>
                <td>Kos Kosan Campur</td>
            </tr>
        </tbody>
    </table>
</div>
<?php require_once 'template/footer.php' ?>
<script>
    function initMap() {
        // Map options
        var options = {
            // -7.599201146791256, 110.81451646256141
            center: {
                lat: -7.599201146791256,
                lng: 110.81451646256141
            }, // Grogol
            zoom: 14
        }
        // New map
        var map = new google.maps.Map(document.getElementById('map'), options);

        // get data
        fetch('http://localhost/SIG/json.php?data=get')
            // convert to json
            .then(response => response.json())
            .then(data => {
                // loop data
                data.forEach(data => {
                    // call function addMarker
                    addMarker(data);
                })
            });


        // add marker function
        function addMarker(data) {
            let coords = {
                lat: parseFloat(data.latitude),
                lng: parseFloat(data.longitude)
            };

            var marker = new google.maps.Marker({
                position: coords,
                icon: parseInt(data.kategori) == 1 ? "icons/man.png" : parseInt(data.kategori) == 2 ? "icons/woman.png" : "icons/mix.png",
                map: map,
            });

            function content() {
                return `
                    <img src="${data.url}" width="300px" height="150px" style="margin-bottom:5px">
                    <p style="background:#0d6efd;padding:5px;width:20%;bborder-radius:50px;color:#fff;" align="center"><b>${data.kategori == "1" ? 'Pria' : data.kategori == "2" ? 'Wanita' : 'campur' }</b></p>
                    <h5>${data.judul}</h5>
                    <h6 style="color:#0d6efd">Rp ${Intl.NumberFormat('ID', { maximumSignificantDigits: 3 }).format(parseInt(data.harga))} / Bulan</h6>
                    <p>${data.deskripsi}</p>
                    `
            }

            // add content
            var infoWindow = new google.maps.InfoWindow({
                content: content(),
                maxWidth: 340
            });

            //  when marker clicked
            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            })

            function list() {
                return `
                        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight showInfo" aria-current="true" data-lat=${data.latitude} data-lng=${data.longitude} data-judul="${data.judul}" data-kategori=${data.kategori} data.harga=${data.harga} data-url="${data.url}" data-deskripsi="${data.deskripsi}">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">${data.judul}</strong>
                                <small class="badge ${data.kategori == "1" ? "bg-primary" : data.kategori == "2" ? "bg-danger" : "bg-warning"}">${data.kategori == "1" ? "Pria" : data.kategori == "2" ? "Wanita" : "Campur"}</small>
                            </div>
                            <p class="fw-bold text-primary">Rp ${Intl.NumberFormat('ID', { maximumSignificantDigits: 3 }).format(parseInt(data.harga))} / Bulan</p>
                        </a>
                    `
            }

            // show data
            var show = document.querySelector("#list-data").innerHTML += list();

            // when list Clicked
            $(".showInfo").on("click", function() {
                let lat = $(this).data("lat");
                let lng = $(this).data("lng");
                let judul = $(this).data("judul");
                let url = $(this).data("url");
                let harga = $(this).data("harga");
                let deskripsi = $(this).data("deskripsi");
                let kategori = $(this).data("kategori");
                console.log(deskripsi);

                const pos = {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                }

                var openmarker = new google.maps.Marker({
                    position: pos,
                    icon: parseInt(kategori) == 1 ? "icons/man.png" : parseInt(kategori) == 2 ? "icons/woman.png" : "icons/mix.png",
                    map: map,
                });

                var listInfoWindow = new google.maps.InfoWindow({
                    content: Listcontent(),
                    maxWidth: 340
                });

                function Listcontent() {
                    return `
                        <img src="${url}" width="100%" height="150px" style="margin-bottom:5px">
                        <p style="background:#0d6efd;padding:5px;width:20%;bborder-radius:50px;color:#fff;" align="center"><b>${kategori == "1" ? 'Pria' : kategori == "2" ? 'Wanita' : 'campur' }</b></p>
                        <h5>${judul}</h5>
                        <h6 style="color:#0d6efd">Rp ${Intl.NumberFormat('ID', { maximumSignificantDigits: 3 }).format(parseInt(data.harga))} / Bulan</h6>
                        <p>${deskripsi}</p>
                    `
                }

                openmarker.addListener('click', function() {
                    listInfoWindow.open(map, openmarker);
                })

                listInfoWindow.open(map, openmarker);
            })
        }


    }
</script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG7FscIk67I9yY_fiyLc7-_1Aoyerf96E&callback=initMap">
</script>