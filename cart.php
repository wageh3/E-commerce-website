<?php
@include 'connect_db.php';
session_start();
$user_id = $_SESSION["user_id"];
$total = 0;






if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($db, "UPDATE `bag` SET count = '$update_value' WHERE id = '$update_id'");
    if ($update_quantity_query) {
        header("location:cart.php");
    };
};

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($db, "DELETE FROM `bag` WHERE id = '$remove_id'");
    header('location:cart.php');
};
if (isset($_GET['delete_all'])) {
    mysqli_query($db, "DELETE FROM `bag` WHERE id = '$remove_id'");
    header("location:cart");
}
$select = " SELECT * FROM bag WHERE user_id = '$user_id' ";
$bag_info = mysqli_query($db, $select);
if (mysqli_num_rows($bag_info) > 0) {

    $bag = mysqli_fetch_assoc($bag_info);
    $bag_count = mysqli_num_rows($bag_info);
} else
    $bag_count = 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Karl - Fashion Ecommerce Template | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <!-- <link rel="stylesheet" href="css/core-style.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/cart2.css">
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <!-- <style>
    .quantity > form > input[type="submit"] {

width: 90px;
   height: 30px;

   text-transform:lowercase;
   background-color:#ff084e;
   padding: 0 15px;
   font-size: 15px;

   color: #f9f1f1;
   font-weight: 600;
   right: 0;

}
</style> -->
</head>

