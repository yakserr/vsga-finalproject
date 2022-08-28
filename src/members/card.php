<?php
require_once '../../vendor/autoload.php';
require_once '../../config.php';



$id = $_GET['id'];

$anggota = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota = '$id'");
$anggota = mysqli_fetch_assoc($anggota);

use Dompdf\Dompdf as Dompdf;

$html = "
<style>
    table,
    th,
    td {
        border: 1px solid;
        text-align: left;
    }

    th,
    td {
        padding: 15px
    }
</style>
<table>
    <thead>
        <tr>
            <td colspan='3' rowspan='6'>
                <img src='$_SERVER[DOCUMENT_ROOT]/phpproject/vsga-finalproject/assets/img/default.png' alt='user' width='50 '>
            </td>
            <td>Kode Anggota </td>
            <td>$anggota[kode_anggota]</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>$anggota[nama]</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>$anggota[email]</td>
        </tr>
        <tr>
            <td>No Telp</td>
            <td>$anggota[telp]</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>$anggota[alamat]</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>$anggota[jenis_kelamin]</td>
        </tr>
    </thead>
</table>
";

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($anggota['nama'], array("Attachment" => 0));
