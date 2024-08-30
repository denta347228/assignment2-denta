<?php

include_once("koneksi2.php");
$conn = getConnection();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // ID data yang akan dihapus

    $sql = "DELETE FROM data WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Data deleted successfully.";
        header("Location: Form-day4.php"); // Redirect to a success page or another page
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <h2>Edit Data</h2>
        <form method="POST" action="edit.php">
            <input type="hidden" name="" value="<?php echo $id; ?>"> <!-- Hidden field to hold the ID -->

            <div class="form-group">
                <label for="nama">Name:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $role; ?>" required>
            </div>

            <div class="form-group">
                <label for="avaibility">Availability:</label>
                <input type="text" class="form-control" id="avaibility" name="avaibility"
                    value="<?php echo $avaibility; ?>" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Location:</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="year">Years of Experience:</label>
                <input type="number" class="form-control" id="year" name="year" value="<?php echo $year; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <button type="submit" header="form-day4.php" class="btn btn-primary">Update</button>

            <a href="Form-day4.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>