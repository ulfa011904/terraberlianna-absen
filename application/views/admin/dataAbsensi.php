<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
  <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataAbsensi/tambahData/') ?>"><i class="fas fa-plus"></i>Input Kehadiran</a>

    <table class="table table-striped table-bordered">
            <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Pegawai</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Action</th>
            </tr>
            <?php $no=1; foreach($absensi as $a) : ?>
                <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $a->nik ?></td>
                        <td><?php echo $a->nama_pegawai ?></td>
                        <td><?php echo $a->jenis_kelamin ?></td>
                        <td><?php echo $a->nama_jabatan ?></td>
                        <td><?php echo $a->tanggal ?></td>
                        <td><?php echo $a->keterangan ?></td>

                        <td>
                                <center>

                                        <a onclick="return confirm('Yakin Hapus')"class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataAbsensi/deleteData/'.$a->id_absensi)?>"><i class="fas fa-trash"></i></a>
                                </center>
                        </td>
                </tr>
            <?php endforeach; ?>
    </table>



</div>