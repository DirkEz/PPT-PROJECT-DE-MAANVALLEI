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
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $id = $result['id'];
        $password_hashed = $result['wachtwoord'];

        if (password_verify($password, $password_hashed)) {
            session_regenerate_id();

            $_SESSION['name'] = $email;
            $_SESSION['id'] = $id;

            $stmt2 = $connect->prepare("SELECT id, positie_id FROM werknemers WHERE account_id = :id");
            $stmt2->bindParam(':id', $id);
            $stmt2->execute();
            $result2 = $stmt2->fetch(PDO::FETCH_ASSOC);

            if ($result2) {
                $positie_id = $result2['positie_id'];
                $_SESSION['positie_id'] = $positie_id;

                if ($positie_id === 2) {
                    $_SESSION['loggedin'] = true;
                    echo 'Welcome ' . $_SESSION['name'] . '!';
                    debug_to_console("id: " . $id . " TRUE");
                    header('Location: ../admin/manager.php');
                    exit;
                } elseif ($positie_id === 1) {
                    $_SESSION['loggedin'] = true;
                    echo 'Welcome ' . $_SESSION['name'] . '!';
                    debug_to_console("id: " . $id . " TRUE");
                    header('Location: ../admin/medewerker.php');
                    exit;
                } else {
                    $_SESSION['loggedin'] = true;
                    echo 'Welcome ' . $_SESSION['name'] . '!';
                    header('Location: ../user/user.php');
                    exit;
                }
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