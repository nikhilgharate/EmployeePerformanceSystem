<?php
    $id=$_GET['id'];
    require_once("../config.php");
    $db = new dbObj();
  $conn =  $db->getConnstring();
  mysqli_query($conn,"SET NAMES utf8");
  $sql="select *  from department where ID='$id'";
  $result = mysqli_query($conn,$sql);
  $rows =mysqli_fetch_array($result);
  
    //mysqli_close($conn);
   //print_r($rows);
?>



    <div class="row">

     



       <div class="col-md-6">
                 <div class="form-group">
                    <label for="name" class="control-label"> Name:</label>
                    <input type="text" class="form-control" value="<?php echo $rows['name']; ?>" name="name" required />
                  </div>
        </div>

        



          <div class="col-md-6">
            <div class="form-group">
             <label for="gst" class="control-label">Location :</label>
             <input type="text" class="form-control" value="<?php echo $rows['location']; ?>"  name="location" required />
           </div>
   
         </div>


       
</div>





