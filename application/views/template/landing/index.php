<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Newest online free text to all network in Philippines.">

    <title>EasyText - Online free text to all network</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= site_url('assets/landing/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?= site_url('assets/landing/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?= site_url('assets/landing/css/creative.min.css')?>" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="#page-top">EasyText</a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login')?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">The newest online free text to all network in philippines!</h1>
                <hr>
                <p style="font-weight: bolder;">EASYTEXT can help you to send a free text message to all network <br>specially in case of emergency.</p>
                <a style="border-radius:0" class="btn btn-primary btn-xl" href="#about">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <h2 class="section-heading text-white">Why EasyText?</h2>

                    <hr class="light">
                    <p class="text-faded" style="text-align:justify">EasyText is a free online text message to all network in Philippines. It can help you a lot specially in case of emergency. If you want to text someone, but suddenly your balance is zero or your subscription was expired, then EASYTEXT will help you. There's no text limit. You can compose what you want and send it to your registered contacts.</p>
                    <a style="border-radius:0" class="btn btn-default btn-xl sr-button" href="#faq">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Frequently Asked Questions</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="alert alert-info">
              <label>How to register?</label>
                <ul>
                  <li>You can go to <a href="<?= site_url('register')?>">register page</a> then create your account.</li>
                </ul>

              <label>How to login my account?</label>
                <ul>
                  <li>You can go to <a href="<?= site_url('login')?>">login page</a> then sign in your account.</li>
                </ul>

              <label>If ever I forgot my password, Can i retrieve my account?</label>
                <ul>
                  <li>Yes. You can go to  <a href="<?= site_url('recovery')?>">recovery page</a> then type your registered email and follow on-screen instructions.</li>
                </ul>

              <label>Do i need to activate my account first before signing in?</label>
                <ul>
                  <li>Yes.</li>
                </ul>
              <label>How can i send a message?</label>
              <ul> There are 3 steps in order to send your message:
                <ul>
                  <li>Step 1: Login your account</li>
                  <li>Step 2: Click Add Contact navigation then fill up all fields</li>
                  <li>Step 3: Choose one or more than to your contacts then click send button. </li>
                </ul>
              </ul>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JavaScript -->

    <script src="<?= site_url('assets/landing/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?= site_url('assets/landing/vendor/tether/tether.min.js')?>"></script>
    <script src="<?= site_url('assets/landing/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= site_url('assets/landing/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <script src="<?= site_url('assets/landing/vendor/scrollreveal/scrollreveal.min.js')?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= site_url('assets/landing/js/creative.min.js')?>"></script>
</body>

</html>
