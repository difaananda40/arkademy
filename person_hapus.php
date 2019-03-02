<?php
include 'function.php';

if(isset($_GET['id'])){
    if(person_hapus($_GET['id'])){
        echo "
            <script>
                alert('Person berhasil dihapus!');
                location.href = 'person.php';
            </script>
        ";
    }
    else{
        echo "
            <script>
                alert('Person berhasil dihapus!');
                location.href = 'person.php';
            </script>
        ";
    }
}