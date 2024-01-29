<?= $this->extend('layout/main') ?>
<?= $this->section('menu') ?>

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            
            <a href="<?= site_url('layout') ?>" class="logo"><img src="<?= base_url() ?>/assets/images/logo.jpg" height="150" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
       
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title"><h4>Hello <?= $u = (session()->get('username')); ?></h4></li>
                <?php if (session()->get('level') == 1  ) { ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-plus"></i> <span>
                                Data Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="<?= site_url('pengurus') ?>">Pengurus</a></li>
                            <li><a href="<?= site_url('user') ?>">User</a></li>
                            <li><a href="<?= site_url('agenda') ?>">Agenda</a></li>
                            <li><a href="<?= site_url('donatur') ?>">Donatur</a></li>
                        </ul>
                    </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open"></i> <span>Data Transaksi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= site_url('KasMasuk') ?>">Kas Masuk</a></li>
                                    <li><a href="<?= site_url('KasKeluar') ?>">Kas Keluar</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open-page-variant"></i> <span>Laporan</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= site_url('KasMasuk/laporankasmasuk') ?>">Laporan Kas Masuk</a></li>
                                    <li><a href="<?= site_url('KasMasuk/laporanperperiode') ?>">Laporan Kas Masuk Perperiode</a></li>
                                    <li><a href="<?= site_url('KasMasuk/laporanperperiodeperjeniskas') ?>">Laporan Kas Masuk Perperiode Perjenis</a></li>
                                    <li><a href="<?= site_url('KasKeluar/laporankaskeluar') ?>">Laporan Kas Keluar</a></li>
                                    <li><a href="<?= site_url('KasKeluar/laporanperperiode') ?>">Laporan Kas Keluar Perperiode</a></li>
                                    <li><a href="<?= site_url('KasKeluar/laporanperperiodeperjeniskas') ?>">Laporan Kas Keluar Perperiode Perjenis</a></li>
                                </ul>
                            </li>
                <?php } ?>

                <?php if (session()->get('level') == 2) { ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span>
                                Data Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="<?= site_url('agenda') ?>">Agenda</a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if (session()->get('level') == 3) { ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span>
                                Data Laporan</span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="advanced-highlight.html">Laporan Donatur</a></li>
                            <li><a href="advanced-rating.html">Laporan Kas</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->


<?= $this->endSection('') ?>