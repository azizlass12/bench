<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateN = $_POST['dateN'];
$cin = $_POST['cin'];
$tel = $_POST['tel'];
$genre = $_POST['genre'];
$role =$_POST['role'];

$email = $_POST['email'];
$password = $_POST['password'];


// Hacher le mot de passe avec bcrypt
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO inscription (nom, prenom, dateN, cin, tel, genre, role, email,  password)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $nom, $prenom, $dateN, $cin, $tel, $genre, $role, $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Inscription Successfully...";
    } else {
        // Afficher l'erreur spécifique en cas de problème
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>




