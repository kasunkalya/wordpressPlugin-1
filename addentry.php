<?php

global $wpdb;

// Add record
if(isset($_POST['but_submit'])){

  $name = $_POST['txt_name'];
  $contactNo = $_POST['txt_contactNo'];
  $email = $_POST['txt_email'];
  $address = $_POST['txt_address'];
  $message = $_POST['txt_message'];
  $tablename = $wpdb->prefix."kform";
  
 

  if($name != '' && $contactNo != '' && $email != ''){
     $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE email='".$email."' ");
     if(count($check_data) == 0){
       $insert_sql = "INSERT INTO ".$tablename."(name,contactNo,email,address,message) values('".$name."','".$contactNo."','".$email."','".$address."','".$message."') ";
       $wpdb->query($insert_sql);
       echo "Save sucessfully.";
     }
   }
}

?>
<h1>Add New Entry</h1>
<form method='post' action=''>
  <table>
    <tr>
      <td>Name</td>
      <td><input type='text' name='txt_name'></td>
    </tr>
    <tr>
     <td>Contact Number</td>
     <td><input type='text' name='txt_contactNo'></td>
    </tr>
    <tr>
     <td>Email</td>
     <td><input type='text' name='txt_email'></td>
    </tr>
    
    <tr>
     <td>Address</td>
     <td><input type='text' name='txt_address'></td>
    </tr>
    
    <tr>
     <td>Message</td>
     <td><input type='text' name='txt_message'></td>
    </tr>
    
    <tr>
     <td>&nbsp;</td>
     <td><input type='submit' name='but_submit' value='Submit'></td>
    </tr>
 </table>
</form>