<body>
    <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
        <div class="nav-side-menu">
            <div class="menu-list">
                <h6>Account</h6>
                <li><a href="login/login and register .html"><span class="glyphicon glyphicon-user">SignUP</span></a></li>
                <li><a href="login/login and register .html"><span class="glyphicon glyphicon-user">Login</span></a></li>
            </div>
        </div>
    </div>

    <div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        <header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">

                <div class="container h-100">

                    <div class="row h-100 align-items-center justify-content-end">


                        <div class="col-12 col-lg-7">

                            <div class="top_single_area d-flex align-items-center">
                                <!--Search Area -->

                                <!-- Logo Area -->

                                <!--search-->
                                <div class="search_form">
                                    <form action="#" method="post">
                                        <input type="search" name="search" class="search" placeholder="Search here">
                                        <button type="submit" class="submit">Search</button>
                                    </form>
                                </div>

                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <div class="top_logo">
                                        <a href="#"><img src="img/core-img/logo.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Search Area -->
                        <div class="header-cart-menu d-flex align-items-center ml-auto">
                            <!-- Cart Area -->
                            <div class="cart">
                                <a href="#" id="header-cart-btn" target="_blank"><span class="cart_quantity"><?php echo $bag_count ?></span> <i class="ti-bag"></i> Your Bag <!--$20--></a>

                                <!-- Cart List Area Start -->
                                <ul class="cart-list">
                                    <?php

                                    $select = " SELECT * FROM bag WHERE user_id = '$user_id' ";
                                    $bag_info = mysqli_query($db, $select);
                                    if (mysqli_num_rows($bag_info) > 0) {
                                        while ($bag = mysqli_fetch_assoc($bag_info)) {





                                    ?>

                                            <li>
                                                <?php
                                                $id = $bag["pro_id"];
                                                $select = " SELECT * FROM pro WHERE id = '$id' ";


                                                $pro_info = mysqli_query($db, $select);

                                                if (mysqli_num_rows($pro_info) > 0) {

                                                    $pro = mysqli_fetch_array($pro_info);
                                                }
                                                ?>
                                                <a href="#" class="image"><img src=<?php echo $pro["image"]; ?> class="cart-thumb" alt=""></a>
                                                <div class="cart-item-desc">
                                                    <h6><a href="#"><?php echo $pro["name"]; ?></a></h6>
                                                    <p><?php echo $bag["count"] ?>x - <span class="price">$<?php echo $bag["count"] * $pro["price"]; ?></span></p>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                    <?php
                                        };
                                    };
                                    ?>
                                    <!-- <li>
                                                <a href="#" class="image"><img src="img/product-img/product-11.jpg" class="cart-thumb" alt=""></a>
                                                <div class="cart-item-desc">
                                                    <h6><a href="#">Women's Fashion</a></h6>
                                                    <p>1x - <span class="price">$10</span></p>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <li class="total">
                                                <span class="pull-right">Total: $20.00</span>
                                                <a href="cart.html" class="btn btn-sm btn-cart">Cart</a>
                                                <a href="checkout.html" class="btn btn-sm btn-checkout">Checkout</a>
                                            </li> -->
                                </ul>
                            </div>
                            <div class="header-right-side-menu ml-15">
                                <a href="#" id="sideMenuBtn"><i class="ti-menu" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="https://www.pinterest.com/"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com/login/%22%3E"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/i/flow/login%22%3E"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://www.linkedin.com/signup%22%3E"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="user_main_page.php"><span class="karl-level">hot</span>Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="feedback/index.php">Feedbacks</a></li>
                                            <li class="nav-item"><a class="nav-link" href="profile.php"> Profile</a></li>
                                            <li class="nav-item"><a class="nav-link" href="cart.php">Bag</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:+346573556778"><i class="ti-headphone-alt"></i> Help</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->

        <!-- ****** Top Discount Area Start ****** -->
        <section class="top-discount-area d-md-flex align-items-center">
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>Free Shipping &amp; Returns</h5>
                <h6><a href="#">BUY NOW</a></h6>
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>20% Discount for all dresses</h5>
                <h6>USE CODE: Colorlib</h6>
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>20% Discount for students</h5>
                <h6>USE CODE: Colorlib</h6>
            </div>
        </section>
        <!-- ****** Top Discount Area End ****** -->

        <!-- ****** Cart Area Start ****** -->
        <?php
        if (mysqli_num_rows($bag_info) > 0) {
            $select = " SELECT * FROM pro WHERE id = '$id' ";

            $pro_info = mysqli_query($db, $select);

            if (mysqli_num_rows($pro_info) > 0) {

                $pro = mysqli_fetch_array($pro_info);
            }
        }
        ?>
        <div class="cart_area section_padding_100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $select = " SELECT * FROM bag WHERE user_id = '$user_id' ";
                                    $bag_info = mysqli_query($db, $select);
                                    //    $total = 0;
                                    if (mysqli_num_rows($bag_info) > 0) {
                                        while ($bag = mysqli_fetch_assoc($bag_info)) {



                                                

                                    ?>


                                            <?php
                                            $id = $bag["pro_id"];
                                            $select = " SELECT * FROM pro WHERE id = '$id' ";
                                                    

                                            $pro_info = mysqli_query($db, $select);

                                            if (mysqli_num_rows($pro_info) > 0) {

                                                $pro = mysqli_fetch_array($pro_info);
                                            }
                                            ?>

                                            
                                                


                                            <tr>
                                                <td class="cart_product_img d-flex align-items-center">
                                                    <a href="#"><img src=<?php echo $pro["image"]; ?> alt="Product"></a>
                                                    <h6><?php echo $pro["name"]; ?></h6>
                                                </td>
                                                <td class="price"><span>$<?php echo $pro["price"]; ?></span></td>
                                                <td class="qty">

                                                    <div class="quantity">
                                                        <form action="" method="post">

                                                            <input type="hidden" name="update_quantity_id" value="<?php echo $bag['id']; ?>">
                                                            <input type="number" name="update_quantity" min="1" value="<?php echo $bag['count']; ?>">
                                                            <input type="submit" value="update" name="update_update_btn">

                                                        </form>
                                                    </div>

                                                </td>
                                                <div class="remove">
                                                    <td class="total_price"><span>$<?php echo $bag["count"] * $pro["price"] ?></span></td>
                                                    <td><a href="cart.php?remove=<?php echo $bag['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> remove</a></td>
                                                </div>
                                                <?php
                                                $total = $total + ($bag["count"] * $pro["price"]);
                                                ?>
                                            </tr>

                                    <?php
                                        };
                                    };
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-footer d-flex mt-30">
                            <div class="back-to-shop w-50">
                                <a href="user_main_page.php">Continue shooping</a>
                            </div>
                            <div class="update-checkout w-50 text-right">


                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="coupon-code-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Cupon code</h5>
                                <p>Enter your cupone code</p>
                            </div>
                            <form action="#">
                                <input type="search" name="search" placeholder="#569ab15">
                                <button type="submit">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">

                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-total-area mt-70">
                            <div class="cart-page-heading">
                                <h5>Cart total</h5>
                                <p>Final info</p>
                            </div>

                            <ul class="cart-total-chart">

                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span><strong>Total</strong></span> <span><strong>$<?php echo $total ?></strong></span></li>
                            </ul>
                            <?php
                            
                            ?>
                            <a href="checkout.php" class="btn karl-checkout-btn">Proceed to checkout</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ****** Cart Area End ****** -->

        <!-- ****** Footer Area Start ****** -->
        <footer class="footer_area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single_footer_area">
                            <div class="footer-logo">
                                <img src="img/core-img/logo.png" alt="">
                            </div>
                            
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="single_footer_area">
                            <ul class="footer_widget_menu">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Our Policies</a></li>
                                <li><a href="#">Afiliates</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Area Start -->
                    <div class="col-12 col-lg-5">
                        <div class="single_footer_area">
                            <div class="footer_heading mb-30">
                                <h6>Subscribe to our newsletter</h6>
                            </div>
                            <div class="subscribtion_form">
                                <form action="#" method="post">
                                    <input type="email" name="mail" class="mail" placeholder="Your email here">
                                    <button type="submit" class="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line"></div>

                <!-- Footer Bottom Area Start -->
                <div class="footer_bottom_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer_social_area text-center">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ****** Footer Area End ****** -->
    </div>
    <!-- /.wrapper end -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
                                    <?php
                                    $_SESSION['total'] = $total;
                                    ?>
</body>

</html>