<?php
include 'koneksi.php';

function query($query){
    global $konek;
    $get_data = mysqli_query($konek, $query);
    $data = array();
    
    while($row = mysqli_fetch_assoc($get_data)){
        $data[] = $row;
    }

    return $data;
}

function rupiah($rp){
    $formatted = number_format($rp, 0, ',', '.');
    return 'Rp. ' . $formatted;
}

function region_tambah($data){
    global $konek;
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];

    $query = mysqli_query($konek, "INSERT INTO regions VALUES(
                                   NULL,
                                   '$nama',
                                   CURRENT_TIMESTAMP,
                                   $id_user
    )");

    return $query;
}

function person_tambah($data){
    global $konek;
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $region = $_POST['region'];
    $alamat = $_POST['alamat'];
    $penghasilan = $_POST['penghasilan'];

    $query = mysqli_query($konek, "INSERT INTO person VALUES(
                                   NULL,
                                   '$nama',
                                   $region,
                                   '$alamat',
                                   $penghasilan,
                                   CURRENT_TIMESTAMP,
                                   $id_user
    )");

    return $query;
}

function person_edit($data){
    global $konek;
    $id_user = $_POST['id_user'];
    $id_person = $_POST['id_person'];
    $nama = $_POST['nama'];
    $region = $_POST['region'];
    $alamat = $_POST['alamat'];
    $penghasilan = $_POST['penghasilan'];

    $query = mysqli_query($konek, "UPDATE person SET
                                   name = '$nama',
                                   region_id = $region,
                                   address = '$alamat',
                                   income = '$penghasilan'
                                   WHERE id = $id_person
    ");

    return $query;
}

function person_hapus($id){
    global $konek;

    $query = mysqli_query($konek, "DELETE FROM person WHERE id = $id");

    return $query;
}