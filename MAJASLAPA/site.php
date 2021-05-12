 <?php
 $mailText = filter_input(INPUT_POST, 'mailText');
 if (!empty($mailText)){
 $host = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $dbname = "klienti";
 /////////////////////// Izveido connection////////////////////
 $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
 if (mysqli_connect_error()){
 die('Connect Error ('. mysqli_connect_errno() .') '
 . mysqli_connect_error());
 }
 else{
 $sql = "INSERT INTO users (email)
 values ('$mailText')";
 echo"All saved database data";
 $result = mysqli_query($conn,"SELECT * FROM users");
 echo "<table border='1'>
 <tr>
 <th>ID</th>
 <th>E-mail</th>
 </tr>";
 while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['ID'] . "</td>";
 echo "<td>" . $row['email'] . "</td>";
 echo "</tr>";
 }
 echo "</table>";

 if ($conn->query($sql)){
  echo '<script language="javascript">';
  echo 'alert("Jauns ieraksts sekmīgi veikts")';
  echo '</script>';
 }
 else{
 echo "Kļūda: ". $sql ."
 ". $conn->error;
 }
 $conn->close();
 echo '<form><input type="button" value="Atgriezties uz iepriekšējo lapu" onClick="javascript:history.go(-1)"></form>';
}}else {echo '<form><input type="button" value="Atgriezties uz iepriekšējo lapu" onClick="javascript:history.go(-1)"></form>';}
 ?>
