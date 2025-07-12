<?php
ob_start();
include("../db.php");
include("header.php");

if (isset($_GET['u_id'])) {
    $id = $_GET['u_id'];

    $u_data = mysqli_query($conn, "select * from service where id=$id");
    $u_data = mysqli_fetch_assoc($u_data);
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $icon = $_POST['icon'];

    if (isset($_GET['u_id'])) {

        mysqli_query($conn, "update service set title='$title',content='$content',icon='$icon' where id=$id");
        header('location:viewService.php');
    } else {

        $data = mysqli_query($conn, "INSERT INTO service(title, content, icon) VALUES ('$title', '$content', '$icon')");
    }


    if ($data) {
        header("Location: viewService.php");
        exit();
    } else {
        echo "Insert failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Destination Form</title>
    <link rel="stylesheet" href="form-style.css">
</head>



<body>

    <div class="container d-flex justify-content-center">
        <div class="admin-panel">
            <h2>Add Destination</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="price">Price </label>
                    <input type="number" id="price" name="price" required value="<?php echo @$u_data['price']; ?>" />
                </div>

                <div class="form-group">
                    <label for="Days">Days</label>
                    <select id="days" name="days">
                        <option value="">Select a Days</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                   <input type="text" id="location" name="location"><?php echo @$u_data['location']; ?></textarea>

                </div>
                  <div class="form-group">
                    <label for="star">Star Rating</label>
                    <select id="star" name="star">
                        <option value="">Rating by Star</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" id="image" class="form-control" name="image" required value="<?php echo @$u_data['image']; ?>"/>
                </div>

                 <div class="form-group">
                    <label for="rate">Rate</label>
                   <input type="number" id="rate" name="rate"><?php echo @$u_data['rate']; ?></textarea>

                </div>
                <div class="form-actions">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</body>


</html>
<?php
include("footer.php");
?>