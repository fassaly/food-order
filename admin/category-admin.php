<?php include 'partials/_menu.php'?>
    
       <h1>Catégory</h1>
       <br>
       <a href="add-category.php" class="btn btn-primary">Ajouter une catégorie </a>
       <br><br>
       <div class="container">
          <table>
             <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image </th>
                <th>Feaature</th>
                <th>Active</th>
                <th>Action</th>
             </tr>
             <?php 
             $sql = "select * from tbl_category";
             $res = mysqli_query($cnx,$sql);
             if ($res==true) {
              
                   while ($row = mysqli_fetch_assoc($res)) {
                     $id = $row['id'];
                      $title = $row['title'];
                      $image_name =  $row['image_name'];
                      $feature = $row['featured'];
                      $active = $row['active']; 
                      ?>

               <tr>
                              <td><?php echo $id; ?></td>
                              <td><?php echo $title;  ?></td>
                              <td>
                                 <?php 
                                 if ($image_name!="") {?>
                                    <img src="<?php  echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="" width="100px">
                                    <?php 
                                     }
                                   ?>
                              </td>
                              <td><?php echo $feature; ?></td>
                              <td><?php echo $active; ?></td>
                              <td>
                                 <a href="" class="btn btn-success">Update admin</a>
                                 <a href="" class="btn btn-danger">Delete admin</a>
                              </td>
                              
                </tr>
                  <?php   }
             }
             ?>
            
            
            
          </table>
       </div>
   
    <?php include 'partials/_footer.php'?>