<?php

include "Functions.php";
check_login($db)

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "head.php"; ?>
        <link rel="stylesheet" href="css/cars.css">
        <title>Qmotors</title>
    </head>
    <body>

        <?php include "navbar.php"; ?>
        <!--content-->
        <?php
$newline   = array("\r\n", "\n", "\r");
$replace = '<br />';
$Car_Id =  $_GET['Id'];
setcookie("Last_viewed_car" , $Car_Id , time() + 3600);
$sql = "SELECT * FROM pro WHERE id = '$Car_Id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
?>

<section id='content-image'>
    <div class='row' style='color:white;'>
        <div class='col-lg-6'>
            <img class='img-section' src='<?php echo $row['image']; ?>' alt=''>
        </div>
        <div class='col-lg-6' style='text-align: left;'>
            <h1><?php echo $row['name']; ?></h1>
            <h3>Starting at <?php echo $row['price']; ?>$</h3>
        </div>
        <h3>Product Description : </h3>
        <p><?php echo str_replace($newline, $replace, $row['description']); ?> </p>
        <a method="POST" href="add.php?id=<?php echo $row['id']; ?>" class="add-to-cart-btn">ADD TO CART</a>


    </div>
</section>

        
     
        
        <div  id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-keyboard="true" style='background-color:#ffffff47' >
  
        <div class="carousel-inner">
    <div class="carousel-item active">
    <img class="testimonial-image img-section col-lg-2" src="<?php echo $row['image']; ?>" style="width:50%">
            <div class="text"><h4><?php echo $row['name'] ?></h4></div> 
        </div>
    <div class="carousel-item">
    <img class="testimonial-image img-section" src="<?php echo $row['image2'];  ?>" style="width:50%">
            <div class="text"><h4><?php echo $row['name'] ?></h4></div> </div>
    <div class="carousel-item">
    <img class="testimonial-image img-section" src="<?php echo $row['image3']; ?>" style="width:50%">
            <div class="text"><h4><?php echo $row['name'] ?></h4></div>
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" >
    <span  class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <?php include "cta+footer.php"; ?>
    </body>

</html>
