<?php include 'partials/_menu.php'?>
<?php include 'partials/_menu.php'?>
    <div class="main-container">
        <h1>Ajouter un admin</h1>
        <form action="" method="post">
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

    <?php  ?>

