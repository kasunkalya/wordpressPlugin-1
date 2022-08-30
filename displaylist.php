<?php

global $wpdb;
$tablename = $wpdb->prefix."kform";

// Delete record
if(isset($_GET['delid'])){
  $delid = $_GET['delid'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>All Entries</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
  <tr>
   <th>S.no</th>
   <th>Name</th>
   <th>Contact No</th>
   <th>Email</th>
   <th>Address</th>
   <th>Message</th>
   <th>&nbsp;</th>
  </tr>
  <?php
  // Select records
  $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($entriesList) > 0){
    $count = 1;
    foreach($entriesList as $entry){
      $id = $entry->id;
      $name = $entry->name;
      $contactNo = $entry->contactNo;
      $email = $entry->email;
      $address = $entry->address;
      $message = $entry->message;

      echo "<tr>
      <td>".$count."</td>
      <td>".$name."</td>
      <td>".$contactNo."</td>
      <td>".$email."</td>
      <td>".$address."</td>    
      <td>".$message."</td>
      <td><a href='?page=allentries&delid=".$id."'>Delete</a></td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>No record found</td></tr>";
 }
?>
</table>