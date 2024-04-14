<?php
include('server.php');
// Ensure session is started
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration system PHP and MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("../Images/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
        }
    </style>
</head>
<body class="flex justify-center items-center h-screen">
<div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
    <div class="flex justify-center mb-4">
        <img src="../Images/logo.png" alt="Logo" class="h-12 w-12">
        <h1 class="text-3xl font-bold ml-2">coLink</h1>
    </div>

    <h2 class="text-xl text-center text-gray-800 font-bold mb-6">Register Here!</h2>

    <form method="post" action="register.php" class="space-y-4">
        <?php include('errors.php'); ?>

        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="password_1" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password_1" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="password_2" class="block text-sm font-medium text-gray-700">Confirm password</label>
            <input type="password" name="password_2" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="flex items-center">
            <label class="flex items-center text-sm text-gray-700">
                <input type="radio" name="role" value="user" checked class="form-radio h-4 w-4 text-indigo-600">
                <span class="ml-2">User</span>
            </label>
            <label class="flex items-center ml-6 text-sm text-gray-700">
                <input type="radio" name="role" value="admin" class="form-radio h-4 w-4 text-indigo-600">
                <span class="ml-2">Admin</span>
            </label>
        </div>

        <div>
            <button type="submit" name="reg_user" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
        </div>

        <p class="text-center text-sm text-gray-600">
            Already a member? <a href="login.php" class="text-indigo-600 hover:text-indigo-900">Sign in</a>
        </p>
    </form>
</div>
</body>
</html>