<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>KuRoko - Courses</title>
    <meta name="title" content="KuRoko - The Best Program to Enroll for Exchange">
    <meta name="description" content="This is an education html template made by codewithsadee">

    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <link rel="preload" as="image" href="./assets/images/hero-bg.svg">
    <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-banner-2.jpg">
    <link rel="preload" as="image" href="./assets/images/hero-shape-1.svg">
    <link rel="preload" as="image" href="./assets/images/hero-shape-2.png">

    <style>
        .container ul + ul {
            margin-top: 2px;
        }
    </style>
</head>

<body id="top">

<?php include_once './includes/header.php'?>

<section class="section course" id="courses" aria-label="course">
    <div class="container">

        <p class="section-subtitle">Popular Courses</p>
        <h2 class="h2 section-title">Pick A Course To Get Started</h2>

        <ul class="grid-list">

            <li>
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

                        <h3 type="button" class="h3" data-bs-toggle="modal" data-bs-target="#courseModal"
                            data-title="The Complete Piano & Music Theory Beginners Course"
                            data-description="Learn the basics of piano and music theory."
                            data-instructor="John Doe"
                            data-category="Music Theory"
                            data-price="29"
                            data-video-url="https://example.com/videos/music_theory_intro.mp4">
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

            <!-- Repeat similar blocks for other courses -->

        </ul>

    </div>
</section>

<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="courseModalLabel">Course Title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="courseDescription">Course description goes here.</p>
                <p><strong>Instructor:</strong> <span id="courseInstructor">Instructor Name</span></p>
                <p><strong>Category:</strong> <span id="courseCategory">Course Category</span></p>
                <p><strong>Price:</strong> <span id="coursePrice">$0.00</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="./Payment.php" class="btn btn-primary">Enroll</a>
            </div>
        </div>
    </div>
</div>

<?php include_once './includes/footer.php'?>

<!--
  - #BACK TO TOP
-->

<?php include_once './includes/backtotop.php'?>

<script src="./assets/js/script.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
    const courseModal = document.getElementById('courseModal');
    courseModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        const title = button.getAttribute('data-title');
        const description = button.getAttribute('data-description');
        const instructor = button.getAttribute('data-instructor');
        const category = button.getAttribute('data-category');
        const price = button.getAttribute('data-price');
        const videoUrl = button.getAttribute('data-video-url');

        const modalTitle = courseModal.querySelector('.modal-title');
        const modalDescription = courseModal.querySelector('#courseDescription');
        const modalInstructor = courseModal.querySelector('#courseInstructor');
        const modalCategory = courseModal.querySelector('#courseCategory');
        const modalPrice = courseModal.querySelector('#coursePrice');

        modalTitle.textContent = title;
        modalDescription.textContent = description;
        modalInstructor.textContent = instructor;
        modalCategory.textContent = category;
        modalPrice.textContent = `$${price}.00`;
    });
</script>

</body>

</html>
