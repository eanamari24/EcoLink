
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
body {
  background-image: url("Images/background.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  height: 100%;
	}
</style>
<body>

<div class="logo">
	<img src="Images/logo.png" class="logo1">
    <h1> coLink</h1>
</div>

<div class="header">
	<h2>Home Page</h2>
</div>

<div class="content">
        <!-- Display success message -->
        <?php if (isset($success_message)) : ?>
            <div class="error success">
                <h3><?php echo $success_message; ?></h3>
            </div>
        <?php endif ?>
    </div>


</div>

</body>
</html>