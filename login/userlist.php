
<?php 
  require "../conn.php";


  if(isset($_REQUEST["id"])){
      $country = $_REQUEST["id"];
  }else{
      $country = "";
  } //if there is country parameter then grab it


  $json["users"] = array();

  $country = mysqli_real_escape_string($con, $country);
  //remove the conflict of inverted comma with SQL query. 

  $sql = "SELECT * FROM users WHERE id=".$_GET['id'];
  $res = mysqli_query($con, $sql);
  $numrows = mysqli_num_rows($res);
  if($numrows > 0){
     //check if there is any data
      while($array = mysqli_fetch_assoc($res)){
           array_push($json["users"], $array);
      }
  }else{
      $json["error"] = true;
      $json["errmsg"] = "No any data to show.";
  }

  mysqli_close($con);

  header('Content-Type: application/json');
  // tell browser that its a json data
  echo json_encode($json ,JSON_NUMERIC_CHECK);

?>