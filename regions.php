<title>Sensus | Regions</title>
<?php
    include 'session_check.php';
    include 'koneksi.php';
    include 'template.php';
    include 'function.php';
?>
<div class="container m-5 mx-auto">
    <h2>Regions</h2>
    <a class="btn btn-primary mb-2" href="region_tambah.php">Tambah Region</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah Penduduk</th>
                <th scope="col">Total Pendapatan</th>
                <th scope="col">Rata Pendapatan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $datas = query("SELECT * FROM regions");
            $no = 1;
            foreach($datas as $data):
                $id_reg = $data['id'];
                $jml_penduduk = count(query("SELECT * FROM person
                WHERE region_id = $id_reg"));
                $total = query("SELECT SUM(income) as total FROM person
                WHERE region_id = $id_reg")[0];
                $rata2 = query("SELECT AVG(income) as rata2 FROM person
                WHERE region_id = $id_reg")[0];
        ?>
            <tr>
                <th scope="row" class="text-center"><?= $no++ ?></th>
                <td><?= $data['name'] ?></td>
                <td><?= $jml_penduduk ?></td>
                <td><?= rupiah($total['total']) ?></td>
                <td><?= rupiah($rata2['rata2']) ?></td>
                <td>
                    <?php
                        if($rata2['rata2'] < 1700000){
                            echo '<p class="bg-danger text-white text-center p-2">merah</p>';
                        }
                        else if($rata2['rata2'] < 2200000){
                            echo '<p class="bg-warning text-white text-center p-2">kuning</p>';
                        }
                        else if($rata2['rata2'] > 2200000){
                            echo '<p class="bg-success text-white text-center p-2">hijau</p>';
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>