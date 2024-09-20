<?php
include '../includes/db.php';
include '../includes/function.php';
include '../classes/Manager.php';
include '../classes/Employee.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $employee = new Employee($db);
    $employee->name = $_POST['name'];
    $employee->email = $_POST['email'];
    $employee->phone = $_POST['phone'];
    
   
    $employee->manager_id = $_SESSION['manager_id'];
    
    
    $target_dir = "../images/";
    $employee->picture = basename($_FILES["picture"]["name"]);
    $target_file = $target_dir . $employee->picture;
    move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

    if ($employee->create()) {
        header("Location: employees.php");
    } else {
        $error = "Error adding employee!";
    }
}
?>

<?php include '../templates/header.php'; ?>
<h2>Add New Employee</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Employee Name" required>
    <input type="email" name="email" placeholder="Employee Email" required>
    <input type="text" name="phone" placeholder="Employee Phone" required>
    <input type="file" name="picture" required>
    <button type="submit">Add Employee</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>