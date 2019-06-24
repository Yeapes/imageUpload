<?php include 'inc/header.php'; ?>
<?php include 'lib/config.php';
      include 'lib/Database.php';
      $db = new Database();
      

?>
                <div class="myform">
                    <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        
                        //$permitted = array('jpg','jpeg','png','gif','pdf');
                        $file_name = $_FILES['image']['name'];
                        
                        $file_size = $_FILES['image']['size'];
                        
                        $tmp_name =  $_FILES['image']['tmp_name'];
                        
                       
                        $div = explode('.', $file_name);
                        
                        $file_ext = strtolower(end($div));
                        
                         $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
                        
                        
                        $image_uploaded = "uploads/".$unique_image;
                        
                    
                       // move_uploaded_file($tmp_name, $folder.$file_name);
                    
                       move_uploaded_file($tmp_name, $image_uploaded);
                       
                        $query = "INSERT INTO image(image) VALUES('$image_uploaded')";
                        $inserted_rows = $db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success '>Image inserted Succesfully </span>";
                        }else{
                            echo "<span class='error'>Image insert Failed</span>";
                        }
                
                    }
                    ?>
                    
                    
                    
                   <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Select Image</td>
                                <td><input type="file" name="image"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Upload"></td>
                            </tr>
                            
                        </table>


                    </form>
                </div>
               
<?php include 'inc/footer.php'; ?>