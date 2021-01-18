<?php $this->load->view("header.php") ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA CUTI</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td align="center">No</td>
                        <td>Nama</td>
                        <td>NIK</td>
                        <td>Jatah Cuti</td>
                        <td>Ambil Cuti</td>
                        <td>Sisa Cuti</td>
                        <td>Tahun</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data->result_array() as $i) :

                        $nama = $i['nama'];
                        $nik = $i['nik'];
                        $jatah_cuti = $i['jatah_cuti'];
                        $ambil_cuti = $i['ambil_cuti'];
                        $sisa_cuti = $i['sisa_cuti'];
                        $tahun = $i['tahun'];

                    ?>
                        <tr>
                            <td align="center"><?php echo $no; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $nik; ?></td>
                            <td><?php echo $jatah_cuti; ?></td>
                            <td><?php echo $ambil_cuti; ?></td>
                            <td><?php echo $sisa_cuti; ?></td>
                            <td><?php echo $tahun; ?></td>
                            <td><a href="#" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span></a>
                                <a href="#" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view("footer.php") ?>

<script>
    $(document).ready(function() {
        $('#mydata').DataTable();
    });
</script>