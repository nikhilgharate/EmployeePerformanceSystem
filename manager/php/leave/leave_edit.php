<?php
    $id=$_GET['id'];
    require_once("../config.php");
    $db = new dbObj();
  $conn =  $db->getConnstring();
  mysqli_query($conn,"SET NAMES utf8");
  $sql="select *  from `leave` where ID='$id'";
  $result = mysqli_query($conn,$sql);
  $rows =mysqli_fetch_array($result);
  
    //mysqli_close($conn);
   //print_r($rows);
?>



    <div class="row">

     


       <div class="col-md-12">
            <div class="form-group">
             <label for="gst" class="control-label">Approval :</label>

             <select class="form-control" required name="answer">
                <option <?php if($rows['answer']=="Success"){echo "selected";} ?>>Success</option>
                <option <?php if($rows['answer']=="Discard"){echo "selected";} ?>>Discard</option>
                <option <?php if($rows['answer']=="Pending"){echo "selected";} ?>>Pending</option>
             </select>
             
             
           </div>
   
         </div>

        
        
         
</div>





