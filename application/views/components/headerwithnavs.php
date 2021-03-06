<?php 
foreach($results as $row) {
$data = array('fullname' => $row->fullname);
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>EasyText - Online free text to all network</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/lib/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/lib/font-awesome/css/font-awesome.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/stylesheets/theme.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/stylesheets/main.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/amaran/dist/css/amaran.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/amaran/dist/css/animate.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/stylesheets/premium.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/select2/dist/css/select2.min.css')?>">

</head>

<body ng-app="app" ng-controller="MyCtrl" class="theme-blue">

    <!-- Demo page code -->

    <style type="text/css">
       
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.html"><span class="navbar-brand">EasyText</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo $data['fullname']?>
                </a>
            </li>
          </ul>

        </div>
      </div>
    </div>
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>