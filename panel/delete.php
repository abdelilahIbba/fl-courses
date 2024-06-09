<?php
require_once '../config.php';
$id = $_GET['course_id'];
$sqlState = $pdo->prepare('DELETE FROM courses WHERE course_id = ?');
$supprime = $sqlState->execute([$id]);
header('Location: addCourses.php');