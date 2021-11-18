<?php include('partials/_menu.php'); ?>
    <div class="main-container">
        <h1>Ajouter un admin</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="full_name">fullname</label></td>
                    <td><input type="text" name="full_name" id="full_name"></td>
                </tr>
                <tr>
                    <td><label for="user_name">username</label></td>
                    <td><input type="text" name="user_name" id="user_name"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Valider" name="submit" class="btn btn-success">
                        <input type="reset" value="Annuler" name="annuler" class="btn btn-danger">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php include 'partials/_footer.php'?>

    <?php 
        if (isset($_POST['submit'])) {
            // recuperation des données du formulaire soumis & controle de leur contenu
            $full_name = $_POST['full_name'];
            $user_name = $_POST['user_name'];
            $password = md5($_POST['password']);
            // ecrire la requete d'insertion
            $sql = "INSERT INTO tbl_admin(full_name,user_name,password) values(
            '$full_name',
            '$user_name',
            '$password')";
            $res = mysqli_query($cnx,$sql);
            echo $res;
            if ($res === True) {
                $_SESSION['insert'] = "Donnée inserée avec succès";
                header("location:".SITEURL."/admin/admin.php");
            }else {
                $_SESSION['insert'] = "Echec de l'insertion de donnée";
                header("location:".SITEURL."admin/add-admin.php");
            }
          
        }else {
            echo "Formulaire non soumis";
        }

     ?>

