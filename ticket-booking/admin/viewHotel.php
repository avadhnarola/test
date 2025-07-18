<?php
ob_start();
include("../db.php");
include("header.php");

// Handle delete
if (isset($_GET['d_id'])) {
    $id = intval($_GET['d_id']);
    $del = "DELETE FROM hotels WHERE id = $id";
    mysqli_query($conn, $del);
    header("Location: viewHotel.php");
    exit();
}

$select = "SELECT * FROM hotels";
$res = mysqli_query($conn, $select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View hotelss</title>
    <link rel="stylesheet" href="view-style.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
</head>

<body>


    <div class="container-fluid">
        <div class="button-container">
            <a href="addHotel.php" class=" btn btn-add">+ <b>Hotels</b></a>

        </div>
    </div>



    <div class="container d-flex justify-content-center">
        <div class="admin-panel">
            <h2>View Hotels</h2>
            <div class="table-responsive">

                <table class="table table-light table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Location</th>
                            <th>Nights</th>
                            <th>Price</th>
                            <th>Star</th>
                            <th>Image</th>
                            <th>Rate</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td><?php echo $row['nights']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <?php
                                    for ($i = 0; $i < $row['star']; $i++) {
                                        echo '★';
                                    }
                                    for ($j = $row['star']; $j < 5; $j++) {
                                        echo '☆';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php if (!empty($row['image'])): ?>
                                        <img src="images/<?php echo $row['image']; ?>"  style="height:60px;width:90px;"/>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['rate']; ?></td>
                                <td>
                                    <a href="addHotel.php?u_id=<?php echo $row['id']; ?>"
                                        class="btn edit-btn">Edit</a>
                                </td>
                                <td>
                                    <a href="viewHotel.php?d_id=<?php echo $row['id']; ?>" class="btn delete-btn"
                                        onclick="return confirm('Are you sure to delete this Hotel?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

<?php include("footer.php"); ?>