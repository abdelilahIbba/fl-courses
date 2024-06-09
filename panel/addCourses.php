<?php
@include "../config.php";

// Debugging function to display errors
function debug($message) {
    echo "<pre>" . htmlspecialchars($message) . "</pre>";
}

// Add courses card
if (isset($_POST['addCourse'])) {
    $course_image = $_FILES['course_image']['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $instructor_id = $_POST['instructor_id'];
    $category_id = $_POST['category_id'];

    if (!empty($course_image) && !empty($title) && !empty($description) && !empty($price) && !empty($instructor_id) && !empty($category_id)) {
        // Destination directory
        $target_dir = "../uploads/";

        // Check if the directory exists, if not, create it
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Check if the file has been uploaded successfully
        if (is_uploaded_file($_FILES['course_image']['tmp_name'])) {
            // Move the uploaded file to the destination directory
            $target_file = $target_dir . basename($course_image);
            if (move_uploaded_file($_FILES['course_image']['tmp_name'], $target_file)) {
                // Insert into database
                $sqlState = $pdo->prepare('INSERT INTO courses(course_image, title, description, price, instructor_id, category_id, created_at, updated_at) VALUES(?,?,?,?,?,?,current_timestamp(),current_timestamp())');
                if ($sqlState->execute([$target_file, $title, $description, $price, $instructor_id, $category_id])) {
                    header('Location: addCourses.php');
                    exit(); // Terminate the script after redirect
                } else {
                    debug("Error inserting into database.");
                }
            } else {
                debug("Error moving the uploaded file.");
            }
        } else {
            debug("File upload failed.");
        }
    } else {
        debug("Please fill in all fields.");
    }
}

// Add categories course
if (isset($_POST['addCategory'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (!empty($name) && !empty($description)) {
        // Insert into database
        $sqlState = $pdo->prepare('INSERT INTO categories (name, description, created_at, updated_at) VALUES (?, ?, current_timestamp(), current_timestamp())');
        if ($sqlState->execute([$name, $description])) {
            header('Location: addCourses.php');
            exit(); // Terminate the script after redirect
        } else {
            debug("Error inserting into database.");
        }
    } else {
        debug("Please fill in all fields.");
    }
}

// Fetch courses for display
$coursesStmt = $pdo->query("SELECT c.course_id, c.course_image, c.title, c.description, c.price, u.username as instructor_name, cat.name as category_name 
                            FROM courses c 
                            JOIN users u ON c.instructor_id = u.user_id 
                            JOIN categories cat ON c.category_id = cat.category_id");
$courses = $coursesStmt->fetchAll();
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
            <h1>Add Courses Cards</h1>
        </div><!-- End Page Title -->
        <div class="col-lg-4">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Add Course</h5>
    <!-- Vertical Form -->
    <form class="row g-3" enctype="multipart/form-data" method="post" action="">
    <div class="col-12">
        <label for="inputCourseImage" class="form-label">Course Image</label>
        <input type="file" class="form-control" name="course_image" accept="image/*">
    </div>
    <div class="col-12">
        <label for="inputTitle" class="form-label">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="col-12">
        <label for="inputDescription" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="col-12">
        <label for="inputPrice" class="form-label">Price</label>
        <input type="number" class="form-control" name="price">
    </div>
    <div class="col-12">
        <label for="inputInstructor" class="form-label">Instructor</label>
        <select class="form-control" name="instructor_id">
            <?php
            $stmt = $pdo->query("SELECT user_id, username FROM users WHERE role = 'instructor'");
            while ($row = $stmt->fetch()) {
                echo "<option value='" . htmlspecialchars($row['user_id']) . "'>" . htmlspecialchars($row['username']) . "</option>";
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
    echo "<option value='" . htmlspecialchars($row['category_id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
}
?>
        </select>
    </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="addCourse">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form><!-- Vertical Form -->
    </div>
    </div>
    </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Courses</h5>
                    <!-- Table with responsive scrollbar -->
                    <div style="overflow-x:auto;">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Instructor</th>
                                <th scope="col">Category</th>
                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($courses as $course): ?>
                                <tr>
                                    <th scope="row"><?php echo htmlspecialchars($course['course_id']); ?></th>
                                    <td><img src="<?php echo htmlspecialchars($course['course_image']); ?>" alt="Course Image" style="width: 100px; height: auto;"></td>
                                    <td><?php echo htmlspecialchars($course['title']); ?></td>
                                    <td><?php echo htmlspecialchars($course['description']); ?></td>
                                    <td><?php echo htmlspecialchars($course['price']); ?>$</td>
                                    <td><?php echo htmlspecialchars($course['instructor_name']); ?></td>
                                    <td><?php echo htmlspecialchars($course['category_name']); ?></td>
                                    <td class="text-center">
                                        <a href="edite.php?course_id=<?php echo $course['course_id'] ?>" class="btn btn-info btn-sm">Edite</a>
                                        <a href="delete.php?course_id=<?php echo $course['course_id'] ?>" onclick="return confirm('Do you really want to delete the client <?php echo $course['title'] ?> ?');" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table><!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="pagetitle">
                <h1>Add Categorys Courses</h1>
            </div><!-- End Page Title -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Course Category</h5>
                        <!-- Vertical Form -->
                        <form class="row g-3" method="post" action="">
                            <div class="col-12">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-12">
                                <label for="inputDescription" class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="addCategory">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Course Categories</h5>

                        <!-- Table -->
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $categoriesStmt = $pdo->query("SELECT category_id, name, description FROM categories");
                            $categories = $categoriesStmt->fetchAll();

                            foreach ($categories as $category): ?>
                                <tr>
                                    <th scope="row"><?php echo htmlspecialchars($category['category_id']); ?></th>
                                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                                    <td><?php echo htmlspecialchars($category['description']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>

        </div>
    </section>
</main><!-- End #main -->

<?php require_once "../includes/footerB.php"; ?>
</body>
</html>

