<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--
      - primary meta tag
    -->
    <title>KuRoko - The Best Program to Enroll for Exchange</title>
    <meta name="title" content="KuRoko - The Best Program to Enroll for Exchange">
    <meta name="description" content="This is an education html template made by codewithsadee">

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!--
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
        rel="stylesheet">

    <!--
      - preload images
    -->
    <link rel="preload" as="image" href="./assets/images/hero-bg.svg">
    <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-banner-2.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-shape-1.svg">
    <link rel="preload" as="image" href="./assets/images/hero-shape-2.png">

    <!-- bootstrap -->

    <!-- Custom styles -->
    <style>
        .container ul + ul {
            margin-top: 2px;
        }
    </style>
</head>

<body id="top">


<?php include_once './includes/header.php'?>


<!--#COURSE -->

<section class="section course" id="courses" aria-label="course">
    <div class="container">

        <p class="section-subtitle">Popular Courses</p>

        <h2 class="h2 section-title">Pick A Course To Get Started</h2>

        <ul class="grid-list">

            <li>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-card">
                    <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                        <img src="./assets/images/course-1.jpg.png" width="370" height="220" loading="lazy"
                             alt="Build Responsive Real- World Websites with HTML and CSS" class="img-cover">
                    </figure>

                    <div class="abs-badge">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 Weeks</span>
                    </div>

                    <div class="card-content">

                        <span class="badge">Beginner</span>

                        <h3 type="button" class="h3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <a href="#" class="card-title">The Complete Piano & Music Theory Beginners Course</a>
                        </h3>

                        <div class="wrapper">

                            <div class="rating-wrapper">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>

                            <p class="rating-text">(5/5 Rating)</p>

                        </div>

                        <data class="price" value="29">$29.00</data>

                        <ul class="card-meta-list">

                            <li class="card-meta-item">
                                <ion-icon name="library-outline" aria-hidden="true"></ion-icon>

                                <span class="span">8 Lessons</span>
                            </li>

                            <li class="card-meta-item">
                                <ion-icon name="people-outline" aria-hidden="true"></ion-icon>

                                <span class="span">20 Students</span>
                            </li>

                        </ul>

                    </div>

                </div>
            </li>



            <li>
                <div class="course-card">

                    <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                        <img src="./assets/images/course-2.jpg.png" width="370" height="220" loading="lazy"
                             alt="Java Programming Masterclass for Software Developers" class="img-cover">
                    </figure>

                    <div class="abs-badge">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">8 Weeks</span>
                    </div>

                    <div class="card-content">

                        <span class="badge">Advanced</span>

                        <h3 class="h3">
                            <a href="#" class="card-title">Music Production + Composition in FL Studio</a>
                        </h3>

                        <div class="wrapper">

                            <div class="rating-wrapper">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>

                            <p class="rating-text">(5 /5 Rating)</p>

                        </div>

                        <data class="price" value="49">$49.00</data>

                        <ul class="card-meta-list">

                            <li class="card-meta-item">
                                <ion-icon name="library-outline" aria-hidden="true"></ion-icon>

                                <span class="span">15 Lessons</span>
                            </li>

                            <li class="card-meta-item">
                                <ion-icon name="people-outline" aria-hidden="true"></ion-icon>

                                <span class="span">35 Students</span>
                            </li>

                        </ul>

                    </div>

                </div>
            </li>

            <li>
                <div class="course-card">

                    <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                        <img src="./assets/images/course-3.jpg.png" width="370" height="220" loading="lazy"
                             alt="The Complete Camtasia Course for Content Creators" class="img-cover">
                    </figure>

                    <div class="abs-badge">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                        <span class="span">3 Weeks</span>
                    </div>

                    <div class="card-content">

                        <span class="badge">Intermediate</span>

                        <h3 class="h3">
                            <a href="#" class="card-title">The Complete Piano & Music Theory Beginners Course</a>
                        </h3>

                        <div class="wrapper">

                            <div class="rating-wrapper">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>

                            <p class="rating-text">(5 /5 Rating)</p>

                        </div>

                        <data class="price" value="35">$35.00</data>

                        <ul class="card-meta-list">

                            <li class="card-meta-item">
                                <ion-icon name="library-outline" aria-hidden="true"></ion-icon>

                                <span class="span">13 Lessons</span>
                            </li>

                            <li class="card-meta-item">
                                <ion-icon name="people-outline" aria-hidden="true"></ion-icon>

                                <span class="span">18 Students</span>
                            </li>

                        </ul>

                    </div>

                </div>
            </li>

        </ul>

    </div>
</section>

<?php include_once './includes/footer.php'?>

<script src="./assets/js/script.js" defer></script>

<!--
    - ionicon link
  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
