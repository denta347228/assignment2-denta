<?php
include('koneksi2.php');
session_start();

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';
$avaibility = isset($_POST['avaibility']) ? $_POST['avaibility'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';



$errors = [];

// Validasi setiap input
if (empty($nama)) {
    $errors[] = 'Nama harus diisi.';
}
if (empty($role)) {
    $errors[] = 'Role harus diisi.';
}
if (empty($avaibility)) {
    $errors[] = 'Avaibility harus diisi.';
}
if (empty($age) || !is_numeric($age) || $age <= 0) {
    $errors[] = 'Umur harus diisi dengan angka yang valid.';
}
if (empty($lokasi)) {
    $errors[] = 'Lokasi harus diisi.';
}
if (empty($year) || !is_numeric($year) || $year < 0) {
    $errors[] = 'Pengalaman tahun harus diisi dengan angka yang valid.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email harus diisi dengan format yang benar.';
}

if (empty($errors)) {
    // Jika tidak ada error, set pesan sukses
    $_SESSION['success'] = 'Form berhasil dikirim!';

    // Lakukan penyimpanan data ke database atau tindakan lainnya

} else {
    // Jika ada error, set error ke session
    $_SESSION['errors'] = $errors;
}



// $nama = $_POST['nama'];
// $lokasi = $_POST['lokasi'];
// $role = $_POST['role'];
// $age = $_POST['age'];
// $year = $_POST['year'];
// $email= $_POST['email'];
// $avaibility= $_POST['avaibility'];


// $nama = $_SESSION ['nama']?? $_COOKIE['nama'] ?? '-';
// $lokasi = $_SESSION ['lokasi']?? $_COOKIE['lokasi'] ?? '-';
// $role = $_SESSION ['role']?? $_COOKIE['role'] ?? '-';
// $age = $_SESSION ['age']?? $_COOKIE['age'] ?? '-';
// $year = $_SESSION ['year']?? $_COOKIE['year'] ?? '-';
// $email = $_SESSION ['email']?? $_COOKIE['email'] ?? '-';
// $avaibility = $_SESSION ['avaibility']?? $_COOKIE['avaibility'] ?? '-';

// var_dump($_COOKIE);
// var_dump($_POST);


// if(isset ($_POST ['cokkie'] ) ){


// $_COOKIE['nama']= $_POST['nama'];
// $_COOKIE['lokasi']= $_POST['lokasi'];
// $_COOKIE['role']= $_POST['role'];
// $_COOKIE['age']= $_POST['age'];
// $_COOKIE['year']= $_POST['year'];
// $_COOKIE['email']= $_POST['email'];
// $_COOKIE['avaibility']= $_POST['avaibility'];

// setcookie("nama", $_POST['nama'], time() + 3600);
// setcookie("lokasi", $_POST['lokasi'], time() + 3600);
// setcookie("role", $_POST['role'], time() + 3600);
// setcookie("age", $_POST['age'], time() + 3600);
// setcookie("year", $_POST['year'], time() + 3600);
// setcookie("email", $_POST['email'], time() + 3600);
// setcookie("avaibility", $_POST['avaibility'], time() + 3600);

// $nama = isset ($_COOKIE['nama']) ? $_COOKIE ['nama']: 'nama tidak tersedia';
// $lokasi = isset ($_COOKIE['lokasi']) ? $_COOKIE ['lokasi']: 'lokasi tidak tersedia';
// $role = isset ($_COOKIE['role']) ? $_COOKIE ['role']: 'lokasi tidak tersedia';
// $age = isset ($_COOKIE['age']) ? $_COOKIE ['age']: 'age tidak tersedia';
// $year = isset ($_COOKIE['year']) ? $_COOKIE ['year']: 'year tidak tersedia';
// $email = isset ($_COOKIE['email']) ? $_COOKIE ['email']: 'email tidak tersedia';
// $avaibility = isset ($_COOKIE['lokasi']) ? $_COOKIE ['lokasi']: 'avaibility tidak tersedia';


// header('location:Latihan-1.php');

// } else if (isset ($_POST ['session']) ){
//     session_start();

//     $_SESSION['nama']= $_POST['nama'];
//     $_SESSION['lokasi']= $_POST['lokasi'];
//     $_SESSION['role']= $_POST['role'];
//     $_SESSION['age']= $_POST['age'];
//     $_SESSION['year']= $_POST['year'];
//     $_SESSION['email']= $_POST['email'];
//     $_SESSION['avaibility']= $_POST['avaibility'];

//     $nama = isset ($_SESSION['nama']) ? $_SESSION ['nama']: 'nama tidak tersedia';
//     $lokasi = isset ($_SESSION['lokasi']) ? $_SESSION ['lokasi']: 'lokasi tidak tersedia';
//     $role = isset ($_SESSION['role']) ? $_SESSION ['role']: 'lokasi tidak tersedia';
//     $age = isset ($_SESSION['age']) ? $_SESSION ['age']: 'age tidak tersedia';
//     $year = isset ($_SESSION['year']) ? $_SESSION ['year']: 'year tidak tersedia';
//     $email = isset ($_SESSION['email']) ? $_SESSION ['email']: 'email tidak tersedia';
//     $avaibility = isset ($_SESSION['avaibility']) ? $_SESSION ['avaibility']: 'avaibility tidak tersedia';


// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <div id="carouselExampleCaptions" class="carousel slide">
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produuct</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Gallery</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container" id="">
        <div class="row ">
            <div class="col-4">
                <canter><img src="bs.png" alt="" width="300"></canter>
            </div>
            <div class="col-4 my-auto d-block border-end ">
                <?php
                $id = isset($_GET['id']) ? $_GET['id'] : null;

                if ($nama) {
                    echo " <h3 name='nama'>{$nama}</h3>";
                } else {
                    echo "<h3 name='nama'>{Nama Anda}</h3>";
                }
                ?>
                <?php
                if ($role) {
                    echo " <p name='role'>{$role}</p>";
                } else {
                    echo "<p name='role'>{Role anda}</p>";
                }
                ?>
                <!-- <p name="role"> Front End Designer</p> -->
                <button class="btn btn-primary" type="submit">Kontak</button>
                <button class="btn btn-outline-success" type="submit">Resume</button>
            </div>

            <div class="col-4 my-auto d-block px-3">

                <?php
                $infolabels = ["avaibility", "Umur", "Alamat", "Pengalaman", "email"];
                $infoFields = [$avaibility, $age, $lokasi, $year, $email];

                foreach ($infolabels as $index => $tabel) {
                    echo "<strong>";
                    echo "<label for='floatingInput'>";
                    echo $tabel . ":" . $infoFields[$index];
                    echo "</label>";
                    echo "</strong>";
                    echo "<br>";
                }
                ;
                ?>
            </div>

            <?php
            if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo '<strong>Tidak dapat menambah data!</strong>';
                echo '<p class="border-top border-danger mt-2">Terdapat kesalahan input pada form di bawah!<p>';
                foreach ($_SESSION['errors'] as $error) {
                    echo '<ul><li>' . htmlspecialchars($error) . '</li></ul>';
                }
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
                unset($_SESSION['errors']);
            }
            if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo '<strong>Success!</strong>' . htmlspecialchars($_SESSION["success"]);
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
                unset($_SESSION['success']);
            }
            ?>


            <!-- form 2 -->
            <div class="container">
                <form method="POST">
                    <div class="container">
                        <div class="mb-7">
                            <label for="inputNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Masukin yang bener woi.</div>
                        </div>
                        <div class="mb-7">
                            <label for="inputRole" class="form-label">Role</label>
                            <input type="text" class="form-control" name="role" id="inputRole">
                        </div>
                        <div class="mb-7">
                            <label for="inputKesediaan" class="form-label">Avaibility</label>
                            <input type="text" class="form-control" name="avaibility" id="inputKesediaan">
                        </div>
                        <div class="mb-7">
                            <label for="inputUmur" class="form-label">Age</label>
                            <input type="number" class="form-control" name="age" id="inputUmur">
                        </div>
                        <div class="mb-7">
                            <label for="inputLokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" id="inputLokasi">
                        </div>
                        <div class="mb-7">
                            <label for="inputPengalaman" class="form-label">Year Experiance</label>
                            <input type="number" class="form-control" name="year" id="inputPengalaman">
                        </div>
                        <div class="mb-7">
                            <label for="inputemail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <br>
                        <input type="submit" name="submit" class="btn btn-success w-100">


                        <!-- <tr>
      <th scope="col">id</th>
      <th scope="col">Nama</th>
      <th scope="col">Role</th>
      <th scope="col">Avaibility</th>
      <th scope="col">Age</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Year Experiance</th>
      <th scope="col">Email</th>
    </tr> -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Avaibility</th>
                                    <th>Age</th>
                                    <th>Lokasi</th>
                                    <th>Year Experience</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php getAllData($conn); ?>
                            </tbody>
                        </table>




                        <!-- 
                <button type="submit" name="cokkie"></button> -->

                </form>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
                <!--link boostrap  -->
                <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
                <!--link js untuk serch  -->
                <script>
                    let table = new DataTable('#myTable');
                </script>
            </div>
</body>

</html>