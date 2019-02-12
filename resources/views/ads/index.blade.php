<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                      Dropdown
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div style="background: #dd3d31; height:20rem;" class="mb-5">
        Parking Rental
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="item-preview mb-5">
                    <a class="item-preview-img box-shadow-lg d-block mb-3" href="https://placeholder.com">
                        <img class="img-fluid" src="https://via.placeholder.com/600x400.png?text=Visit+WhoIsHostingThis.com" alt="parking slot">
                    </a>
                    <div class="item-preview-title">Creative</div>
                    <div class="item-preview-description">A one page creative theme</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-preview mb-5">
                    <a class="item-preview-img box-shadow-lg d-block mb-3" href="https://placeholder.com">
                        <img class="img-fluid" src="https://via.placeholder.com/600x400.png?text=Visit+WhoIsHostingThis.com" alt="parking slot">
                    </a>
                    <div class="item-preview-title">Creative</div>
                    <div class="item-preview-description">A one page creative theme</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item-preview mb-5">
                    <a class="item-preview-img box-shadow-lg d-block mb-3" href="https://placeholder.com">
                        <img class="img-fluid" src="https://via.placeholder.com/600x400.png?text=Visit+WhoIsHostingThis.com" alt="parking slot">
                    </a>
                    <div class="item-preview-title">Creative</div>
                    <div class="item-preview-description">A one page creative theme</div>
                </div>
            </div>
        </div>
    </div>

    {{ $ads->first()->address }}
    <footer>
        <div class="footer-social my-5">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <a class="footer-social-link d-inline-flex mx-3 justify-content-center align-items-center text-white rounded-circle shadow btn btn-twitter"
                        href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="footer-social-link d-inline-flex mx-3 justify-content-center align-items-center text-white rounded-circle shadow btn btn-facebook"
                        href="#">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                </div>
            </div>
        </div>
        <div class="footer-main bg-dark py-5 small">
            <div class="container">
                <a href="#">Driveway Rental</a> is a project created and maintained by
                <a href="#">Us</a>.
            </div>
        </div>
    </footer>
</body>
</html>