<!DOCTYPE html>
<html lang="en">                    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - LINKUP</title>
    <link rel="stylesheet" href="style.css">                                
</head>                    
<body>             
<form action="includes/deleteformhandler.php" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
    <button type="submit">Delete My Account</button>
</form>
    <h1>My Profile</h1>
    <form action="includes/profilehandler.php" method="POST" enctype="multipart/form-data">
        <label>Bio:</label><br>
        <textarea name="bio" rows="5" cols="40" required></textarea><br><br>

        <label>Profile Picture:</label><br>
        <input type="file" name="profile_pic" accept="image/*" required><br><br>

        <button type="submit" name="save">Save Profile</button>
    </form>

</body>
</html>

