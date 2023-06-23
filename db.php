<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class MyDatabase
{
    public $pdo;
    function connect_to_db()
    {
        $serveur = "localhost";
        $dbname = "meetics";
        $user = "root";
        $pass = "";
        try {
            $this->pdo = new PDO("mysql:host=$serveur;dbname=$dbname", "$user", "$pass");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
        }
    }

    function add_user_to_db($nom, $prenom, $genre, $email, $date_de_naissance, $pays, $ville, $adresse, $zipcode, $mot_de_passe)
    {
        try {
            $query = "INSERT INTO users(nom, prenom, genre, email, date_de_naissance, pays, ville, adresse, zipcode, mot_de_passe) VALUES(:nom, :prenom, :genre, :email, :date_de_naissance, :pays, :ville, :adresse, :zipcode, :mot_de_passe)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':genre' => $genre,
                ':email' => $email,
                ':date_de_naissance' => $date_de_naissance,
                ':pays' => $pays,
                ':ville' => $ville,
                ':adresse' => $adresse,
                ':zipcode' => $zipcode,
                ':mot_de_passe' => password_hash($mot_de_passe, PASSWORD_DEFAULT)
            ));
            header("Location:../index.php?status=success");
        } catch (PDOException $e) {
            echo "General Error: C'EST CA " . $e->getMessage();
            //header("Location:..//index.php?status=error");
        }
    }

    function update_user($email, $pays, $ville, $adresse, $zipcode, $id)
    {
        try {

            $query = "UPDATE users SET email = :email, pays = :pays, ville = :ville, adresse = :adresse, zipcode = :zipcode WHERE id = $id";
            echo $query;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(
                ':email' => $email,
                ':pays' => $pays,
                ':ville' => $ville,
                ':adresse' => $adresse,
                ':zipcode' => $zipcode,
            ));
            header("Location:../my_account.php?status=success");
        } catch (PDOException $e) {
            echo "General Error: C'EST CA " . $e->getMessage();
            //header("Location:..//index.php?status=error");
        }
    }

    function add_user_profil($id, $image)
    {
        try {
            $query = "INSERT INTO user_profil(id_user, profil_pic) VALUES(:id, :image)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(
                ':id' => $id,
                ':image' => $image,
            ));
            header("Location:../index.php?status=success");
        } catch (PDOException $e) {
            echo "General Error: " . $e->getMessage();
            //header("Location:..//index.php?status=error");
        }
    }
    function match_query($genre, $poids)
    {
        $id = $_SESSION["id"];
        $query = "DELETE FROM `user_settings` where id_user = $id; INSERT INTO user_settings VALUES ($id, :genre, :poids);";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(
            ':genre' => $genre,
            ':poids' => $poids,
        ));
        header("Location:../fight.php");
    }
    function like_query($target_id, $user_id)
    {
        $query = "INSERT INTO user_like values(:target_id, :user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(
            ':target_id' => $target_id,
            ':user_id' => $user_id,
        ));
    }

    function dislike_query($target_id, $user_id)
    {
        $query = "INSERT INTO user_dislike values(:target_id, :user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(
            ':target_id' => $target_id,
            ':user_id' => $user_id,
        ));
    }

    function delete_account($id)
    {
        echo "UPDATE `users` SET `statut` = '0' WHERE `users`.`id` = $id";
        $query = "UPDATE `users` SET `statut` = '0' WHERE `users`.`id` = :id; ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(
            ':id' => $id,
        ));
    }

    function match_row()
    {
        $id = $_SESSION["id"];
        $query = "SELECT * FROM user_like l left join users on l.target = users.id WHERE l.id = $id AND EXISTS (SELECT $id FROM user_like l2 WHERE l2.id = l.target and  l2.target = l.id) AND statut = 1;";
        $result = $this->pdo->query($query);
        foreach ($result as $row) {
            $prenom = $row["prenom"];
            $id = $row["id"];
            $poids = $row["poids"];
            $lastname = $row["nom"];
            $age = new DateTime($row["date_de_naissance"]);
            $today = new DateTime(date('Y-m-d'));
            $age = $today->diff($age);
            $age = intval($age->y);
?>
            <div class="match_name"><?php echo "$prenom $lastname $poids $age ans" ?></div>
            <img class="card_img" src="users/<?= $id ?>.png" alt="<?= $prenom ?>">
            <div class="matching_tools">
                <div class="match talk"><i class="fa-sharp fa-solid fa-comments"></i></div>
                <div class="unmatch"><i class="fa-solid fa-ban"></i></div>
            </div>
            </div>
        <?php
        }
    }

    function match()
    {
        $id = $_SESSION["id"];
        $pref = "SELECT pref_genre, pref_poids FROM `users` 
        left join user_settings on id = user_settings.id_user 
        WHERE id = $id;";
        $pref = $this->pdo->query($pref);
        $pref = $pref->fetch(PDO::FETCH_ASSOC);
        // here! as simple as that

        $genre = $pref['pref_genre'];
        $poids = $pref['pref_poids'];
        $query = "SELECT *,u2.id,u2.nom
        FROM users u1,users u2
        WHERE NOT EXISTS(SELECT *
                         FROM user_like f
                         WHERE f.id = u1.id AND
                               f.target = u2.id) 
                               AND NOT EXISTS(SELECT *
                         FROM user_dislike fd
                         WHERE fd.id_dislike = u1.id AND
                               fd.target_dislike = u2.id)
        AND u1.id != u2.id
        AND u1.id = $id
        AND u2.genre LIKE \"$genre\" AND u2.poids LIKE \"$poids\" 
        AND u2.statut = 1
        ORDER BY RAND()";
        $result = $this->pdo->query($query);

        $query_count = "SELECT count(*) FROM `users` left join user_profil on id = user_profil.id_user left join user_settings on id = user_settings.id_user WHERE id != $id AND genre LIKE \"$genre\" AND poids LIKE \"$poids\" AND statut = 1";
        $result_count = $this->pdo->query($query_count);
        $number_of_rows = $result_count->fetchColumn();
        if ($number_of_rows <= 0) {
            header("Location:settings.php");
        } else {
            $fighters_name = [];
            $fighters_id = [];
            $fighters_poids = [];
            $fighters_age = [];
            $fighters_lastname = [];
            foreach ($result as $row) {
                $prenom = $row["prenom"];
                $id = $row["id"];
                $poids = $row["poids"];
                $lastname = $row["nom"];
                $age = new DateTime($row["date_de_naissance"]);
                $today = new DateTime(date('Y-m-d'));
                $age = $today->diff($age);
                $age = intval($age->y);
                array_push($fighters_name, $prenom);
                array_push($fighters_id, $id);
                array_push($fighters_poids, $poids);
                array_push($fighters_lastname, $lastname);
                array_push($fighters_age, $age);
            }

        ?><script>
                var fighters_name = <?php echo json_encode($fighters_name); ?>;
                var fighters_id = <?php echo json_encode($fighters_id); ?>;
                var fighters_poids = <?php echo json_encode($fighters_poids); ?>;
                var fighters_lastname = <?php echo json_encode($fighters_lastname); ?>;
                var fighters_age = <?php echo json_encode($fighters_age); ?>;
            </script>
            <script src="script/match.js"></script>
<?php
        }
    }

    function remove_user_profil($id)
    {
        try {
            $query = "DELETE FROM user_profil WHERE id_user = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(
                ':id' => $id,
            ));
            header("Location:../index.php?status=success");
        } catch (PDOException $e) {
            echo "General Error: " . $e->getMessage();
            //header("Location:..//index.php?status=error");
        }
    }
    function verify_users()
    {
        $pass = $_POST["mot_de_passe"];
        $email = $_POST["email"];
        $query = "SELECT mot_de_passe from users where email = \"$email\" AND statut = 1";
        $result = $this->pdo->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $hash = $row["mot_de_passe"];
        if (password_verify($pass, $hash)) {
            session_start();
            $query = "SELECT * from users where email = \"$email\"";
            $result = $this->pdo->query($query);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $_SESSION['loggedin'] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: ../my_account.php");
        } else {
            header("Location: ../404.php");
        }
    }
}

$db = new MyDatabase();
$db->connect_to_db();
