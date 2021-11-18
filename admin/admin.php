<?php include 'partials/_menu.php'?>
    <div class="main-container">
        <h1>Liste des admin </h1> <br>
        <a href="add-admin.php" class="btn btn-primary">Ajouter un admin </a>
       <br><br>
       <?php 
        if (isset($_SESSION['insert'])) {?>           
       <div class="message">

           <span><?php echo $_SESSION['insert'] ?></span>
       </div>
       <?php 
        }
        ?>
       
        <table>
            <tr>
            <th>#</th>
            <th>Full name</th>
            <th>Username</th>
            <th>Action</th>
            </tr>

            <?php
            // ecriture de la requette
            $sql = "select * from tbl_admin ";
            // execution de la requette
            $res = mysqli_query($cnx,$sql);
            if ($res==TRUE) {
                while ($rows= mysqli_fetch_assoc($res)) {
                    $id =  $rows['id'];
                    $full_name =  $rows['full_name'];
                    $user_name =  $rows['user_name'];                                        
                    ?>
                    <tr>
                        <td> <?php echo $id; ?></td>
                        <td> <?php echo $full_name; ?></td>
                        <td> <?php echo $user_name; ?></td>
                        <td>
                            <a href="" class="btn btn-success">Update admin</a>
                            <a href="" class="btn btn-danger">Delete admin</a>
                        </td>
                    </tr>

<?php
                }
            }

            ?>
        </table>
    </div>
    <?php include 'partials/_footer.php'?>