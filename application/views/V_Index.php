<!DOCTYPE html>
<html>

<head>
    <title>Import Excel KompiKaleng</title>

    <style type="text/css">
        table {
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }

        form {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Induk</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($data as $key => $value) : $no++; ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value['noinduk'] ?></td>
                    <td><?= $value['nama']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form method="post" action="<?php echo base_url('C_Index/importExcel') ?>" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit">Submit</button>
    </form>
</body>

</html>