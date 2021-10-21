<?php
    include "head.inc.php";
?>
<body>
    <?php
        include "nav.inc.php";
    ?>

<?php
$email = $errorMsg = ""; 
$success = true;
    
if (empty($_POST["email"])) 
{ 
    $errorMsg .= "Email is required.<br>";
    $success = false;
} 
    
else
{ 
    $email = sanitize_input($_POST["email"]); 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    { 
        $errorMsg .= "Invalid email format.<br>"; 
        $success = false;
    }
}

if (empty($_POST["lname"]))
{
    $errorMsg .= "Last name is required.<br>";
    $success = false;
}

if (empty($_POST["pwd"]))
{
    $errorMsg .= "Password is required.<br>";
    $success = false;
}

if (empty($_POST["pwd_confirm"]))
{
    $errorMsg .= "Password confirmation is required.<br>";
    $success = false;
}

if ($_POST["pwd"] != $_POST["pwd_confirm"]) 
{
    $errorMsg .= "Passwords do not match.<br>";
    $success = false;
}

$password = $_POST["pwd"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// var_dump($hashed_password);

if ($success) 
{ 
    echo "<div class='jumbotron text-center'>";
    echo "<h2>Registration successful!</h2>"; 
    echo "<p>Email: " . $email; 
    echo "<p>Password: " .$hashed_password;
    echo "<p>Good luck with that!</p>";
}

else
{ 
    echo "<div class='jumbotron text-center'>";
    echo "<h2>Registration unsuccessful...</h2>";
    echo "<h4>listed below are your form filling errors :/</h4>"; 
    echo "<p>" . $errorMsg . "</p>";

}

function sanitize_input($data) 
{    
    $data = trim($data);   
    $data = stripslashes($data);    
    $data = htmlspecialchars($data);   
    return $data; 
} 
?>

<?php
    include "footer.inc.php";
?>
</body>