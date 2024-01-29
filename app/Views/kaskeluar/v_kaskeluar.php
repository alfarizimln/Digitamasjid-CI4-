<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">
        <div class="row">
            <div class="col-12">
                 <div class="card m-b-30">
                    <div class="card-header">
                    <ul class="list-inline float-left mb-0">
                            <h4 class="mt-e header-title">DATA KAS KELUAR ANAK YATIM</h4>
                        </ul>
                        <ul class="list-inline float-right mb-0">
                            <!-- Jam -->
                            <h6>
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                ?>

                                <script type="text/javascript">
                                    function date_time(id) {
                                        date = new Date;
                                        year = date.getFullYear();
                                        month = date.getMonth();
                                        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                        d = date.getDate();
                                        day = date.getDay();
                                        days = new Array('Minggu', 'Senen', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
                                        h = date.getHours();
                                        if (h < 10) {
                                            h = "0" + h;
                                        }
                                        m = date.getMinutes();
                                        if (m < 10) {
                                            m = "0" + m;
                                        }
                                        s = date.getSeconds();
                                        if (s < 10) {
                                            s = "0" + s;
                                        }
                                        result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
                                        document.getElementById(id).innerHTML = result;
                                        setTimeout('date_time("' + id + '");', '1000');
                                        return true;
                                    }
                                </script>

                                <span id="date_time"></span>
                                <script type="text/javascript">
                                    window.onload = date_time('date_time');
                                </script>
                                <!-- Batas jam -->
                            </h6>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModal"
                                data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped " id="datapengurus">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Kas Keluar</th>
                                                <th>Jenis Kas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0;?>
                                            <?php $no = 0;
                                            foreach ($kaskeluar as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['tanggal'] ?></td>
                                                <td><?= $val['ket'] ?></td>
                                                <td><?= $val['kas_keluar'] ?></td>
                                                <td><?= $val['jenis_kas'] ?></td>
                                                <td>
                                                <button type="button"
                                                        class="btn btn-info btn-sm btn-edit" data-id_kas ="<?= $val['id_kas_mesjid']; ?>" 
                                                        data-tanggal="<?= $val['tanggal']; ?>" data-ket="<?= $val['ket']; ?>" data-kas="<?= $val['kas_keluar']; ?>" data-jenis="<?= $val['jenis_kas']; ?>">
                                                        <i class=" fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_kas ="<?= $val['id_kas_mesjid']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                                    <input type="hidden" <?=$total+=$val['kas_keluar']; ?>></input>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tr>
                                        <th colspan="3"><b>Total Kas keluar</b></th>
                                        <th colspan="5"><b><?=$total?></b></th>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<form action="/KasKeluar/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kas Keluar</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <h5>Apakah Yakin Menghapus Data Ini? </h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Edit -->
<form action="/KasKeluar/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Kas Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label></label>
                        <input type="hidden" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tgl" name="tgl">
                    </div>
                    <div class="col-md-12">
                        <label><b>Keterangan</b></label>
                        <input type="text" class="form-control ket" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label><b>Jumlah</b></label>
                        <input type="text" class="form-control kkeluar" name="jumlah">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Tambah -->
<form action="/KasKeluar/save" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar Anak Yatim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    Sisa Kas: <?=$anakyatim [0]->totalsemua ?? 0;?>
                    
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tgl" name="tgl">
                    </div>
                    <div class="col-md-12">
                        <label><b>Keterangan</b></label>
                        <input type="text" class="form-control" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label><b>Jumlah</b></label>
                        <input type="text" class="form-control" name="jumlah">
                    </div>
                    <div class="row">
                            <div class="col-md-2 mr-3">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur"
                                        class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" readonly id="nama" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Form donatur -->
    <div class="modal fade" id="modal_donatur">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Agenda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_agenda as $d):
                                $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?= $d->idagenda ?>
                                    </td>
                                    <td>
                                        <?= $d->namakegiatan ?>
                                    </td>
                                    <td>
                                        <?= $d->tanggal ?>
                                    </td>
                                    <td>
                                        <?= $d->jam ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_agenda('<?= $d->idagenda ?>','<?= $d->namakegiatan ?>')">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('id_kas');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});
//script datatable
$(document).ready(function() {
    $('#datapengurus').DataTable();
});
$('.btn-edit').on('click', function() {
    const id = $(this).data('id_kas');
        const tanggal = $(this).data('tanggal');
        const keterangan = $(this).data('ket');
        const kaskeluar = $(this).data('kasmasuk');
        const jenis = $(this).data('jenis');

    
        $('.id').val(id);
        $('.tgl').val(tanggal);
        $('.ket').val(keterangan);
        $('.kkeluar').val(kaskeluar);
        $('.jkas').val(jenis);
        $('.tgl').val(tanggal).trigger('change');
        $('#updateModal').modal('show');
});
function pilih_agenda(id, nama) {

$('#iddonatur').val(id);
$('#nama').val(nama);
$('#modal_donatur').modal().hide();
}
</script>
<?= $this->endSection('') ?>