<title>Sensus | Person Tambah</title>
<?php
    include 'session_check.php';
    include 'koneksi.php';
    include 'template.php';
    include 'function.php';

    if(isset($_POST['kirim'])){
        if(person_tambah($_POST)){
            echo "
                <script>
                    alert('Person berhasil ditambah!');
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Person gagal ditambah!');
                </script>
            ";
        }
    }
?>
<div class="container m-5 mx-auto">
    <h2>Tambah Person</h2>
    <form class="col-5" method="POST">
        <input type="hidden" name="id_user" value="<?= $ses_id ?>">
        <div class="form-group">
            <label for="region">Pilih Region</label>
            <select name="region" id="region" class="form-control">
                <option disabled selected hidden>Pilih region</option>
            <?php
                $regions = query("SELECT id, name FROM regions");
                foreach($regions as $reg): ?>
                    <option value="<?= $reg['id'] ?>"><?= $reg['name'] ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat">
        </div>
        <div class="form-group">
            <label for="penghasilan">Penghasilan</label>
            <input type="number" name="penghasilan" class="form-control" id="penghasilan" placeholder="Masukkan penghasilan">
        </div>
        <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
    </form>
</div>