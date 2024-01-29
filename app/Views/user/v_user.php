<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
<link href="<?= base_url()?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url()?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<script src="<?= base_url()?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>


</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                    <ul class="list-inline float-left mb-0">
                            <h4 class="mt-e header-title">DATA USER</h4>
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
                                    <table class="table table-sm table-striped" id="datauser">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Id User</th>
                                                <th>Nama User</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            $model= new App\Models\ModelUser();
                                            $data=$model->getUser()->getResultArray();
                                            foreach ($user as $val) {
                                            
                                                if($val['level']=='1'){
                                                    $role='Admin';
                                                }else if($val['level']=='2'){
                                                    $role='Pengurus';
                                                }else if($val['level']=='3'){
                                                    $role='Pimpinan';
                                                }

                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['id_user'] ?></td>
                                                <td><?= $val['nama_user'] ?></td>
                                                <td><?= $val['email'] ?></td>
                                                <td><?= $role ?></td>
                                                <td>
                                                <button type="button"
                                                        class="btn btn-info btn-sm btn-edit" data-id_user ="<?= $val['id_user']; ?>" data-nama="<?= $val['nama_user']; ?>" 
                                                        data-email="<?= $val['email']; ?>" data-password="<?= $val['password']; ?>" data-level="<?= $val['level']; ?>">
                                                        <i class=" fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_user="<?= $val['id_user']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
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
<form action="/User/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <h5>Apakah Yakin Menghapus Data Ini?</h5>
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

<!-- Form Tambah -->
<form action="/User/save" method="post">
<?php if(!empty(session()->getFlashdata('error'))):?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4>Periksa Entrian Form</h4>
    </hr />
    <?php echo session()->getFlashdata('error');?>
        <button type="button" id="addmodal" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<?php endif; ?>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id">
                    </div>
                    <div class="col-md-12">
                        <label><b>Nama User</b></label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="col-md-12">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="col-md-12">
                        <label><b>Password</b></label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="col-md-12">
                        <label><b>Level</b></label>
                        <select class="form-control" name="le">
                            <option value="">Pilih Hak Akses</option>
                            <option value="1">Admin</option>
                            <option value="2">Donatur</option>
                            <option value="3">Bendahara</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Edit -->
<form action="/User/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label><b>Nama User</b></label>
                        <input type="text" class="form-control namauser" name="nama">
                    </div>
                    <div class="col-md-12">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control email" name="email">
                    </div>
                    <div class="col-md-12">
                        <label><b>Password</b></label>
                        <input type="password" class="form-control pass" name="pass" required="">
                    </div>
                    <div class="col-md-12">
                        <label><b>Level</b></label>
                        <select class="form-control level" name="le">
                            <option value="">Pilih Hak Akses</option>
                            <option value="1">Admin</option>
                            <option value="2">Donatur</option>
                            <option value="3">Bendahara</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    //script delete
    $('.btn-delete').on('click', function() {
        const id = $(this).data('id_user');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
    //script datatable
    $(document).ready(function() {
        $('#datauser').DataTable();
    });
    //script update
    $('.btn-edit').on('click', function() {
        const id = $(this).data('id_user');
        const namauser = $(this).data('nama');
        const email = $(this).data('email');
        const password = $(this).data('password');
        const level = $(this).data('level');

        $('.id').val(id);
        $('.namauser').val(namauser);
        $('.email').val(email);
        $('.level').val(level).trigger('change');
        $('#updateModal').modal('show');
    });
    </script>

<?= $this->endSection('') ?>