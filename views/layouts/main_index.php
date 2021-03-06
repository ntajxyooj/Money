<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?php
        $bg = app\models\Bg::find()->where(['id' => 1])->one();
        $bg_menu = $bg->bg_menu;
        $bg_footer = $bg->bg_footer;
        Yii::$app->session['bg_buttoon'] = $bg->bg_button;

        ?>
        <style>

            .main-footer a:focus {
                color: <?= $bg->bg_button_over ?> !important;
            }
            .btn:focus {
                background-color: <?= $bg->bg_button_over ?> !important;
            }
        </style>
    </head>
    <body class="hold-transition <?= $bg_menu ?> sidebar-mini">
        <div id = "loader" style="display: none;">
            <span id="text-medel"><img   src = "http://dev.cyberia.la/testda/money/web/images/loading.gif" style="width:50px"></span>
        </div>
        <?php $this->beginBody() ?>
        <div class="wrapper">

            <header class="main-header navbar-fixed-top" >
                <!-- Logo -->
                <a class="logo" href="index.php?r=site/home" onclick="onclick_loadimg()">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">​<b>ລະ​ບົບ​ເກັບ​ກຳ​ເງີນ</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <?php
                    if (!empty(Yii::$app->session['user'])) {

                        ?>
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <?php
                    }

                    ?>
                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">
                            <?php
                            if (!empty(Yii::$app->session['user'])) {

                                ?>
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?= Yii::$app->urlManager->baseUrl ?>/images/thume/<?= Yii::$app->session['user']->photo ?>" class="user-image" alt="User Image">
                                        <span class="hidden-xs"><?= Yii::$app->session['user']->first_name ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="<?= Yii::$app->urlManager->baseUrl ?>/images/thume/<?= Yii::$app->session['user']->photo ?>" class="img-circle" alt="User Image">

                                            <p>
                                                <?= Yii::$app->session['user']->first_name ?>
                                                <small><?= Yii::$app->session['user']->last_name ?></small>
                                            </p>
                                        </li>

                                        <!-- Menu Footer-->
                                        <li class="user-footer bg-blue">
                                            <div class="pull-left">
                                                <a onclick="onclick_loadimg()"  href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=user/update&prof=true&id=<?= Yii::$app->session['user']->id ?>" class="btn bg-green btn-sm"><span class="fa fa-cogs"></span></a>
                                            </div>
                                            <div class="pull-right">
                                                <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=site/logout" class="btn bg-red btn-sm"><span class="fa fa-power-off"></span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Control Sidebar Toggle Button -->
                                <?php
                            }

                            ?>
                        </ul>

                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            if (!empty(Yii::$app->session['user'])) {

                ?>
                <aside class="main-sidebar sidebar-fixed-top">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="<?= Yii::$app->urlManager->baseUrl ?>/images/thume/<?= Yii::$app->session['user']->photo ?>" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info" >
                                <p><?= Yii::$app->session['user']->first_name ?></p>
                                <a href="#"><i class="fa fa-circle text-success"></i>ກຳ​ລັງ​ໃຊ້​ງານ</a>
                            </div>
                        </div>
                        <!-- sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu">
                            <li class="header">ເມ​ນູ​ຫຼັກ</li>
                            <?php
                            if (Yii::$app->session['user']->user_type == "User") {

                                ?>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=payment">
                                        <i class="fa fa-th"></i> <span>ຈັດ​ການເງີນ​ທີ່​ຈ່າຍ​ອອກ</span>
                                    </a>
                                </li>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=dao-car">
                                        <i class="fa fa-th"></i> <span>ຈັດ​ການເງີນ​ທີ່​ຈ່າຍ​ຄ່າ​ລົດ​ໃຫຍ່</span>
                                    </a>
                                </li>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=recieve-money">
                                        <i class="fa fa-th"></i> <span>ຈັດ​ການເງີນ​ທີ່​ຮັບ​ເຂົ້າ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-signal"></i> <span>ລາຍ​ງານ​</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=payment/report">
                                                <i class="fa fa-sellsy"></i>ລາຍ​ງານ​ລາຍ​ຈ່າຍ</a>
                                        </li>
                                        <li>
                                            <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=recieve-money/report">
                                                <i class="fa fa-ra"></i>ລາຍ​ງານ​ລາຍ​ຮັບ</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            }

                            ?>

                            <?php
                            if (Yii::$app->session['user']->user_type == "Admin") {

                                ?>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=payment/report">
                                        <i class="fa fa-sellsy"></i>ລາຍ​ງານ​ລາຍ​ຈ່າຍ</a>
                                </li>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=recieve-money/report">
                                        <i class="fa fa-ra"></i>ລາຍ​ງານ​ລາຍ​ຮັບ</a>
                                </li>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=site/compare">
                                        <i class="fa fa-th"></i> <span>ສົ​ມ​ທຽບ​ລາຍ​ຮັບ​ລ່າຍ​ຈ່າຍ</span>
                                    </a>
                                </li>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=user">
                                        <i class="fa fa-user"></i> <span>ຈັດ​ການຜູ້​ເຂົ້າ​ລະ​ບົບ</span>
                                    </a>
                                </li>
                                <li>
                                    <a onclick="onclick_loadimg()" href="<?= Yii::$app->urlManager->baseUrl ?>/index.php?r=bg/update&id=1">
                                        <i class="fa fa-user"></i> <span>ຕັ້​ງ​ຄ່າ​ສີ app</span>
                                    </a>
                                </li>
                                <?php
                            }

                            ?>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <?php
            }

            ?>
            <!-- Content Wrapper. Contains page content -->
            <!--<div id="load"></div>--> <!-- Img Loading after refresh page -->
            <div class="content-wrapper" style="background: #fff;">

                <section class="content" id="content">

                    <?= $content ?>
                </section>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer  <?= $bg_footer ?> " style=" color: #fff" >
                <div class="pull-right">
                    <a onclick="onclick_loadimg()" href="index.php?r=site/sms" style="color: #fff">
                        <?php
                        $cookie = Yii::$app->request->cookies;
                        $cookieValue = $cookie->getValue('check_sms');

                        $sms = app\models\Sms::find()->where('date>="' . date('Y-m-d H:i:s', strtotime('-10 days')) . '" and date<="' . date('Y-m-d H:i:s', strtotime('1 days')) . '"')->orderBy('id DESC')->all();
                        $i = 0;
                        foreach ($sms as $sms) {
                            if (!in_array($cookieValue, explode(',', $sms->user_id))) {
                                $i++;
                            }
                        }
                        if ($i > 0) {

                            ?>
                            <span class="ft label label-danger"><?= $i ?> </span>
                            <?php
                        }

                        ?>
                        <i class="fa fa-envelope-o fa-2x"></i>
                    </a>
                </div>
                <a onclick="onclick_loadimg()" href="index.php?r=site/home" style="color: #fff"> <li class="fa fa-home fa-2x"></li></a>

            </footer>
        </div>
        <?php $this->endBody() ?>
        <script>
            jQuery(function ($) {
                $('#money').autoNumeric('init', {aSign: ' ກີບ', pSign: 's'});
            });
<?php
$type_ps = \app\models\TypePay::find()->orderBy('sort ASC')->all();
$w = 0;
foreach ($type_ps as $type_pss) {
    $w++;

    ?>
                $(function () {
                    $('[data-toggle="popover<?= $w ?>"]').popover()
                })
                $(function () {
                    $('[data-toggle="popover_m<?= $w ?>"]').popover()
                })
                $(function () {
                    $('[data-toggle="popover_y<?= $w ?>"]').popover()
                })
    <?php
}

?>
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="adminlte/dist/js/pages/dashboard.js"></script>
        <script src="adminlte/dist/js/demo.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="http://www.w3schools.com/lib/w3data.js"></script>
    </body>
</html>
<?php $this->endPage() ?>
