<?php
include '../../backend/config/config.php';

$sqla = "SELECT id, username, email , password FROM newusers";
$result = $connection->query($sqla);
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Production Management System - Admin</title>
    <link rel="stylesheet" href="userTable.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="div-user-table">
        <table >
            <tr style="background-color: #AD49E1 !important;">
                <th align="left">ID</th>
                <th align="left">Username</th>
                <th align="left">Email</th>
                <th align="center">Update</th>
                <th align="center">Delete</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td align='center' ><a id= 'update-button' 
                                style='
                                  color:#27aa2f ;
                                  display: inline-block;
                                  padding: 8px 16px;
                                  font-size: 14px;
                                  text-decoration: none;
                                  border-radius: 4px;
                                  text-align: center;
                                  margin: 0px;
                                  border: 1px solid #27aa2f;' href='updateUser.php?id=" . $row["id"] . "'>Update</a></td>";
                    echo "<td align='center' ><a id= 'delete-button' 
                                style='
                                  color: #db1414;
                                  display: inline-block;
                                  padding: 8px 16px;
                                  font-size: 14px;
                                  text-decoration: none;
                                  border-radius: 4px;
                                  text-align: center;
                                  margin: 0px;
                                  border: 1px solid #db1414;' href='../../backend/function/deleteUser.php?id=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$connection->close();
?>
