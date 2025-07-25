<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $room = $conn->query("SELECT * FROM Room WHERE id = $id")->fetch_assoc();
}
?>

<div class="col-md-12 room-wrap">
    <div class="row">
        <div class="col-md-7 d-flex">
            <div class="img align-self-stretch main-img" style="background-image: url('admin/images/<?php echo $room['image']; ?>'); "></div>
        </div>
        <div class="col-md-5">
            <div class="text pb-5">
                <h3><?php echo $room['title']; ?></h3>
                <p class="pos">from <span class="price">$<?php echo $room['price']; ?></span>/night</p>
                <p><?php echo $room['description']; ?></p>
                <p><a href="#" class="btn btn-primary">Book now</a></p>
            </div>
        </div>
    </div>
</div>
