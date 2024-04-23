<?php 
require('./database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
   .content{
        height: 300px;
        border-color:#4376A3;
        border-style: solid;
        border-width: 1px  1px 1px 1px;
        box-shadow: 0px 5px 1px 2px lightslategray;
        border-radius: 20px 20px 20px 20px;
    
       }  .scroll{
        overflow-y: scroll;
        max-height:360px;
        
       }
    
    </style>
</head>
<body>
   <form action="./update.php " method="post">
   <div class=" row container-fluid  ms-2 mt-3 "  >
   <div class="ms-5 col-11 content text-center" style="height: 500px;margin-bottom:130px" >
       <p class="mt-3 fw-normal fs-2" style="font-style: italic;font-size:larger;color:#4376A3">Happening Now</p>
         <div class=" table"   style="max-height: 430px;overflow-y:scroll ">
          <table class="table table-striped ">
         <thead style="background-color:#0e2238; color:white">
            <th>Laboratory</th>
            <th>Course & Section</th>
            <th>Event or Class</th>
            <th>Status</th>
            <th>Faculty Name</th>
         </thead>
         <tbody>
          <tr>


          </tr>
         </tbody>

          </table>
 
         </div>
       </div>
    
       <div class="ms-2 mb-3 col-7  content">
       <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Numbers of Monthly User</p>
       <canvas> </canvas>
       </div>
       <div class="ms-4 mb-3 col-sm content" >
       <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Pendings</p>
         <div class="scroll">

         </div>
       </div>
       
    <div class="row ms-2">
      <div class="ms-3 col-8 content ">
      <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Under Maintenance</p>
        <div class="scroll">
            
        </div>
       
      </div>
      
       <div class="ms-3 col-sm content">
       <p class="mt-3 fw-normal" style="font-style: italic;font-size:larger;color:#4376A3">Recent Activity</p>
        <div class="" style="max-height: 300px; overflow-y:scroll">
        <?php  $sql = "SELECT * from Recent";
                $query = mysqli_query($sqlconnect,$sql);
                while($rows = $query->fetch_assoc()){
                ?>
                  <h class="fs-6" style="color:#0e2238">	&#8226;<?php echo " ".$rows['code']." ".$rows['Transaction']." by ".$rows['name'].": Remark ".$rows['action']."."?></h><br>
              <?php
                }
                  ?>

        </div>
       </div>
    </div>
        
   </div>

 <?php 
   include('./footer.php')
   ?>
 

</form>

</body>
</html>