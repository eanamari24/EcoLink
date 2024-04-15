<?php
include('../server/server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?> (Admin)</h1>
        <nav>
            <ul>
                <li><a href="#">Manage Users</a></li>
                <li><a href="#">Manage Posts</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="../login/login.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Add admin-specific content here -->
        <p>This is the admin dashboard. You can manage users, posts, and settings from here.</p>
    </main>

    <footer>
        <p>&copy; 2024 ECOLINK.</p>
    </footer>
</body>
</html>
