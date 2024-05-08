<?php
// Include the database connection file
include "koneksi.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $nama = $_POST["nama"];
    $id = $_POST["id"];
    $kepala_sekolah = $_POST["kepala_sekolah"];
    $jumlah_guru = $_POST["jumlah_guru"];
    $jumlah_murid = $_POST["jumlah_murid"];
    $keterangan = $_POST["keterangan"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    // Perform database update operation
    $sql = "UPDATE data SET nama='$nama', kepala_sekolah='$kepala_sekolah', jumlah_guru='$jumlah_guru', jumlah_murid='$jumlah_murid', keterangan='$keterangan', latitude='$latitude', longitude='$longitude' WHERE id='$id'";

    if (mysqli_query($con, $sql)) {
        // Update successful
        $updatedData = array(
            "nama" => $nama,
            "id" => $id,
            "kepala_sekolah" => $kepala_sekolah,
            "jumlah_guru" => $jumlah_guru,
            "jumlah_murid" => $jumlah_murid,
            "keterangan" => $keterangan,
            "latitude" => $latitude,
            "longitude" => $longitude
        );
        echo json_encode($updatedData);
    } else {
        // Update failed
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Failed to update data."));
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method Not Allowed."));
}

// Close the database connection
mysqli_close($con);
?>
