<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// Define allowed admin usernames and maximum number of admins
$allowed_admins = array("admin1", "admin2"); // Add your allowed admin usernames here
$max_admins = 1; // Set the maximum number of admins allowed


// Get the current number of admins
$query = "SELECT COUNT(*) AS admin_count FROM users WHERE role='admin'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$current_admin_count = $row['admin_count'];


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $role = mysqli_real_escape_string($db, $_POST['role']); // Get the selected role

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

  if ($role == 'admin') {
    // Check if the maximum admin limit has been reached
    if ($current_admin_count >= $max_admins) {
        array_push($errors, "Maximum number of admin users reached");
    }
  }

// Check if username already exists
$stmt = $db->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
    if ($stmt->num_rows > 0) {
        array_push($errors, "Username already exists");
    }
$stmt->close();

// Check if email already exists
$stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
    if ($stmt->num_rows > 0) {
    array_push($errors, "Email already exists");
    }
$stmt->close();

// Register user if there are no errors in the form
if (count($errors) == 0) {
  $password = md5($password_1); // encrypt the password before saving in the database
  $query = "INSERT INTO users (username, email, password, role) VALUES('$username', '$email', '$password', '$role')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "Account created successfully. Please log in."; // Set success message
  header('location: login.php');
  exit(); // Terminate script
}

}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $role = mysqli_real_escape_string($db, $_POST['role']);

  if (empty($username)) {
      array_push($errors, "Username is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
      $results = mysqli_query($db, $query);

      if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['role'] = $role; // Store role in session

          if ($role == 'admin') {
              header('location: dashboard.php');
          } else {
              header('location: newsfeed.php');
          }
      } else {
          array_push($errors, "Wrong username/password combination or invalid role");
      }
  }
}

// LOGOUT USER
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
