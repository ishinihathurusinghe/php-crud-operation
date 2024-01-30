     <?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
        .custom-btn-update,
        .custom-btn-delete {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .custom-btn-update:hover,
        .custom-btn-update:focus {
            background-color: blue !important;
            color: white !important;
        }

        .custom-btn-delete:hover,
        .custom-btn-delete:focus {
            background-color: red !important;
            color: white !important; 
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="btn my-5" style="background-color: #FF1493; color: white;"><a href="user.php" class="text-light">Add User</a></button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT * FROM crud";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $counter = 1; // Initialize counter variable
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id']; // Assuming 'id' is the unique identifier column
                    echo '<tr>';
                    echo '<th scope="row">' . $counter . '</th>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['mobile'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td>';
                    echo '<button class="btn custom-btn-update" style="background-color: #FF1493; color: white;"><a href="update.php?updateid='.$id.'" style="color: white;">Update</a></button>';
                    echo '<span style="margin-right: 10px;"></span>'; // Add a slightly larger space
                    echo '<button class="btn custom-btn-delete" style="background-color: black; color: white;"><a href="delete.php?deleteid='.$id.'" style="color: white;">Delete</a></button>';
                    echo '</td>';
                    echo '</tr>';
                    $counter++;
                }
            }
            ?>

            </tbody>
        </table>
    </div>
</body>
</html>







