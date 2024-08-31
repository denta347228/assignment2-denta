<?php
include("OOP.php");
// Fungsi untuk mendapatkan data POST
// function getPostData($field) {
//     $check = validateInput($field);
//     var_dump($check);
//     if ($check == false) {
//         header("Location: Form-day4.php");
//         exit();
//     } else {
//         return $_POST[$field];
//     }
// }
$conn = getConnection();
$nama = '';
$role = '';
$avaibility = '';
$age = '';
$lokasi = '';
$year = '';
$email = '';

function saveData($conn, $nama, $role, $avaibility, $age, $lokasi, $year, $email)
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $db = "INSERT INTO `data` (nama, `role`, avaibility, age, lokasi, `yearex`, email)
               VALUES ('$nama', '$role', '$avaibility', $age, '$lokasi', $year, '$email')";

        if ($conn->query($db)) {
        } else {
            echo "Belum ada perintah";
        }
    }
}


function get($id, $conn)
{
    if ($id) {
        $db = "SELECT * FROM `data` WHERE id=$id";
        $result = $conn->query($db);


        if ($result === false) {
            die("Error: " . $conn->error);

        }

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        var_dump($result);
    }
    return null;
}
// Fungsi untuk menghapus data berdasarkan ID
function deleteData($id, $conn)
{
    $stmt = $conn->prepare("DELETE FROM data WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data dengan ID $id berhasil dihapus.";
    } else {
        echo "Gagal menghapus data atau data dengan ID $id tidak ditemukan.";
    }

    $stmt->close();
}

// Fungsi untuk memperbarui data berdasarkan ID



function validateInput($field, $type = 'string', $minLength = 0)
{
    if (empty($_POST[$field])) {
        return false; // Form kosong
    }

    $value = $_POST[$field];

    if ($type === 'string' && strlen($value) < $minLength) {
        return false; // Input tidak memenuhi limit minimal
    }

    if ($type === 'int') {
        if (!is_numeric($value) || intval($value) != $value) {
            return false; // Tipe data tidak cocok atau terdapat desimal pada integer
        }

        if ($value <= 0) {
            return false; // Umur tidak boleh 0
        }
    }

    if ($type === 'integer') {
        if (!is_numeric($value) || floatval($value) != $value) {
            return false; // Tipe data tidak cocok
        }
    }

    return true;
}

function getAllData($conn)
{
    $db = "SELECT * FROM `data`";
    $result = $conn->query($db);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['nama']) . "</td>
                    <td>" . htmlspecialchars($row['role']) . "</td>
                    <td>" . htmlspecialchars($row['avaibility']) . "</td>
                    <td>" . htmlspecialchars($row['age']) . "</td>
                    <td>" . htmlspecialchars($row['lokasi']) . "</td>
                    <td>" . htmlspecialchars($row['yearex']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>
                        <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                        <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")' class='btn btn-danger'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No data found</td></tr>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $namaValid = validateInput('nama', 'string', 3);
    $roleValid = validateInput('role', 'string', 3);
    $avaibilityValid = validateInput('avaibility', 'string', 3);
    $ageValid = validateInput('age', 'int');
    $lokasiValid = validateInput('lokasi', 'string', 3);
    $yearValid = validateInput('year', 'int');
    $emailValid = validateInput('email', 'string', 5); // Email length minimal 5

    // Mengecek apakah semua validasi berhasil
    if ($namaValid && $roleValid && $avaibilityValid && $ageValid && $lokasiValid && $yearValid && $emailValid) {
        // Jika semua validasi lolos, lakukan operasi database
        saveData($conn, $_POST['nama'], $_POST['role'], $_POST['avaibility'], $_POST['age'], $_POST['lokasi'], $_POST['year'], $_POST['email']);
    } else {
        echo "";
    }
}


// Jika ada ID yang diberikan, ambil data berdasarkan ID
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $row = get($id, $conn);
    echo "id";
    if ($row) {
        $nama = $row["nama"];
        $role = $row["role"];
        $avaibility = $row["avaibility"];
        $age = $row["age"];
        $lokasi = $row["lokasi"];
        $year = $row["yearex"];
        $email = $row["email"];
    }
}

?>