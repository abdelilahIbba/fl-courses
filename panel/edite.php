<?php
ob_start(); // Start output buffering
require_once '../config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard - Add Courses</title>
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="../assets/css/panel.css" rel="stylesheet">
</head>
<body>
<?php require_once "../includes/headerB.php"; ?>

<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="pagetitle">
                <h1>Edit Course</h1>
            </div><!-- End Page Title -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Course</h5>
                        <?php
                        $id = $_GET['course_id'];
                        $sqlState = $pdo->prepare('SELECT * FROM courses WHERE course_id=?');
                        $sqlState->execute([$id]);
                        $course = $sqlState->fetch(PDO::FETCH_ASSOC);

                        if (isset($_POST['editCourse'])) {
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $instructor_id = $_POST['instructor_id'];
                            $category_id = $_POST['category_id'];
                            $course_image = $_FILES['course_image'];

                            if (!empty($title) && !empty($description) && !empty($price)) {
                                if ($course_image['error'] == 0) {
                                    $imagePath = '../uploads/' . basename($course_image['name']);
                                    move_uploaded_file($course_image['tmp_name'], $imagePath);
                                }

                                $sqlState = $pdo->prepare('UPDATE courses
                                                           SET title = ?, description = ?, price = ?, instructor_id = ?, category_id = ?
                                                           WHERE course_id = ?');
                                $sqlState->execute([$title, $description, $price, $instructor_id, $category_id, $id]);
                                header('location: addCourses.php');
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Title, description, and price are required.</div>';
                            }
                        }
                        ?>
                        <!-- Vertical Form -->
                        <form class="row g-3" enctype="multipart/form-data" method="post" action="">
                            <div class="col-12">
                                <label for="inputCourseImage" class="form-label">Course Image</label>
                                <input type="file" class="form-control" name="course_image" accept="image/*">
                            </div>
                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($course['title']); ?>">
                            </div>
                            <div class="col-12">
                                <label for="inputDescription" class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3"><?php echo htmlspecialchars($course['description']); ?></textarea>
                            </div>
                            <div class="col-12">
                                <label for="inputPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" value="<?php echo htmlspecialchars($course['price']); ?>">
                            </div>
                            <div class="col-12">
                                <label for="inputInstructor" class="form-label">Instructor</label>
                                <select class="form-control" name="instructor_id">
                                    <?php
                                    $stmt = $pdo->query("SELECT user_id, username FROM users WHERE role = 'instructor'");
                                    while ($row = $stmt->fetch()) {
                                        echo "<option value='" . htmlspecialchars($row['user_id']) . "' " . ($row['user_id'] == $course['instructor_id'] ? 'selected' : '') . ">" . htmlspecialchars($row['username']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputCategory" class="form-label">Category</label>
                                <select class="form-control" name="category_id">
                                    <?php
                                    $stmt = $pdo->query("SELECT category_id, name FROM categories");
                                    while ($row = $stmt->fetch()) {
                                        echo "<option value='" . htmlspecialchars($row['category_id']) . "' " . ($row['category_id'] == $course['category_id'] ? 'selected' : '') . ">" . htmlspecialchars($row['name']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="editCourse">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<?php require_once "../includes/footerB.php"; ?>
</body>
</html>

<?php
ob_end_flush(); // Flush output buffer
?>