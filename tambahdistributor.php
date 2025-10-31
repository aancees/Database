<?php
include 'connect.php';

if (isset($_POST['Submit'])) {
    $id_distributor = $_POST['id_distributor'];
    $nama_distributor    = $_POST['nama_distributor'];
    $alamat_distributor  = $_POST['alamat_distributor'];
    $telp_distributor    = $_POST['telp_distributor'];

    $query = "INSERT INTO distributor (id_distributor, nama_distributor, alamat_distributor, telp_distributor)
              VALUES ('$id_distributor', '$nama_distributor', '$alamat_distributor', '$telp_distributor')";

    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Data Distributor Berhasil Disimpan c rdit');</script>";
    } else {
        echo 'Error: ' . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Form Distributor</title>
</head>
<body bgcolor="#999999">

<h2>Masukkan Data Distributor</h2>

<form action="" method="post">
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td>ID Distributor</td>
            <td><input name="id_distributor" type="text" size="30" required></td>
        </tr>
        <tr>
            <td>Nama Distributor</td>
            <td><input name="nama_distributor" type="text" size="30" required></td>
        </tr>
        <tr>
            <td>Alamat Distributor</td>
            <td><input name="alamat_distributor" type="text" size="30"></td>
        </tr>
        <tr>
            <td>Telepon Distributor</td>
            <td><input name="telp_distributor" type="text" size="30"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="Submit" value="Simpan">
            </td>
        </tr>
    </table>
</form>

<hr>

<h2>Data Distributor</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead bgcolor="#CCCCCC">
        <tr>
            <th>No</th>
            <th>ID Distributor</th>
            <th>Nama Distributor</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $sql = mysqli_query($mysqli, "SELECT * FROM distributor ORDER BY id_distributor ASC");
        while ($arr = mysqli_fetch_assoc($sql)) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($arr['id_distributor']) ?></td>
                <td><?= htmlspecialchars($arr['nama_distributor']) ?></td>
                <td><?= htmlspecialchars($arr['alamat_distributor']) ?></td>
                <td><?= htmlspecialchars($arr['telp_distributor']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
