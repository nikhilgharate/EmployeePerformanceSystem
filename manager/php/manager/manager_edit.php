<?php
    $id=$_GET['id'];
    require_once("../config.php");
    $db = new dbObj();
  $conn =  $db->getConnstring();
  mysqli_query($conn,"SET NAMES utf8");
  $sql="select *  from user where ID='$id'";
  $result = mysqli_query($conn,$sql);
  $rows =mysqli_fetch_array($result);
  
    //mysqli_close($conn);
   //print_r($rows);
?>



    <div class="row">


      <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Name:</label>
                    <input type="text" value="<?php echo $rows['name']; ?>" class="form-control" name="name" required />
                  </div>
        </div>



       <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label">User Name:</label>
                    <input type="text" value="<?php echo $rows['user_name']; ?>" class="form-control" name="user_name" required />
                  </div>
        </div>


        <div class="col-md-6">
                  <div class="form-group">
                    <label for="mobile" class="control-label">Contact:</label>
                    <input type="text" value="<?php echo $rows['mobile']; ?>" class="form-control"  name="mobile"/>
                  </div>
       </div>
        
         <div class="col-md-6">
          <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" value="<?php echo $rows['email']; ?>" class="form-control"  name="email" required />
                  </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
                    <label class="control-label">Address</label>
                    <input type="text" value="<?php echo $rows['address']; ?>" class="form-control"  name="address" required />
                  </div>
          </div>


         <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Gender</label>
                    <select class="form-control"  name="gender" required >
                      <option value="">..Select..</option>
                      <option value="Male" <?php if($rows['gender']=="Male"){echo "selected";} ?>>Male</option>
                      <option value="Female" <?php if($rows['gender']=="Female"){echo "selected";} ?>>Female</option>
                    </select>
                  </div>
          </div>


           <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Department</label>
                    <select class="form-control"  name="dept_id" required >
                      <option value="">..Select..</option>


<?php 

$result=mysqli_query($conn,"select * from department");
while($rows1=mysqli_fetch_assoc($result)){ ?>

                      <option value="<?php echo $rows1['ID']; ?>" <?php if($rows['dept_id']==$rows1['ID']){echo "selected";} ?>><?php echo $rows1['name']; ?></option>
                      
<?php } ?>



                    </select>
                  </div>
          </div>

          


             
 


          <div class="col-md-6">
            <div class="form-group">
             <label for="gst" class="control-label">Password :</label>
             <input type="text" value="<?php echo $rows['password']; ?>" class="form-control"  name="password" required />
           </div>
   
         </div>








     






         <div class="col-md-6">
            <div class="form-group">
             <label for="gst" class="control-label"> Status :</label>

 <select name="active" required class="form-control">
   <option value="0" <?php if($rows['active']==0){echo "selected";} ?>>De-Active</option>
   <option value="1" <?php if($rows['active']==1){echo "selected";} ?>>Active</option>
 </select>

            
           </div>
   
         </div>
</div>





