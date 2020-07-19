<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <title>Daeng Tobs - Tentang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://intip.link/assets/css/styles.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
</head>
<body class="mx-auto" style='background-image: url("{{asset("images/about.png")}}");background-position: bottom;background-size: auto;background-repeat: no-repeat;background-color: #000000;'>
    <div class="container d-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center justify-content-xl-center align-items-xl-center" style="min-height: 90vh;">
        <div class="my-auto p-4" style="background-position: bottom;background-size: auto;background-repeat: no-repeat;">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="text-center">
                        <img alt="profile" style="max-width: 10rem!important;" class="rounded-circle img-fluid border mb-4 profile-img w-50" src="{{profile_picture_url($setting['about']->profile_picture)}}"/>
                    </div>
                    <h2 class="text-center text-white" style="font-family: Montserrat, sans-serif;">
                        <strong>
                            {{$setting['about']->name}}
                        </strong>
                        <br/>
                    </h2>
                    <div class="text-center" id="status">
                        <p class="mx-auto text-white" style="max-width: 80%;font-family: Montserrat, sans-serif;">
                            {{$setting['about']->description}}
                            <br/>
                        </p>
                    </div>
                    <div class="text-center mt-2">
                        <h4 style="font-size: 1em;color: #dba514;">
                            Contact Me
                        </h4>
                        <div class="mx-auto mb-3" style="width: 40px;height: 2.5px;background-color: #dba514;">
                        </div>
                        <div class="mt-3">
                            @foreach ($socials as $key => $social)
                                <a aria-label="social-link" class="m-3 mx-4" href="{{$social->link}}">
                                    <i class="fa fa-{{social_render($social->platform)}}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12 py-4">
                    <div class="text-center d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center h-100">
                        <div class="btn-group-vertical w-100" role="group">
                            @foreach (json_decode($setting['about']->external_url) as $url)
                                <a aria-label="Kunjungi Situs" class="btn border rounded border-info d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center my-3 btn-border algazelia-border" href="{{$url}}" role="button" style="height: 50px;color: #dba514;background-color: #000000;font-family: Montserrat, sans-serif;">
                                    <strong>
                                        {{filter_url($url)}}
                                    </strong>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center w-100">
        <p class="p-0 m-0 text-white">
            <a aria-label="intipLink" class="text-white" href="https://intip.link">
                <strong>
                    Daeng Tobs Digital Studio
                </strong>
            </a>
        </p>
        <div class="mx-auto mt-3 mb-2" style="width: 40px;height: 2.5px;background-color: #dba514;">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>
