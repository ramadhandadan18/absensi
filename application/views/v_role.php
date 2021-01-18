<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Data Role</title>
    <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1>Data <small>Role!</small></h1>
        <table class="table table-bordered table-striped" id="mydata">
            <thead>
                <tr>
                    <td>ID Role</td>
                    <td>Nama</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data->result_array() as $i) :
                    $id_role = $i['id_role'];
                    $nama = $i['nama'];
                ?>
                    <tr>
                        <td><?php echo $id_role; ?></td>
                        <td><?php echo $nama; ?></td>
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