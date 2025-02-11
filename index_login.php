<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "afia_zikr";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'email envoyé par le formulaire
$email = $_POST['email'];

// Requête SQL pour vérifier si l'email existe déjà
$sql = "SELECT * FROM fans WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // L'email existe déjà, on redirige vers le formulaire avec un message d'erreur
    header("Location: ./html/index.html"); // Page de remerciement

    exit();
} else {
    // L'email est unique, on peut insérer l'utilisateur dans la base de données
    // ... (code pour insérer l'utilisateur)
    header("Location: ./html/login_error.html");

    exit();
}

// $conn->close();
