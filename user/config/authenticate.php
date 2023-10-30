<?php 
include_once 'config.php';
session_start();
// DEBUG
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('$output');</script>";
}
// DEBUG

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $connect->prepare("SELECT id, wachtwoord FROM accounts WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
        $password_hashed = $row['wachtwoord'];

        if (password_verify($password, $password_hashed)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $email;
            $_SESSION['id'] = $id;

            $stmt2 = $connect->prepare("SELECT id, positie_id FROM werknemers WHERE account_id = :id");
            $stmt2->bindParam(':id', $id);
            $stmt2->execute();
            $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            $wid = $row2['id'];
            $positie_id = $row2['positie_id'];
            $_SESSION['admin-id'] = $positie_id;
            echo $_SESSION['admin-id'];
            if ($positie_id === 2) {
                echo 'Welcome ' . $_SESSION['name'] . '!';
                debug_to_console("id: " . $id . " TRUE");
                header('Location: ../admin/manager.php');
            } elseif ($positie_id === 1) {
                echo 'Welcome ' . $_SESSION['name'] . '!';
                debug_to_console("id: " . $id . " TRUE");
                header('Location: ../admin/medewerker.php');
            } else {
                echo 'Welcome ' . $_SESSION['name'] . '!';
                header('Location: ../user/user.php');
            }
        } else {
            echo 'Incorrect username and/or password!';
        }
    } else {
        echo 'Incorrect username and/or password!';
    }
} else {
    exit('Please fill both the email and password fields!');
}
?>
