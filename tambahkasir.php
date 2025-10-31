<?php
include 'connect.php';

if (isset($_POST['Submit'])) {
    $id_kasir = $_POST['id_kasir'];
    $nama_kasir    = $_POST['nama_kasir'];
    $alamat_kasir  = $_POST['alamat_kasir'];
    $telp_kasir    = $_POST['telp_kasir'];
    $status_kasir  = $_POST['status_kasir'];
    $username      = $_POST['username'];
    $password      = $_POST['password'];
    $akses         = $_POST['akses'];

    $hashed_password = "*" . strtoupper(sha1(sha1($password, true)));

    $query = "INSERT INTO kasir 
              (id_kasir, nama_kasir, alamat_kasir, telp_kasir, status_kasir, username, password, akses)
              VALUES 
              ('$id_kasir', '$nama_kasir', '$alamat_kasir', '$telp_kasir', '$status_kasir', '$username', '$hashed_password', '$akses')";

    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Data Kasir Berhasil Disimpan c rdit');</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Form Kasir</title>
</head>
<body bgcolor="#999999">

<h2>Masukkan Data Kasir</h2>

<form action="" method="post">
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td>ID Kasir</td>
            <td><input name="id_kasir" type="text" size="30" required></td>
        </tr>
        <tr>
            <td>Nama Kasir</td>
            <td><input name="nama_kasir" type="text" size="30" required></td>
        </tr>
        <tr>
            <td>Alamat Kasir</td>
            <td><input name="alamat_kasir" type="text" size="30"></td>
        </tr>
        <tr>
            <td>Telepon Kasir</td>
            <td><input name="telp_kasir" type="text" size="30"></td>
        </tr>
        <tr>
            <td>Status Kasir</td>
            <td>
                <select name="status_kasir" required>
                    <option value="">--Pilih Status--</option>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input name="username" type="text" size="30" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input name="password" type="password" size="30" required></td>
        </tr>
        <tr>
            <td>Akses</td>
            <td>
                <select name="akses" required>
                    <option value="">--Pilih Akses--</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="Submit" value="Simpan">
            </td>
        </tr>
    </table>
</form>

<hr>

<h2>Data Kasir</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead bgcolor="#CCCCCC">
        <tr>
            <th>No</th>
            <th>ID Kasir</th>
            <th>Nama Kasir</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Status</th>
            <th>Username</th>
            <th>Password (hash)</th>
            <th>Akses</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $sql = mysqli_query($mysqli, "SELECT * FROM kasir ORDER BY id_kasir ASC");
        while ($arr = mysqli_fetch_assoc($sql)) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($arr['id_kasir']) ?></td>
                <td><?= htmlspecialchars($arr['nama_kasir']) ?></td>
                <td><?= htmlspecialchars($arr['alamat_kasir']) ?></td>
                <td><?= htmlspecialchars($arr['telp_kasir']) ?></td>
                <td><?= htmlspecialchars($arr['status_kasir']) ?></td>
                <td><?= htmlspecialchars($arr['username']) ?></td>
                <td><?= htmlspecialchars($arr['password']) ?></td>
                <td><?= htmlspecialchars($arr['akses']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
