<!DOCTYPE html>
<html lang="en">
<head>
    <title>Remeber ME Logout</title>
    <link rel="stylesheet" href="../layer/layout.css">
</head>
<body>
    <?php
    if (isset($_COOKIE['auth_cookie']) && $_COOKIE['auth_cookie'] == 'authenticated') {
        
        echo '<p>Do you want to keep your login information?</p>';
        echo '<form method="post" action="./remoutpro.php">';
        echo '<label for="keep">Keep</label>';
        echo '<input type="radio" name="option" value="keep" id="keep" required>';
    
        echo '<label for="delete">Delete</label>';
        echo '<input type="radio" name="option" value="delete" id="delete" required>';
    
        echo '<input type="submit" name="submit" value="Logout">';
        echo '</form>';
    } else {
        
        echo '<p>You are not logged in.</p>';
    }

    ?>

</body>
</html>