<title>Sensus | Region Tambah</title>
<?php
    include 'session_check.php';
    include 'koneksi.php';
    include 'template.php';
    include 'function.php';

    if(isset($_POST['kirim'])){
        if(region_tambah($_POST)){
            echo "
                <script>
                    alert('Region berhasil ditambah!');
                </script>
            ";
        }
        else{
            echo "
                <script>
                    alert('Region gagal ditambah!');
                </script>
            ";
        }
    }
?>
<div class="container m-5 mx-auto">
    <h2>Tambah Region</h2>
    <form class="col-5" method="POST">
        <input type="hidden" name="id_user" value="<?= $ses_id ?>">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama region">
        </div>
        <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
    </form>
</div>