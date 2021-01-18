<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Data Pegawai</title>
    <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1>Data <small>Pegawai!</small></h1>
        <table class="table table-bordered table-striped" id="mydata">
            <thead>
                <tr>
                    <td>No</td>
                    <td>ID Role</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>NIK</td>
                    <td>Alamat</td>
                    <td>Tempat Lahir</td>
                    <td>Tanggal Lahir</td>
                    <td>Jenis Kelamin</td>
                    <td>Tanggal Masuk</td>
                    <td>Tanggal Kontrak</td>
                    <td>No telp</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data->result_array() as $i) :
                    $id_role = $i['id_role'];
                    $nama = $i['nama'];
                    $email = $i['email'];
                    $nik = $i['nik'];
                    $alamat = $i['alamat'];
                    $tmpt_lahir = $i['tmpt_lahir'];
                    $tgl_lahir = $i['tgl_lahir'];
                    $jenis_kelamin = $i['jenis_kelamin'];
                    $tgl_masuk = $i['tgl_masuk'];
                    $tgl_kontrak = $i['tgl_kontrak'];
                    $no_tlp = $i['no_tlp'];
                ?>
                    <tr>
                        <td></td>
                        <td><?php echo $id_role; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $nik; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $tmpt_lahir; ?></td>
                        <td><?php echo $tgl_lahir; ?></td>
                        <td><?php echo $jenis_kelamin; ?></td>
                        <td><?php echo $tgl_masuk; ?></td>
                        <td><?php echo $tgl_kontrak; ?></td>
                        <td><?php echo $no_tlp; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <script src="<?php echo base_url() . 'assets/js/jquery-2.2.4.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/moment.js' ?>"></script>
    <script>
        $(document).ready(function() {
            $('#mydata').DataTable();
        });
    </script>
</body>

</html>