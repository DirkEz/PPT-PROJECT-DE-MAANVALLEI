<?php 
include_once 'config.php';

// DEBUG
// function debug_to_console($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output)
//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
// DEBUG

if ( !isset($_POST['email'], $_POST['password']) ) {
	exit('Please fill both the email and password fields!');
}
$admin = 0;
// debug_to_console("1");

if ($stmt = $con->prepare("SELECT id, wachtwoord, is_admin FROM accounts WHERE email = ?")) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
    // debug_to_console("2");
    
    if ($stmt->num_rows > 0) {
        
        $stmt->bind_result($id, $password_hashed, $admin);
        $stmt->fetch();
        $password = password_verify($_POST['password'], $password_hashed);
        
        if ($password === true ) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $_SESSION['is_admin'] = $admin;
            // debug_to_console("3");
            if ($_SESSION['is_admin'] === 1){
                echo 'Welcome ' . $_SESSION['name'] . '!';
                header('Location: ../admin/admin.php');
            } else {
                echo 'Welcome ' . $_SESSION['name'] . '!';
                header('Location: ../user/user.php');
            }
        } else {
            echo 'Incorrect username and/or password!';
            echo $password_hashed;
            echo $password;
            echo $_POST['password'];
        }
    } else {
        echo 'Incorrect username and/or password!';
    }

	$stmt->close();
}
?>