<!DOCTYPE html>
<html>

<head>
    <title>Import Excel Ke MySQL dengan PHP - Dan Din Dun</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        p {
            color: green;
        }
    </style>
    <h2>IMPORT EXCEL KE MYSQL DENGAN PHP</h2>
    <h3>malas desain OYE !!!!</h3>

    <?php
    if (isset($_GET['berhasil'])) {
        echo "<p>" . $_GET['berhasil'] . " Data berhasil di import.</p>";
    }
    ?>

    <a href="upload.php">IMPORT DATA</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Date</th>
            <th>Clock in</th>
            <th>Clock out</th>
            <th>Late</th>
            <th>Early</th>
        </tr>
        <?php
        include 'koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from tbl_absen");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <th><?php echo $no++; ?></th>
                <th><?php echo $d['name']; ?></th>
                <th><?php echo $d['date']; ?></th>
                <th><?php echo $d['clock_in']; ?></th>
                <th><?php echo $d['clock_out']; ?></th>
                <th><?php echo $d['late']; ?></th>
                <th><?php echo $d['early']; ?></th>
            </tr>
        <?php
        }
        ?>

    </table>

    <a href="https://www.malasngoding.com/import-excel-ke-mysql-dengan-php">AMPUN BANG JAGO TETOT</a>

</body>

</html>