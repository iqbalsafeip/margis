@extends('admin.layouts.main')

@section('content')
<div class="row mt-4">

    <div class="col-8">
        <div class="card">
            <div class="card-header">
                @lang('Market Map')
            </div>



            <div class="card-body">

                <div id="map" style="width: 100%; height: 600px;"></div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">

                @lang('Market Map')
            </div>



            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($market->gambar as $i => $g)
                        <div class="carousel-item {{ $i === 0 ? 'active' : null }}">
                            <!-- <img src="http://sigmarket.itg.ac.id/public/gambar/{{ $g->doc }}" class="d-block w-100" alt="..."> -->
                        </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <span style="font-size: 16px; font-weight: bold;">Nama Perusahaan : </span> <br>
                <span>{{ $market->nama_perusahaan }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Kecamatan : </span> <br>
                <span>{{ $market->kecamatan->name }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Tipe Market : </span> <br>
                <span>{{ $market->tipe_market }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Alamat : </span> <br>
                <span>{{ $market->alamat }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Koordinat : </span> <br>
                <span>{{ $market->longitude }}, {{ $market->latitude }}</span><br>
            </div>
        </div>
    </div>
   
</div>
@endsection
@section('skrip')
<script>
    var map;
    let market = {!!json_encode([$market]) !!};
    console.log(market);
    let dataShow = null;
    // var myOffcanvas = document.getElementById('dataShow')
    // var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)

    // const listGambar = document.getElementById('list-gambar');
    // const bodyData = document.getElementById('bodyData');


    window.onload = () => {
        app()
    }

    function app(position) {
        map = L.map('map', {
            // center: [-7.2162311, 107.8992377],
            zoom: 18
        });
        L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        let coords = market.map(e => [parseFloat(e.latitude), parseFloat(e.longitude)]);
        var bounds = L.latLngBounds();
        market.map(e => {
            let longitude = e.longitude;
            let latitude = e.latitude
            if (!((longitude).toString().indexOf("-") > -1)) {
                longitude = "-" + longitude;
            }

            bounds.extend([parseFloat(longitude), parseFloat(latitude)])
            let iconOptions;

            switch (e.tipe_market) {
                case "Alfamart":
                    iconOptions = {
                        iconUrl: '{{URL::to("/")}}/img/alfamart.png',
                        iconSize: [80, 80]
                    };
                    break;
                case "Indomaret":
                    iconOptions = {
                        iconUrl: '{{URL::to("/")}}/img/indomaret.png',
                        iconSize: [80, 80]
                    };
                    break;
                case "Yomart":
                    iconOptions = {
                        iconUrl: '{{URL::to("/")}}/img/yomart.png',
                        iconSize: [80, 80]
                    };
                    break;
                case "Alfamidi":
                    iconOptions = {
                        iconUrl: '{{URL::to("/")}}/img/alfamidi.png',
                        iconSize: [80, 80]
                    };
                    break;
                case "Lainnya":
                    iconOptions = {
                        iconUrl: '{{URL::to("/")}}/img/lainnya.png',
                        iconSize: [80, 80]
                    };
                    break;
                case "Indomart":
                    iconOptions = {
                        iconUrl: '{{URL::to("/")}}/img/indomaret.png',
                        iconSize: [80, 80]
                    };
                    break;
            }

            // Creating a custom icon
            var customIcon = L.icon(iconOptions);
            L.marker([longitude, latitude], {
                icon: customIcon
            }).addTo(map).on('click', function() {
                //     console.log(e);
                //     listGambar.innerHTML = ''
                //     let gambar = e.gambar;

                //     if (gambar.length > 0) {
                //         gambar.map((gmbr, i) => {
                //             listGambar.innerHTML += `
                //         <div class="carousel-item ${i === 0 ? 'active' : null}">
                //             <img src="http://sigmarket.itg.ac.id/public/gambar/${gmbr.doc}" class="d-block w-100" alt="...">
                //         </div>
                //         `
                //         })
                //     }
                //     bodyData.innerHTML = `
                // <span style="font-size: 16px; font-weight: bold;">Nama Perusahaan : </span> <br>
                // <span>${e.nama_perusahaan}</span><br>
                // <span style="font-size: 16px; font-weight: bold;">Kecamatan : </span> <br>
                // <span>${e.kecamatan.name}</span><br>
                // <span style="font-size: 16px; font-weight: bold;">Tipe Market : </span> <br>
                // <span>${e.tipe_market}</span><br>
                // <span style="font-size: 16px; font-weight: bold;">Alamat : </span> <br>
                // <span>${e.alamat}</span><br>
                // `;
                //     bsOffcanvas.toggle();

            });
        });
        console.log(bounds);
        map.fitBounds(bounds, {
            padding: [0, 0]
        });


    }
</script>
@endsection

