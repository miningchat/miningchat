<?php
if ($user=='admin') {
?>



 
<?php
if (isset($_POST["add_subcategory"])) {
$editdate = date("ymd"); 
$nowDate = gmdate("Ym"); 
$subcategory_name = mysqli_real_escape_string($conn, $_POST['subcategory_name']);
$sql = "INSERT INTO subcategories (subcategory_name, subcategory_name_editor, subcategory_name_editdate,  subcategory_name_bill_month_year) VALUES('$subcategory_name', '$user', '$editdate', '$nowDate')";  
mysqli_query($conn, $sql); 
}
?>


<form action="index.php" method="post" enctype="multipart/form-data"> 
<div class="form-group" >
<table class="table"  >
<tbody>
<tr>
<td>
<center><font size="3" color="#D8D8D8" >Add Book:</font></center>
</td>
<td>
<input style="background:#DEFFFF;color:#000000;" class="form-control name_list" name="subcategory_name" size="10"  maxlength="50" value="" placeholder="Enter Project Name" required/><br>
</td>
 <td>
<center><input type="submit" value="Add" name="add_subcategory"></center><br>  
</td>
</tr>
</tbody>
</table>
</div>
</form> 



 
<?php
}
?>
