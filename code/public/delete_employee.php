<?php
include '../includes/db.php';
include '../includes/function.php';
include '../classes/Manager.php';
include '../classes/Employee.php';

check_login();

$database = new Database();
$db = $database->getConnection();

$employee = new Employee($db);

if (isset($_GET['id'])) {
    $employee->id = $_GET['id'];
    $employee->manager_id = $_SESSION['manager_id'];

    if ($employee->delete()) {
        header("Location: employees.php");
    } else {
        echo "Error deleting employee!";
    }
}
?>