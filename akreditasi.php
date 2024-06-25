<?php
header('Content-Type: application/json; charset=utf8');

require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "select akre_id, fakultas_alias, jenjang_alias, prodi_nama, status_nama from tb_akreditasi, tb_fakultas, tb_jenjang, tb_prodi, tb_statusakre where akre_fakultas=fakultas_id && akre_jenjang=jenjang_id && akre_prodi=prodi_id && akre_status = status_id && akre_kategori ='1'";
    $query = mysqli_query($koneksi, $sql);
    $array_data = array();
    while($data = mysqli_fetch_assoc($query)){
        $array_data[] = $data;
    }
    echo json_encode($array_data);
}

?>
