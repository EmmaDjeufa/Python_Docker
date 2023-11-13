<!DOCTYPE html>
<html>

<head>
    <title>Class Infos</title>
    <style>
        /* Votre style ici ... */
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

            <p>Remplis le formulaire avec des informations valides pour en savoir plus sur tes camarades.</p></br></br></br></br>
            <ul>
                <form action="" method="POST">
                    <label>Quel est ton prénom?</label><br />
                    <input type="text" name="name" placeholder="Ton nom" required><br /><br />

                    <label>Quel âge as-tu?</label><br />
                    <input type="password" name="age" placeholder="Ton age" required/><br /><br/><button type="submit"
                        name="submit">List Students</button></br></br>


                </form>

                <?php
                $listDisplayed = false;  // Variable pour indiquer si la liste doit être affichée

                if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])) {
                    $username = getenv('USERNAME');
                    $password = getenv('PASSWORD');
                    if (empty($username)) $username = 'fake_username';
                    if (empty($password)) $password = 'fake_password';

                    $enteredName = $_POST['name'];
                    $enteredAge = $_POST['age'];

                    $context = stream_context_create(array(
                        "http" => array(
                            "header" => "Authorization: Basic " . base64_encode("$username:$password"),
                        )
                    ));

                    $url = 'http://api:5000/pozos/api/v1.0/get_student_ages';
                    $list = json_decode(file_get_contents($url, false, $context), true);

                    // Vérifier si le nom et l'âge correspondent
                    if (array_key_exists($enteredName, $list["student_ages"]) && $list["student_ages"][$enteredName] == $enteredAge) {
                        echo "<p style='color:green;; font-size: 23px;'>Voici la liste de tes camarades et leurs âges :</p>";
                        foreach ($list["student_ages"] as $key => $value) {
                            echo "- $key is $value years old <br>";
                        }
                            $listDisplayed = true;  // La liste a été affichée avec succès
                        }
                     else {
                        echo '<p class="error-message">Erreur lors de la communication avec le serveur.</p>';
                    }
                }

                ?>
            </ul>
        </div>
        <div class="footer">
            </br></br></br></br></br></br></br>&copy; 2023 Student Checking App. Tout droits réservés.</p>
        </div>
</body>

</html>
