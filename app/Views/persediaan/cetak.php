<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=export.doc");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <h3 style="text-align: center;">Data Persediaan</h3>
    <table border="1" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA BARANG</th>
                <th>VOL/UNIT</th>
                <th>SATUAN</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($persediaan as $d) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $d->nama_barang; ?></td>
                    <td><?= $d->vol_unit; ?></td>
                    <td><?= $d->satuan; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>