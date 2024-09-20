<?php
include '../includes/db.php';
include '../includes/function.php';
include '../classes/Manager.php';
include '../classes/Employee.php';



check_login();

// 
if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT * FROM employees WHERE id = :id AND manager_id = :manager_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $employee_id);
    $stmt->bindParam(':manager_id', $_SESSION['manager_id']);  
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Employee not found or you don't have permission to edit this employee.";
        exit();
    }
} else {
    echo "No employee selected.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
  
    if (!empty($_FILES["picture"]["name"])) {
        $target_dir = "../images/";
        $picture = basename($_FILES["picture"]["name"]);
        $target_file = $target_dir . $picture;
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
    } else {
        
        $picture = $employee['picture'];
    }

    // استعلام التحديث
    $query = "UPDATE employees SET name = :name, email = :email, phone = :phone, picture = :picture WHERE id = :id AND manager_id = :manager_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':picture', $picture);
    $stmt->bindParam(':id', $employee_id);
    $stmt->bindParam(':manager_id', $_SESSION['manager_id']); 
    if ($stmt->execute()) {
        header("Location: employees.php");
    } else {
        echo "Error updating employee.";
    }
}
?>



<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="" placeholder="name"<?php echo $employee['name']; ?>" required>
    <input type="email" name="email" value="" placeholder="email"<?php echo $employee['email']; ?>" required>
    <input type="text" name="phone" value="" placeholder="phone number"<?php echo $employee['phone']; ?>" required>
    <img src="../images/<?php echo $employee['picture']; ?>" width="50" height="50">
    <input type="file" name="picture">
    <button type="submit">Update Employee</button>
</form>