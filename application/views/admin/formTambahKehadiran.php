<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        </div>

        <div class="card" style="width: 60%; margin-bottom: 100px">
                <div class="card-body">
                        <form method="POST" action="<?php echo base_url('admin/dataAbsensi/tambahDataAksi') ?>" enctype="multipart/form-data">

                                <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" name="nik" class="form-control">
                                        <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
                                </div>

                                <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" name="nama_pegawai" class="form-control"><?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                                </div>

                                <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control">
                                                <option value="">--pilih jenis kelamin--</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                        </select>
                                        <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                                </div>

                                <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" name="nama_jabatan" class="form-control"><?php echo form_error('nama_jabatan', '<div class="text-small text-danger"></div>') ?>
                                </div>


                                <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control"><?php echo form_error('tanggal', '<div class="text-small text-danger"></div>') ?>
                                </div>


                                <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control"><?php echo form_error('keterangan', '<div class="text-small text-danger"></div>') ?>
                                </div>


                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                </div>
        </div>
        

</div>