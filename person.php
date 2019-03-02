<title>Sensus | Person</title>
<?php
    include 'session_check.php';
    include 'koneksi.php';
    include 'template.php';
    include 'function.php';
?>
<div class="container m-5 mx-auto">
    <h2>Person</h2>
    <a class="btn btn-primary mb-2" href="person_tambah.php">Tambah Person</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Penghasilan</th>
                <th scope="col">Region</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $datas = query("SELECT *,
                            person.id as id_person,
                            person.name as nama_person,
                            regions.name as nama_region
                            FROM person
                            INNER JOIN regions ON
                            person.region_id = regions.id");
            $no = 1;
            foreach($datas as $data):
        ?>
            <tr>
                <th scope="row" class="text-center"><?= $no++ ?></th>
                <td><?= $data['nama_person'] ?></td>
                <td><?= rupiah($data['income']) ?></td>
                <td><?= $data['nama_region'] ?></td>
                <td>
                    <a href="person_edit.php?id=<?= $data['id_person'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="person_hapus.php?id=<?= $data['id_person'] ?>" class="btn btn-primary btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>