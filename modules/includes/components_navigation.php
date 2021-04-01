




<?php
// include header
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/includes/header.php";
include("$path"); 
?>




			<center>
			<?php
			$company_id = $_GET['company_id'];
			if (empty($company_id))
			{
			$company_id = $_POST['company_id'];
			}				
				
				
				
			$component = $_GET['component'];
			if (empty($component))
			{
			$component = $_POST['component'];
			}
			?>
				







 <table style="width: 100%; padding:0; margin:0; word-break: break-word; overflow-wrap: break-word; table-layout:fixed;">

  <tr>
    <td>
	</td>
	  

	  
	  
	  
	  
	     <td>
		    <center><a href="/pages/metals_mining_companies/company_about/about.php?component=1&company_id=<?php echo $company_id?>"  target='_parent'  style="width: 140px;"><font size="<?php if ($component == 1){ echo '6'; } else {  echo '3'; }?>">Overview</font></a></center>
	</td>	  
	  
	
	  
	  
	  
	     <td>
		    <center><a href="/pages/metals_mining_companies/company_news/company_news.php?component=6&company_id=<?php echo $company_id?>"  target='_parent'  style="width: 140px;"><font size="<?php if ($component == 6){ echo '6'; } else {  echo '3'; }?>">Projects</font></a></center>
	</td>		  
	  
	  
	  
	  
	  
    <td>
  <center><a href="/company_pages/company_financials/company_financials.php?component=2&company_id=<?php echo $company_id?>"  target='_parent'  style="width: 140px;"><font size="<?php if ($component == 2){ echo '6'; } else {  echo '3'; }?>">Financials</font></a></center>
	</td>

	  

	  

	  
	  
	     <td>
  <center><a href="/company_pages/company_shareholders/company_shareholders.php?component=10&company_id=<?php echo $company_id?>"  target='_parent'  style="width: 140px;"><font size="<?php if ($component == 10){ echo '6'; } else {  echo '3'; }?>">Shareholders</font></a></center>
	</td>	  
	  	  	  
	  
	  
	  
	  
	  
	  
	  
	     <td>
  <center><a href="/pages/metals_mining_companies/company_news/company_news.php?component=3&company_id=<?php echo $company_id?>"  target='_parent' style="width: 140px;"><font size="<?php if ($component == 3){ echo '6'; } else {  echo '3'; }?>">Announcements</font></a></center>
	</td>
	  

			<?php
/*	  
	  
	  
	     <td>
  <center><a href="/company_pages/company_multimedia/company_multimedia.php?component=5&company_id=<?php echo $company_id?>"  target='_parent' style="width: 140px;"><font size="<?php if ($component == 5){ echo '6'; } else {  echo '3'; }?>">Multimedia</font></a></center>
	</td>	  
*/				?>

	  
	     <td>
  <center><a href="/company_pages/company_watchlist/watchlist.php?component=4&company_id=<?php echo $company_id?>"  target='_parent'  style="width: 140px;"><font size="<?php if ($component == 4){ echo '6'; } else {  echo '3'; }?>">Watchlist</font></a></center>
	</td>	  
	  
	  

	  
	  
	  
	  
	  
	  
	    <td>
	</td>  
  </tr>	  
	</table>	  
  
	  



		</center>






<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/js/materialize.js"></script>
<script src="/js/init.js"></script>



<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/modules/footer_nav.php";
require_once("$path"); 
?>	