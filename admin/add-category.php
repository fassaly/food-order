<?php include('partials/_menu.php'); ?>
    <div class="main-container">
        <h1>Ajouter d'une catégory</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="title">Tile : </label></td>
                    <td><input type="text" name="title" id="title" placeholder='ici le titre de la catégorie'></td>
                </tr>
                <tr>
                    <td>
                        <label for="">Image : </label>
                    </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>

                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes">Yes
                        <input type="radio" name="active" id="" value="No">No
                    </td>
                </tr>
                <tr>
               <td></td>
               <td> <input type="submit" value="add category" name="submit" class="btn btn-success">
                    <input type="reset" value="Annuler" name="annuler" class="btn btn-danger">
               </td>
               
                </tr>
              
            </table>
        </form>
    </div>
    <?php include 'partials/_footer.php'?>
    <?php
    // traitement du formulaire
    if (isset($_POST['submit'])) {

        $title = $_POST['title'];

        if (isset($_FILES['image']['name'])) {
            // on a besoin du nom de l'image, la source et la destination de l'image
            $image_name = $_FILES['image']['name'];
            // renommer le nom de l'image
            // recuperation de l'extension de l'image
            $ext = end(explode('.',$image_name));

            // renomer le nom de l'image
            $image_name = "Food_Category_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/".$image_name;

            // uploder l'image 
            $upload = move_uploaded_file($source_path,$destination_path);

            if ($upload == false) {
                $_SESSION['upload_image'] ="Echec du sauvegarde du fichié";
                header('location:'.SITEURLE.'admin/add-category.php');
                die();
            }else {
                # code...
            }

        }else {
            $image_name = "";
        }

        if (isset($_POST['featured'])) {
            $featured =  $_POST['featured'];
        }else {
            $featured =  "No";
        }

        if (isset($_POST['active'])) {
           $active = $_POST['active'];
        } else {
            $active = "No";
        }

        $sql="INSERT INTO tbl_category(id,title,image_name,featured,active) values(
           Null,
            '$title',
            '$image_name',
            '$featured',
            '$active'
            )";
            echo $sql;
        $res = mysqli_query($cnx,$sql);
        if ($res == True) {
          $_SESSION['add_category'] = "Catégorie ajoutée avec succèss";
          header("location:".SITEURL."admin/category-admin.php");
        }else {
            $_SESSION['add_category'] = "Add Failed";
            header("location:".SITEURL."admin/add-category.php");
        }


         echo "formulaire soumis : $title, $featured, $active";
    } else {
        echo "aucune soumission";
    }
   
    ?>
    
