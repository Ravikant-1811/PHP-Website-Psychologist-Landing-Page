<?php
include 'config.php';
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    // Collect form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $rating = (int) $_POST['rating'];
    $service = $conn->real_escape_string($_POST['service']);
    $review = $conn->real_escape_string($_POST['review']);

    // Check if the review already exists
    $check_sql = "SELECT * FROM reviews WHERE name = '$name' AND email = '$email'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // If a review already exists, display an error message
        $error_message = "You have already submitted a review.";
    } else {
        // Insert into database
        $sql = "INSERT INTO reviews (name, email, rating, service, review) 
                VALUES ('$name', '$email', '$rating', '$service', '$review')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to thank you page
            header("Location: thankyou.php");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Physcologist Bhoomi Nandwani</title>
    <!-- favicons Icons -->
    <link rel="icon" href="assets/images/favi.png" type="image/x-icon" />
    <meta name="description" content="Psychologist Bhoomi Nandwani" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Castoro:ital@0;1&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="assets/vendors/delogis-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="assets/vendors/alagambe-font/stylesheet.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/delogis.css" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->
    <style>
        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
    <div class="page-wrapper">

        <!--Contact Page Start-->
        <section class="contact-page">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Write to us</span>
                    <h2 class="section-title__title">Feel Free to write a review</h2>
                </div>
                <div class="contact-page__form-box text text-center">
                    <?php if (isset($error_message)): ?>
                        <div class="error-message"><?php echo $error_message; ?></div>
                    <?php endif; ?>

                    <form action="" method="post" class="contact-page__form">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-page__form-input-box">
                                    <input type="text" placeholder="Your Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-page__form-input-box">
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-page__form-input-box">
                                    <select name="rating" required class="selectpicker">
                                        <option selected disabled>Select Rating</option>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Star</option>
                                        <option value="3">3 Star</option>
                                        <option value="4">4 Star</option>
                                        <option value="5">5 Star</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="contact-page__form-input-box">
                                    <select name="service" class="selectpicker">
                                        <option selected disabled>Select Service</option>
                                        <option value="Counselling">Counselling</option>
                                        <option value="Morning Meditation">Morning Meditation</option>
                                        <option value="Individual Therapy">Individual Therapy</option>
                                        <option value="Couple Therapy">Couple Therapy</option>
                                        <option value="Group Therapy">Group Therapy</option>
                                        <option value="Family Therapy">Family Therapy</option>
                                        <option value="Child Therapy">Child Therapy</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-page__form-input-box text-message-box">
                                    <textarea name="review" placeholder="Your Review" required></textarea>
                                </div>
                                <div class="contact-page__form-btn-box">
                                    <button type="submit" class="thm-btn contact-page__form-btn">Submit Review</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="result"></div>
                </div>
            </div>
        </section>
        <!--Contact Page End-->


    </div><!-- /.page-wrapper -->


    <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/swiper/swiper.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="assets/vendors/vegas/vegas.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/timepicker/timePicker.js"></script>
    <script src="assets/vendors/circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/circleType/jquery.lettering.min.js"></script>




    <!-- template js -->
    <script src="assets/js/delogis.js"></script>
</body>


<!-- Mirrored from bracketweb.com/delogis-html/main-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2024 07:55:49 GMT -->

</html>