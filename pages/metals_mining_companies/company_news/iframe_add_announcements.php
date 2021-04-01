<?php
// connect to database db_1
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/db_conn/conn.php";
require_once("$path");
?>




<?php
// start user session
session_start();
$user = $_SESSION["user"];
?>




<?php
// find out wich permissions the user has, in case the user is signed in
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/user_permissions.php";
require("$path");
?>
	



<?php
// include header
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/functions.php";
include("$path"); 
?>







					<?php

					if ($news_edit_possible == 1 || $news_audit_possible == 1 || $topic_audit_possible == 1 || $topic_edit_possible == 1 || $company_editor == 1 || $company_auditor == 1  || $project_editor == 1 || $user =='admin') {				
					?>	






<div class="#263238 blue-grey darken-4">		
	<div class="container">
		<div class="section">
			<!--   Icon Section   -->
			<div class="row">
				
				
				
	
				

<?php
$joinsymbol = clear($_GET["joinsymbol"]); 
if (empty($joinsymbol))
{
$joinsymbol = clear($_POST['joinsymbol']);
}




$sql = "SELECT * FROM listed WHERE joinsymbol ='$joinsymbol' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)) {
$exchangesymbol22 =$row['exchangesymbol'];
$symbol22 =$row['symbol'];
}
}
	
	
	
	
	
	
if(isset($_POST['add'])){	
	$author = clear($_POST['author']);
	$publisher = clear($_POST['publisher']);
	$title = clear($_POST['title']);
	$link = clear($_POST['link']);
	$year = clear($_POST['year']);
	$month = clear($_POST['month']);
	$day = clear($_POST['day']);
	$joinsymbol = clear($_POST['joinsymbol']);
	$pubDate = $day . '/' . $month . '/' . $year; 
	$pub_ordem = $year . $month . $day;	
	$date = gmdate("d/m/y"); 
	$bill_month_year = gmdate("Ym"); 	
	
	
$text = clear($_POST['text']);

	
$text_last_words = substr($text, -25, -1);

	
$text_first_words = substr($text, 0, 25);
	
	
	


$editdate = date("ymd"); 

$bill_month_year = gmdate("Ym"); 
	
	
	
	$sql = "SELECT link FROM news_listed WHERE link= '$link'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
	
		
		$sql = "INSERT INTO news_listed (joinsymbol, title, title_editor, title_editdate, title_bill_month_year, link, link_editor, link_editdate, link_bill_month_year, author, publisher, publisher_editor, publisher_editdate, publisher_bill_month_year, pubDate, pubDate_editor, pubDate_editdate, pubDate_bill_month_year, pub_ordem, news_editor, news_editdate, bill_month_year, text_first_words, text_first_words_editor, text_first_words_editdate, text_first_words_bill_month_year, text_last_words, text_last_words_editor, text_last_words_editdate, text_last_words_bill_month_year)
		VALUES ('$joinsymbol', '$title', '$user', '$editdate', '$bill_month_year', '$link', '$user', '$editdate', '$bill_month_year', '$author', '$publisher', '$user', '$editdate', '$bill_month_year', '$pubDate', '$user', '$editdate', '$bill_month_year', '$pub_ordem', '$user', '$date', '$bill_month_year', '$text_first_words', '$user', '$editdate', '$bill_month_year', '$text_last_words', '$user', '$editdate', '$bill_month_year')";
		
		
		if (mysqli_query($conn, $sql)) {
		} else {
		echo "Error!";
		}
		$news_id = $conn->insert_id;	
		$title = strtolower($title); 		

		// find and add topic... wie auto_add_news
		$sql4 = "SELECT * FROM news_listed_topic_filter_sentences";
		$result4 = $conn->query($sql4);
		if ($result4->num_rows > 0) {
			while($row4 = $result4->fetch_assoc()) {
				$topic_category =  $row4["topic_category"];
				$topic_comment =  $row4["topic_comment"];
				$topic_id_from_autoinsert =  $row4["id"];

				$topic_key_sentence_1 =  $row4["topic_key_sentence_1"];
				$topic_key_sentence_1 = strtolower($topic_key_sentence_1); 

				$topic_key_sentence_2 =  $row4["topic_key_sentence_2"];
				$topic_key_sentence_2 = strtolower($topic_key_sentence_2); 

				$topic_key_sentence_3 =  $row4["topic_key_sentence_3"];
				$topic_key_sentence_3 = strtolower($topic_key_sentence_3);

				$topic_exclude_sentence =  $row4["topic_exclude_sentence"];
				$topic_exclude_sentence = strtolower($topic_exclude_sentence);												

				if (strpos($title, $topic_key_sentence_1) !== false && strpos($title, $topic_key_sentence_2) !== false && strpos($title, $topic_key_sentence_3) !== false  && strpos($title, $topic_exclude_sentence) == false) 												
				{	
					$tag = $topic_category;
					$sql = "INSERT INTO news_listed_topic_and_description (news_id, topic, topic_comment, joinsymbol, pub_ordem, topic_id_from_autoinsert)
											VALUES ('$news_id', '$tag', '$topic_comment', '$joinsymbol', '$pub_ordem', '$topic_id_from_autoinsert')";
					if (mysqli_query($conn, $sql)) {
					} else {
						echo "Error Adding Tag";
					}	
				}
			}
		}

		
		
		
		
		
//		$text=file_get_contents($link);

		
		
		
		
		// find and add project.... ... wie add announcemetns
		$re = '/((\w* ){0,5})(Project)/i'; 
		$result = preg_match_all($re, $text, $matches);
		foreach ($matches[1] as $match) {

			$testString = $match;
			preg_match_all('([A-Z][^\s]*)', $testString, $matches);
			$result = implode('', $matches[0]);
			$result = preg_replace('/(?<!\ )[A-Z]/', ' $0', $result);												
			if (!empty($result)) {
				$match = $result . " Project";	
				$sql = "INSERT INTO news_listed_related_project (news_id, joinsymbol, related_project)
												VALUES ('$news_id', '$joinsymbol', '$match')";
				if (mysqli_query($conn, $sql)) {
				} else {
					echo " ";
				}	
			}		

		}				

	?>
	<br>	
	<?php


	if (!empty($project1)) {
	$sql = "INSERT INTO news_project (id, news_project_text, title, link, author, publisher, pubDate, pub_ordem)
	VALUES ('$project1', '$news_listed_text', '$title', '$link', '$author', '$publisher', '$pubDate', '$pub_ordem')";
	if (mysqli_query($conn, $sql)) {
	} else {
	echo "Error Adding project1";
	}
	}


	if (!empty($project2)) {
	$sql = "INSERT INTO news_project (id, news_project_text, title, link, author, publisher, pubDate, pub_ordem)
	VALUES ('$project2', '$news_listed_text', '$title', '$link', '$author', '$publisher', '$pubDate', '$pub_ordem')";
	if (mysqli_query($conn, $sql)) {
	} else {
	echo "Error Adding project2" ;
	}
	}



	if (!empty($project3)) {
	$sql = "INSERT INTO news_project (id, news_project_text, title, link, author, publisher, pubDate, pub_ordem)
	VALUES ('$project3', '$news_listed_text', '$title', '$link', '$author', '$publisher', '$pubDate', '$pub_ordem')";
	if (mysqli_query($conn, $sql)) {
	} else {
	echo "Error Adding project3";
	}
	}


	$user = $_SESSION["user"];
	$date = gmdate("d/m/y"); 
	$time = gmdate('H:i');
	$content = 'News added! Company Symbol:' . ' ' . $joinsymbol .  ' Release date:' . ' ' . $pubDate . ' || ' .  'Title:' . ' ' . $title;
	$stmt = $conn->prepare("INSERT INTO watchtower (content, location, category, ip, user, date, time, public_access) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssi", $content, $location, $category, $user_ip, $user, $date, $time, $public_access);
	// set parameters and execute
	$content = $content;
	$user_ip = $user_ip;
	$user = $user;
	$date = $date;
	$location = $id;
	$category = 'news_listed';
	$time = $time;
	$public_access = '0';
	$stmt->execute();
	?>
	<script>alert(1)</script>
	<?php				
	} else {
	echo "News already exists in our database";
	}			
}	
?>




