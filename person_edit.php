<title>Sensus | Person Edit</title>
<?php
    include 'session_check.php';
    include 'koneksi.php';
    include 'template.php';
    include 'function.php';
    
    $id_person = $_GET['id'];

    $person = query("SELECT *,
                    person.id as id_person,
                    person.name as nama_person,
                    regions.name as nama_region
                    FROM person
                    INNER JOIN regions ON
                    person.region_id = regions.id
                    WHERE person.id = $id_person
    ")[0];

    if(isset($_POST['kirim'])){
        // var_dump($_POST);die;
        if(person_edit($_POST)){
            echo "
                <script>
                    alert('Person berhasil diubah!');
                    location.href = 'person.php';
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Person gagal diubah!');
                </script>
            ";
        }
    }
?>
<div class="container m-5 mx-auto">
    <h2>Edit Person</h2>
    <form class="col-5" method="POST">
        <input type="hidden" name="id_user" value="<?= $ses_id ?>">
        <input type="hidden" name="id_person" value="<?= $id_person ?>">
        <div class="form-group">
            <label for="region">Pilih Region</label>
            <select name="region" id="region" class="form-control">
            <?php
                $regions = query("SELECT id, name FROM regions");
                foreach($regions as $reg): ?>
                    <option value="<?= $reg['id'] ?>"
                    <?php if($reg['id'] == $person['region_id']) echo 'selected'; ?>
                    >
                    <?= $reg['name'] ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" value="<?= $person['nama_person'] ?>">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat" value="<?= $person['address'] ?>">
        </div>
        <div class="form-group">
            <label for="penghasilan">Penghasilan</label>
            <input type="number" name="penghasilan" class="form-control" id="penghasilan" placeholder="Masukkan penghasilan" value="<?= $person['income'] ?>">
        </div>
        <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
    </form>
</div>