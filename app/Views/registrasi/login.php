<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SISTEM INFORMASI MESJID</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/puskesmas.png">
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 m-b-15">
                    <h5> <center>SILAHKAN LOGIN</center><br>
                        <center><img src="<?= base_url() ?>/assets/images/logo.jpg" height="170"
                                alt="logo"></center>
                    </h5>
                </h3>
                <?php
                if (session()->getFlashdata('msg')): ?>
                    <div class="alert aler-danger">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php
                endif;
                ?>
                <div class="p-3">
                    <form class="form-horizontal m-t-20" action="/login/ceklogin" method="post">
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" required="" name="username"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" required="" name="password"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                        <div class="form-group text-center row-m-t-20">
                            <div class="col-12">
                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>