<?php
require_once '../includes/db.php';
include '../includes/function.php';
include '../classes/Manager.php';
include '../classes/Employee.php';


check_login(); 

$database = new Database();
$db = $database->getConnection();

$employee = new Employee($db);

$manager_id = $_SESSION['manager_id'];


$query = "SELECT * FROM employees WHERE manager_id = :manager_id";
$stmt = $db->prepare($query);
$stmt->bindParam(':manager_id', $manager_id);
$stmt->execute();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body background="white">


    <?php include "error.php" ?>
    <?php include "success.php" ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Employee Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employees.php">Employees</a>
                    </li>
                    <button class="btn btn-danger ms-2" type="submit">
                        <a href="logout.php">Logout</a>
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>


            </div>
        </div>
    </nav>
    <section class="h-100">
        <div class="card w-20 bg-transparent text-light text-center border border-light">

            <a class="btn btn-outline-success" href="add_employee.php" role="button"><i
                    class="fa-sharp fa-solid fa-plus"></i>Add Employee</i></a>
        </div>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Picture</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                        
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><img src="../images/<?php echo $row['picture']; ?>" width="50" height="50"></td>
                            <td>
                                <a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a href="delete_employee.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>