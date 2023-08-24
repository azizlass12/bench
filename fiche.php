<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Suivi des Patients</title>
</head>
<body>
    <header>
        <h1>Fiche de Patient</h1>
    </header>
    <main>
        <section class="patient">
            <h2>Patient Préopératoire</h2>
            <div class="patient-details">
                <label for="preop-name">Nom du patient:</label>
                <input type="text" id="preop-name" placeholder="Entrez le nom du patient">
                <label for="preop-condition">État de santé:</label>
                <textarea id="preop-condition" placeholder="Description de l'état de santé"></textarea>
                <button class="save-button">Enregistrer</button>
            </div>
        </section>
        
        <section class="patient">
            <h2>Patient Postopératoire</h2>
            <div class="patient-details">
                <label for="postop-name">Nom du patient:</label>
                <input type="text" id="postop-name" placeholder="Entrez le nom du patient">
                <label for="postop-recovery">Rétablissement:</label>
                <textarea id="postop-recovery" placeholder="Description du rétablissement"></textarea>
                <button class="save-button">Enregistrer</button>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Suivi des Patients</p>
    </footer>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
    color: #333;
}

header {
    background-color: #63e6f1;
    color: #fff;
    text-align: center;
    padding: 1rem 0;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

main {
    padding: 2rem;
}

.patient {
    background-color: #fff;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.patient h2 {
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
}

.patient-details label {
    font-weight: bold;
    display: block;
    margin-bottom: 0.5rem;
}

.patient-details input[type="text"],
.patient-details textarea {
    width: 100%;
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.save-button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 0.8rem 1.5rem;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

.save-button:hover {
    background-color: #0056b3;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1rem 0;
}



    </style>
</body>
</html>

