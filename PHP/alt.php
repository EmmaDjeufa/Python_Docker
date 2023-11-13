<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Info</title>
    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/1455518673/fr/vectoriel/rayures-ondul%C3%A9es-abstraites-sur-fond-blanc-isol%C3%A9es-art-de-la-ligne-donde-conception.jpg?s=612x612&w=0&k=20&c=6-DGd0ipRmCIGjaT8WaQMBkW0ksq1ayODCKdFUClumU=');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .menu-bar {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px;
            display: flex;
            gap: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .menu-bar a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .item1 {
            text-align: center;
            color: #000000;
        }

        .footer {
            text-align: center;
            color: #000000;
            margin-top: 20px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            background-color: #000000;
            color: #808080;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: white;
        }

        /* Styles pour le lien du site statique */
        .static-site-link {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }

        .static-site-link:hover {
            text-decoration: underline;
        }

        input {
            padding: 10px;
            margin: 5px;
            font-size: 16px;
        }

        .error-message {
            color: red;
            font-size: 25px;
        }

        /* Ajout de la règle pour tripler la taille de police des noms */
        ul li {
            font-size: 500px; /* 16px * 3 = 48px */
        }
    </style>
</head>

<body>
     <div class="menu-bar">
        <!-- Bouton pour retourner à la page d'accueil -->
        <a href="http://localhost:81" class="static-site-link" title="Retour à la page d'accueil"><button type="submit"
                name="submit">Accueil</button></a>
        <!-- Bouton pour lister les étudiants -->

    </div>

    <div class="container">
        <div class="header">
           
        </div>
        <div class="item1">
            <h2>Tu êtes en ING3 ICC ?</h2>

            <p>Remplis le formulaire pour ajouter un camarade sur la liste.</p></br></br></br></br>
            <ul>
                <form action="" method="POST">
                    <label for="newName">Quel est son nom?:</label><br />
                    <input type="text" name="newName" placeholder="Nom" required /><br /><br />

                    <label for="newAge">Son âge?</label><br />
                    <input type="text" name="newAge" placeholder="Age" required /><br /><br />

                    <button type="submit" name="addStudent">Add Student</button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addStudent'])) {
                    $newName = $_POST['newName'];
                    $newAge = $_POST['newAge'];

                    // Charger le contenu du fichier JSON depuis l'API
                    $jsonData = file_get_contents('http://api:5000/pozos/api/v1.0/get_student_ages');
                    
                    if ($jsonData === false) {
                        echo '<p class="error-message">Erreur lors de la récupération des données depuis l\'API.</p>';
                    } else {
                        // Décoder le JSON en un tableau associatif
                        $students = json_decode($jsonData, true);

                        // Ajouter le nouvel étudiant au tableau
                        $students[$newName] = $newAge;

                        // Encoder le tableau en JSON
                        $jsonUpdated = json_encode($students);

                        // Écrire le JSON mis à jour dans le fichier
                        file_put_contents('ttp://api:5000/pozos/api/v1.0/get_student_ages/student_age.json', $jsonUpdated);

                        // Message de confirmation
                        echo '<p>Étudiant ajouté avec succès.</p>';
                    }
                }
                ?>
            </ul>
        </div>
        <div class="footer">
            </br></br></br></br><p>&copy; 2023 Student Checking App. Touts droits réservés.</p>
        </div>
    </div>
</body>

</html>
