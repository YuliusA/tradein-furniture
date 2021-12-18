<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon-32x32.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon-32x32.png" type="image/x-icon">

    <title>Trade-in Furniture | Fabelio.com</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500,700&display=swap" rel="stylesheet"> 
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="css/vendor/fontawesome.min.css" rel="stylesheet">

    <link href="css/fileinput.min.css" rel="stylesheet">
    <link href="css/spectrum.css" rel="stylesheet">
    <link href="css/new-styles.css" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <div id="tradeIn" class="page tradein-builder">

        <?php include('header.html'); ?>

        <div class="banner-image">
            <div class="container nopadding">
                <div class="row">
                    <div class="col-md-6 text-left d-flex flex-column justify-content-center">
                        <h1 class="display-heading">Tukar Furniture Lama Anda dengan produk baru dari Fabelio</h1>
                        <ul class="description">
                            <li>Diskon 10%</li>
                            <li>Gratis ongkos kirim untuk daerah Jabodetabek</li>
                            <li>Gratis 30 Hari Pengembalian</li>
                        </ul>
                    </div>
                    <div class="col-md-6 hidden-sm hidden-xs">
                        <img class="img-responsive img-icon" src="img/red-sofa-furniture-icon.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="tradein-wrapper">
                <div class="container nopadding">

                    <!-- Main Navigation -->
                    <div class="tradein-nav">
                        <div class="nav-wrapper tradein-main-nav">
                            <ul class="nav justify-content-center">
                                <li class="nav-item active">
                                    <a href="#categories"><span class="hidden-sm hidden-xs">Kategori</span></a>
                                </li>
                                <li class="nav-item">
                                    <div class="timeliner"><span class="filler"></span></div>
                                    <a href="#products"><span class="hidden-sm hidden-xs">Pilih Produk</span></a>
                                </li>
                                <li class="nav-item">
                                    <div class="timeliner"><span class="filler"></span></div>
                                    <a href="#singleproduct"><span class="hidden-sm hidden-xs">Detail Produk</span></a>
                                </li>
                                <li class="nav-item">
                                    <div class="timeliner"><span class="filler"></span></div>
                                    <a href="#userproduct"><span class="hidden-sm hidden-xs">Produk Lama Anda</span></a>
                                </li>
                                <!--<li class="d-flex flex-items-xs-center flex-items-xs-top">
                                    <div class="timeliner"><span class="filler"></span></div>
                                    <a href="#summary"><span class="hidden-sm hidden-xs">Summary</span></a>
                                </li>-->
                            </ul>
                        </div>
                    </div>

                    <!-- The Steps Content-->
                    <div class="tradein-steps tradein-steps-wrapper">
                        <ul>
                            <!-- Product Category -->
                            <li data-selection="categories" class="tradein-step first active required">
                                <div class="tradein-step-content">
                                    <h3 class="step-heading text-center">Kategori Produk</h3>
                                    <div class="category-select">
                                        <ul class="options-list options-cat row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
                                            <li class="category-list-item option col js-option js-radio" data-category="sofa">
                                                <div class="card border-0">
                                                    <img class="card-img-top img-cat rounded-2 border border-2" src="img/cat-sofa.png">
                                            
                                                    <div class="card-body position-relative">
                                                        <span class="radio-btn"></span>
                                                        <h5 class="card-title text-center">Sofa</h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-list-item option col js-option js-radio unavailable" data-category="penyimpanan">
                                                <div class="card border-0">
                                                    <img class="card-img-top img-cat rounded-2 border border-2" src="img/cat-penyimpanan.png">
                                                    <div class="card-body position-relative">
                                                        <span class="radio-btn"></span>
                                                        <h5 class="card-title text-center">Penyimpanan</h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-list-item option col js-option js-radio unavailable" data-category="meja-kursi">
                                                <div class="card border-0">
                                                    <img class="card-img-top img-cat rounded-2 border border-2" src="img/cat-meja-kursi.png">
                                                    <div class="card-body position-relative">
                                                        <span class="radio-btn"></span>
                                                        <h5 class="card-title text-center">Meja Kursi</h5>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="category-list-item option col js-option js-radio unavailable" data-category="tempat-tidur">
                                                <div class="card border-0">
                                                    <img class="card-img-top img-cat rounded-2 border border-2" src="img/cat-tempat-tidur.png">
                                                    <div class="card-body position-relative">
                                                        <span class="radio-btn"></span>
                                                        <h5 class="card-title text-center">Tempat Tidur</h5>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <!-- Product List / will be update with ajax -->
                            <li id="productList" data-selection="product" class="tradein-step required"></li>

                            <!-- Single Product / will be update with ajax -->
                            <li id="singleProduct" class="tradein-step"></li>

                            <!-- User Form -->
                            <li id="userForm" class="tradein-step">
                                <?php include('userform.html'); ?>
                            </li>

                            <!-- Summary
                            <li id="summary" class="tradein-step last">

                            </li> -->
                        </ul>

                        <div class="ajax-loader"><img src="img/img-loader.gif"></div>
                    </div>

                    <div class="tradein-footer step-1 disabled">
                        <div class="tradein-secondary-nav">
                            <ul>
                                <li class="prev nav-item">
                                    <button class="btn btn-outline-secondary fab-btn-greyprim"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/></svg> Kembali</button>
                                </li>
                                <li class="next nav-item">
                                    <button type="button" class="btn btn-danger btn-redprim">Lanjut<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/></svg></button>
                                </li>
                            </ul>
                            <span class="alert" role="alert">Silahkan pilih salah satu item!</span>
                        </div>
                    </div>
                </div>
            </div><!-- /.tradein-wrapper End -->

        </div><!-- /.main-container End -->

        <?php //include('footer.html'); ?>

    </div><!-- /.page End -->
</div><!-- /.wrapper End -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/existing-plugins-min.js"></script>
<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/spectrum.js"></script>
<script type="text/javascript" src="js/fa/theme.min.js"></script>
<script type="text/javascript" src="js/new-script.js"></script>
</body>
</html>