<?php
include('server.php');

// Start the session if not already started
if (!isset($_SESSION)) {
    session_start();
}

// Sanitize output to prevent XSS attacks
function sanitize_output($data) {
    return htmlspecialchars($data);
}

$username = isset($_SESSION['username']) ? sanitize_output($_SESSION['username']) : '';
$success = isset($_SESSION['success']) ? sanitize_output($_SESSION['success']) : '';
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration system PHP and MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url("../Images/background.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
    }
  </style>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
  <div class="flex justify-center mb-6">
    <img src="../Images/logo.png" alt="Logo" class="h-12 w-12">
    <h1 class="text-3xl font-bold ml-2">coLink</h1>
  </div>

  <div class="mb-4">
    <h2 class="text-xl text-gray-700 font-bold">Login</h2>
  </div>

  <form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <!-- Display success message from registration -->
    <?php if (!empty($success)) : ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p class="font-bold">Success!</p>
            <p><?php echo $success; ?></p>
        </div>
    <?php endif ?>
    <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input id="username" name="username" type="text" value="<?php echo $username; ?>" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" name="password" type="password" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    <fieldset class="mb-4">
      <legend class="text-sm font-medium text-gray-700">Role</legend>
      <div class="flex mt-2">
        <label class="flex items-center mr-4">
          <input type="radio" name="role" value="user" checked class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
          <span class="ml-2">User</span>
        </label>
        <label class="flex items-center">
          <input type="radio" name="role" value="admin" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
          <span class="ml-2">Admin</span>
        </label>
      </div>
    </fieldset>
    <div class="flex items-center justify-between">
        <button type="submit" name="login_user" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
    </div>
    <div class="mt-4 text-center">
        <p class="text-sm">Not yet a member? <a href="register.php" class="text-indigo-600 hover:text-indigo-900">Sign up</a></p>
    </div>
  </form>
</div>

<script src="../script.js"></script>

</body>
</html>