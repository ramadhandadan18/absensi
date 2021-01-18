<?php $this->load->view("header.php") ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA ABSEN</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="mydata" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td align="center">No</td>
                        <td>Nama</td>
                        <td>Date</td>
                        <td>Jam in</td>
                        <td>Jam out</td>
                        <td>Terlambat</td>
                        <td>Early</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data->result_array() as $i) :

                        $name = $i['name'];
                        $date = $i['date'];
                        $clock_in = $i['clock_in'];
                        $clock_out = $i['clock_out'];
                        $late = $i['late'];
                        $early = $i['early'];

                    ?>
                        <tr>
                            <td align="center"><?php echo $no; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $clock_in; ?></td>
                            <td><?php echo $clock_out; ?></td>
                            <td><?php echo $late; ?></td>
                            <td><?php echo $early; ?></td>
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