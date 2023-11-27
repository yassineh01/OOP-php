<?php

require_once("Database.class.php");

$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Geboortedatum</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $result = $db->Select();
        foreach ($result as $row) {
        ?>

            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['naam']; ?>
                </td>
                <td>
                    <?php echo $row['achternaam']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['geboorte_datum']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">
                        Edit
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id']; ?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>