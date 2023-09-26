<?php 
include_once 'config.php';

// DEBUG
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('$output');</script>";
}
// DEBUG

if ( !isset($_POST['email'], $_POST['password']) ) {
	exit('Please fill both the email and password fields!');
}
$admin = 0;
debug_to_console("1");

if ($stmt = $con->prepare("SELECT id, wachtwoord FROM accounts WHERE email = ?")) {
    
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
    debug_to_console("2");
    
    if ($stmt->num_rows > 0) {
        
        $stmt->bind_result($id, $password_hashed);
        $stmt->fetch();
        
        $password = password_verify($_POST['password'], $password_hashed);
        
        if ($password === true ) {
            debug_to_console("3");
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $id;
            
            $stmt2 = $con->prepare("SELECT id, positie_id FROM werknemers WHERE account_id = '$id'");
            $stmt2->execute();
	        $stmt2->store_result();
            $stmt2->bind_result($wid, $positie_id);
            $stmt2->fetch();
            
            $_SESSION['positie_id'] = $positie_id;
            if ($_SESSION['positie_id'] === 2){
                echo 'Welcome ' . $_SESSION['name'] . '!';
                debug_to_console("id: " . $id . " TRUE");  
                header('Location: ../admin/manager.php');
            } elseif ($_SESSION['positie_id'] === 1){
                echo 'Welcome ' . $_SESSION['name'] . '!';
                debug_to_console("id: " . $id . " TRUE");  
                header('Location: ../admin/medewerker.php');
            } else {
                echo 'Welcome ' . $_SESSION['name'] . '!';
                // debug_to_console("id: " . $id); 
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