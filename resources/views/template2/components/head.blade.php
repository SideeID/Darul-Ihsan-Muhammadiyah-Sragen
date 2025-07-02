<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Darun Najah</title>
    {!! setMetaTag($pageData ?? null) !!}

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template2/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('template2/css/style2.css') }}" />
    <link href="{{ asset('template2/css/berita.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template2/css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('template2/css/galeri.css') }}" />
    <link rel="stylesheet" href="{{ asset('template2/css/kabar.css') }}" />
    <link rel="stylesheet" href="{{ asset('template2/css/detail.css') }}" />
    <link rel="stylesheet" href="{{ asset('template2/css/program.css') }}" />

    <style>
        section {
            padding: 100px 0px;
        }
    </style>

    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js" integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        async function req(opt = null) {
            const setHost = opt.host ?? "{{ url('/') }}";
            const setUrl = setHost + (opt.path ?? '');
            // if (globalStore.token) {
            //     headers = {
            //         "Authorization": "Bearer " + user.token,
            //         ...headers
            //     };
            // }
            if (opt.method === 'post') {
                return await axios.post(setUrl, (opt.data ?? null), {
                    headers: opt.headers ?? null
                })
                .then(response => {
                    return response.data;
                });
            } else {
                return await axios.get(setUrl, {
                    params: opt.data ?? null,
                })
                .then(response => {
                    return response.data;
                });
            }
        }
    </script>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox]', {
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: [
                        "zoomIn",
                        "zoomOut",
                        "toggle1to1",
                        // "rotateCCW",
                        // "rotateCW",
                        // "flipX",
                        // "flipY",
                    ],
                    right: ["thumbs", "close"],
                },
            },
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @yield('style1')
    @yield('style2')
</body>

</html>
