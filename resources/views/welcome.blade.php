<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peta Digital Investasi | Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/styles.css" rel="stylesheet">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            border: none;
            background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            z-index: 99999;
        }
    </style>
    @stack('after-styles')
</head>

<body>

    @auth
        <div style="z-index: 999; position: absolute; width: 100vw; margin-top: 10px;">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="title">
                                <h5>Peta Digital Invesitasi (Toko Modern/ Minimarket Berjejaring)</h5>
                            </div>
                            <div class=" links">
                                @auth

                                    <a href="{{ route('dashboardAdmin') }}">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>

                                @endauth
                                <button class="btn btn-primary rounded-full" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="offcanvas offcanvas-start z-index-4" tabindex="-1" id="dataShow" aria-labelledby="dataShowLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="dataShowLabel">Detail Market</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="list-gambar">
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="mt-2" id="bodyData">

                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start z-index-3" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Settings Map</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form method="GET" action="">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Tipe Market</label>

                        <div class="col-md-10">
                            <select name="tipe_market" class="form-control">
                                <option value="">Pilih Tipe</option>
                                <option value="Alfamart">Alfamart</option>
                                <option value="Indomart">Indomart</option>
                                <option value="Yomart">Yomart</option>
                                <option value="Alfamidi">Alfamidi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kecamatan" class="col-md-2 col-form-label">Kecamatan</label>
                        <div class="col-md-10">
                            <select name="id_kecamatan" class="form-control">
                                <option value="">Pilih Kecamatan</option>
                                <?php foreach ($kecamatan as $kc) : ?>
                                <option value="{{ $kc->id }}" {{ $kc->id == $id_kecamatan ? 'selected' : null }}>
                                    {{ $kc->name }}
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit">Filter</button>
                </form>
                <hr>
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">Pilih Tiles</label>

                    <div class="col-md-10">
                        <select name="tiles" id="tiles" class="form-control">
                            <option value="">Pilih Tiles</option>
                            <option value="OpenStreet">OpenStreet</option>
                            <option value="WorldImagery">WorldImagery</option>

                        </select>
                    </div>
                </div>
                <div class="dropdown mt-3">
                    <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                                                                                                                                                            Tiles Type
                                                                                                                                                                                        </button>
                                                                                                                                                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                                                                                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                                                                                                                                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                                                                                                                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                                                                                                                                        </ul> -->
                </div>
            </div>
        </div>
        <button class="float" id="btn-route">
            <i class="fa fa-plus my-float"></i>
        </button>
        <div id="map" style="width: 100vw; height: 100vh; position: absolute; top: 0px; left: 0px;"></div>
    @else
        <div id="app" class="flex-center position-ref height-full">
            <div class="top-right links">
                @auth
                @else
                    <a href="{{ route('login') }}">@lang('Login')</a>


                @endauth
            </div>
            <!--top-right-->

            <div class="content">


                @auth
                @else
                    <div
                        style="width: 100vw; height: 100vh; display: flex; flex-direction:column; justify-content: center; align-items: center;">
                        <img width="200" height="200" class="mb-3" src="http://localhost:8000/logo.png"
                            alt="">
                        <h5>PEMERINTAH KABUPATEN GARUT</h5>
                        <h3>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</h3>
                        <br>
                        <h1>PETA POTENSI DAN PELUANG INVESTASI (Peta Digital Investasi)</h1>
                        <h4>Toko Modern/ Minimarket Berjejaring</h4>
                    </div>
                @endauth


            </div>
            <!--content-->
        </div>

        <!--app-->
    @endauth

    @stack('before-scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @stack('after-scripts')
    <script>
        var map;
        let market = {!! json_encode($market) !!};
        let dataShow = null;
        var myOffcanvas = document.getElementById('dataShow')
        var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
        let isEdit = false;
        let dataRoute = [];
        let route = null;
        const listGambar = document.getElementById('list-gambar');
        const bodyData = document.getElementById('bodyData');
        const btnRoute = document.getElementById('btn-route');


        btnRoute.addEventListener('click', function() {
            isEdit = !isEdit
            if (!isEdit) {
                dataRoute = [];
                if (route) {
                    route.setWaypoints([])
                    route.show = false
                }

            }
        })

        // let tiles = {
        //     {
        //         name : "OpenStreet",
        //         tiles :
        //     }
        // }

        const tiles = document.getElementById("tiles");
        tiles.addEventListener("change", function() {
            switch (this.value) {
                case "OpenStreet":
                    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                    }).addTo(map);
                    break;

                case "WorldImagery":
                    L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                    }).addTo(map);
                    break;
                default:
                    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                        maxZoom: 20,
                        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                    }).addTo(map);
                    break;
            }
            console.log(this.value)
        })
        window.onload = () => {
            app()
        }

        setTimeout(() => {

        }, 2000)

        function app(position) {
            map = L.map('map', {
                // center: [-7.2162311, 107.8992377],
                zoom: 18
            });
            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
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
                            iconUrl: '/img/alfamart.png',
                            iconSize: [80, 80]
                        };
                        break;
                    case "Indomaret":
                        iconOptions = {
                            iconUrl: '/img/indomaret.png',
                            iconSize: [80, 80]
                        };
                        break;
                    case "Yomart":
                        iconOptions = {
                            iconUrl: '/img/yomart.png',
                            iconSize: [80, 80]
                        };
                        break;
                    case "Alfamidi":
                        iconOptions = {
                            iconUrl: '/img/alfamidi.png',
                            iconSize: [80, 80]
                        };
                        break;
                    case "Lainnya":
                        iconOptions = {
                            iconUrl: '/img/lainnya.png',
                            iconSize: [80, 80]
                        };
                        break;
                    case "Indomart":
                        iconOptions = {
                            iconUrl: '/img/indomaret.png',
                            iconSize: [80, 80]
                        };
                        break;
                }

                // Creating a custom icon
                var customIcon = L.icon(iconOptions);
                L.marker([longitude, latitude], {
                    icon: customIcon
                }).addTo(map).on('click', function() {
                    console.log(e);
                    listGambar.innerHTML = ''
                    let gambar = e.gambar;

                    if (gambar.length > 0) {
                        gambar.map((gmbr, i) => {
                            listGambar.innerHTML += `
                            <div class="carousel-item ${i === 0 ? 'active' : null}">
                                <img src="http://sigmarket.itg.ac.id/public/gambar/${gmbr.doc}" class="d-block w-100" alt="...">
                            </div>
                            `
                        })
                    }
                    bodyData.innerHTML = `
                    <span style="font-size: 16px; font-weight: bold;">Nama Perusahaan : </span> <br>
                    <span>${e.nama_perusahaan}</span><br>
                    <span style="font-size: 16px; font-weight: bold;">Kecamatan : </span> <br>
                    <span>${e.kecamatan.name}</span><br>
                    <span style="font-size: 16px; font-weight: bold;">Tipe Market : </span> <br>
                    <span>${e.tipe_market}</span><br>
                    <span style="font-size: 16px; font-weight: bold;">Alamat : </span> <br>
                    <span>${e.alamat}</span><br>
                    <span style="font-size: 16px; font-weight: bold;">Koordinat : </span> <br>
                    <span>${longitude}, ${latitude}</span><br>
                    <a class="btn btn-success" target="_blank" href="https://maps.google.com/maps?q=${longitude},${latitude}&z=17&t=k">Lihat di Google Maps</a>
                    `;
                    if (!isEdit) {

                        bsOffcanvas.toggle();
                    } else {
                        let tempLt = L.latLng(longitude, latitude);
                        dataRoute.push(tempLt);
                        if (dataRoute.length > 1) {
                            if (!route) {
                                route = L.Routing.control({
                                    waypoints: dataRoute,
                                    draggableWaypoints: false
                                }).addTo(map);
                            } else {
                                route.setWaypoints(dataRoute)
                            }
                        }
                    }

                });
            });
            console.log(bounds);
            map.fitBounds(bounds, {
                padding: [0, 0]
            });

            // setTimeout(() => {
            //     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            //     }).addTo(map);
            // }, 2000)
        }
    </script>
</body>

</html>
