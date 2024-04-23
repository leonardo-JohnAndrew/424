<?php 
session_start();
 require('./database.php');

if(isset($_GET['submit_faculty'])){
  $name = $_SESSION['name'] ;
   $class  = $_GET['unit_class'];
   $no_units = $_GET['number_of_units'];
   $office = $_GET['office'];
   $purpose = $_GET['purpose'];

   if($class == 'Other'){
    $class = $_GET['other_unit_class'];
   }
   if($office  =='Other'){
     $office = $_GET['other_office'];
   }
   for($i = 0 ; $i<$no_units;$i++){
   $sql = " INSERT into unit_request (classification,no_units,request_by,office,purpose,date_time_requested)values('$class' ,$no_units, '$name','$office', '$purpose',now())";
   $sqlquery = mysqli_query($sqlconnect,$sql);
   if($sqlquery){
    $_SESSION['status'] ="Request Form Submit  Success!";
      header('location: faculty.php');

   }
  }
  }
  if(isset($_GET['report'])){
     $name = $_GET['name'];
     $class = $_GET['class'];
     $lab = $_GET['lab'];
     $pc= $_GET['pc_unit'];
     $prob = $_GET['prob'];
  }
  if(isset($_GET['submit'])){
    for($i = 0; $i<count($_GET['key']);$i++){

      $key = $_GET['key'][$i];
     $class  = $_GET['class_'.$key];
    //  $num = $_GET['num_'.$key][$i];
     $name = $_GET['name_'.$key];
     $remark  = $_GET['remark_'.$key];
     $code  = $_GET['code_'.$key];
     $recieved = $_GET['received_'.$key];
  //   echo $key.$class.$name.$remark.$code;
      
      $sql =  "UPDATE unit_request Set remarks = '$remark', unit_code = '$code', received = $received,returned = now()
           where no = $key;";
        $sqlquery = mysqli_query($sqlconnect,$sql);
      
        $sql1 = "INSERT into Recent VALUES('$code','Barrowed','$name','$remark')";
        $query = mysqli_query($sqlconnect,$sql1);
        if($query){
          $_SESSION['status'] = "Submit!";
          header('location: unitrequest.php');
        }
      }
}
  
?>