<center><div style="background-color: #d9ffb3; overflow: auto; width: 100%; border: solid 2px silver;border-radius: 10px;"><br>
<form action="iframe_add_announcements.php" method="post" enctype="multipart/form-data"> 
<div class="form-group">
<font size="3"  color="black"><b>Add Announcement</b> (<?php echo $joinsymbol; ?>)</font>  <a href="https://web.tmxmoney.com/news.php?qm_symbol=<?php echo $symbol22; ?>"  target="_blank">LINK</a>
<br><br>	

	<?php			
	$sql = "SELECT pubDate, title FROM news_listed WHERE joinsymbol='$joinsymbol' ORDER BY pub_ordem ASC LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	while($row = mysqli_fetch_array($result)) {	
	$pubDate_x=$row['pubDate'];			
	$title_x=$row['title'];			
	?>	
	<font size="3"  color="black"><?php echo $pubDate_x; ?> </font><font size="2"  color="black"><?php echo $title_x; ?></font><br><br>		
	<?php			
	}
	}			
	?>

			

	<table style="width:100%">
		<tr>
			<td>
				<font size="3"  color="black">Release Date:</font>
				<select name="day" style="background:#DEFFFF;color:#000000;">
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				<select name="month" style="background:#DEFFFF;color:#000000;">
					<option value="01">January</option>
					<option value="02">February</option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
				<input  style="background:#DEFFFF;color:#000000;" maxlength="10" name="year" size="5" type="text" value="" placeholder="yyyy" required>
			</td>
		</tr>
	</table> 
	<br>
	<input style="background:#DEFFFF;color:#000000;" class="form-control name_list" type="text" name="title"  value="" maxlength="5000" placeholder="News Title" required> <br> <br>
	<input style="background:#DEFFFF;color:#000000;" class="form-control name_list" type="text" name="publisher"  value="" maxlength="5000" placeholder="Source" required> <br>
	<br>
	<input style="background:#DEFFFF;color:#000000;" class="form-control name_list" type="text" name="link"  value="" maxlength="100000" placeholder="Link To News Release:"  required>
	

          <textarea id="textarea1" class="materialize-textarea" name="text" value="" maxlength="100000000" placeholder="Text"  required></textarea>
	
	
	<input type="hidden" name="joinsymbol" value="<?php echo $joinsymbol; ?>">
	<input type="hidden" name="category" value="infrastructure"><br>
	<center><input type="submit" value="Add" name="add"></center><br>
	</div>
	</form>
	</div></center><br>




				







<script>

// Since there are 2 iframes in the page, we must pass an ID for the current iframe
setInterval(function() {
    window.top.postMessage(document.body.scrollHeight + '-' + 'iframe1', "*");
}, 500);

</script>


	
					
				
				

				</div>
			</div>

		</div>
	</div>	














	<?php			
	}
			
	?>






	
	
	
<?php
// include footer
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/footer.php";
include ("$path"); 
?>



<?php
// close db connection
$conn->close();
?>
		
				
				