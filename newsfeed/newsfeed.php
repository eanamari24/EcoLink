<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EcoLink </title>
    <link rel="stylesheet" href="newsfeed.css">
</head>
<style>
    body {
      background-image: url("../Images/background.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      height: 100%;
        }	
    </style>
<body>

<div class="logo">
	<img src="../Images/logo.png" class="logo1">
    <h1> coLink</h1>
</div>


    <nav>
        <div class="nav-left">
            <ul>
                <li><img src="../Images/notif.png" class="icon"></li>
                <li><img src="../Images/inbox.png" class="icon"></li>
                
            </ul>   

        </div>
        <div class="nav-right"></div>

            <div class="search-box">
                <img src="../Images/search.png">
                <input type="text" placeholder="Search">

            </div >
            <div class="nav-user-icon online dropdown">
            <img src="../Images/profile.jpg" alt="User Profile Image">
            <div class="dropdown-content">
        <ul>
            <li><a href="#">Option 1</a></li>
            <li><a href="#">Option 2</a></li>
            <li><a href="../login/login.php">Log Out</a></li>
        </ul>
    </div>
</div>

    </div>
    </nav>

 <script>
// Check if the success message is set in the session
<?php if (isset($_SESSION['success'])) : ?>
    // Display a dialog box with the success message
    alert("<?php echo $_SESSION['success']; ?>");
<?php endif; ?>
// Remove the success message from the session
<?php unset($_SESSION['success']); ?>
</script>

 <div class="post-form">
            <h2>Create Post</h2>
            <!-- Post form for creating new posts -->
            <form action="#" method="post">
                <textarea name="post-content" id="post-content" cols="30" rows="5" placeholder="What's on your mind?"></textarea>
                <button type="submit">Post</button>
            </form>
</div>

        <div class="posts">
            <h2>Recent Posts</h2>
            <!-- Display recent posts from users -->
            <div class="post">
                <h3>Post Title</h3>
                <p>Post content goes here...</p>
            </div>
            <!-- Repeat the above post structure for multiple posts -->
</div>


<script src="script.js>"> </script>

</body>
</html>