<?php
if ($user == 'admin') {
?>


					<?php
					if (isset($_POST["add_new_page"])) {
						
					$new_page_label = mysqli_real_escape_string($conn, $_GET['new_page_label']);
					if (empty($new_page_label))
					{
					$new_page_label = mysqli_real_escape_string($conn, $_POST['new_page_label']);
					}
					$editdate = date("ymd"); 
					$bill_month_year = gmdate("Ym"); 
					$sql = "INSERT INTO pages (subcategory_id, page_label, page_label_editor,  page_label_editdate,  page_label_bill_month_year,  page_label_activate)
					VALUES ('$subcategory_id', '$new_page_label', '$user',  '$editdate',  '$bill_month_year',  '3')";
					if (mysqli_query($conn, $sql)) {
					echo "Statements Added!";
					} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
					}
					}
					?>



					<center><div><button id="button01" >Add New Page</button></div></center>
					<div id="options01" align="center">
								<form action="template_single_page.php" method="post" style="overflow: auto; width: 95%; border: solid 2px silver;border-radius: 10px;"> 

							<div class="form-group"><br>
								<center><font size="3" color="grey">Page Label:&nbsp;</font> 
								<input style="background:#DEFFFF;color:#000000;" name="new_page_label" size="20"  maxlength="15" value="" required/></center><br>
								<input type="hidden" name="subcategory_id" value="<?php echo $subcategory_id; ?>">
								<br>
								<center><input type="submit" value="Add Page" name="add_new_page"></center><br>

							</div>
					</form>
					</div>




		<script>

			$(document).ready(function(){
				$("#options01").hide();
				$("#button01").click(function(){
					$("#options01").toggle(1000);
				});
			});



		</script>


<?php
}
?>
