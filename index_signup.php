<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "afia_zikr";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);

    if (isset($input['checkEmail']) && $input['checkEmail']) {
        $email = $input['email'];
        $stmt = $conn->prepare("SELECT id_fans FROM fans WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        echo json_encode(["exists" => $stmt->num_rows > 0]);
        $stmt->close();
        exit;
    } else {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = password_hash($_POST['passwords'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("SELECT id_fans FROM fans WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header("Location: ./html/index_signup_error.html");
            exit;
        } else {
            $stmt = $conn->prepare("INSERT INTO fans (prenom, nom, email, passwords) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $prenom, $nom, $email, $password);
            $stmt->execute();
            header("Location:  index_login.html");
        }
        $stmt->close();
    }
}

$conn->close();
?>