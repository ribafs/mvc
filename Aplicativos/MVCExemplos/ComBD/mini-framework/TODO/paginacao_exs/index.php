 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Simple Pagination Demo using PDO Query</title>
        <!-- CSS File -->
    <link href="./css/estilo.css" rel="stylesheet">
  </head>
 <body>
<?php
	// mysql hostname
	$hostname = 'localhost';
	// mysql username
	$username = 'root';
	// mysql password
	$password = 'root';
	// Database Connection using PDO with try catch method. 

	try {
     $dbh = new PDO("mysql:host=$hostname;dbname=testes", $username, $password);
    }
	// In case of error PDO exception will show error message.
	catch(PDOException $e) {
        echo $e->getMessage();
    }

	// No. of adjacent pages shown on each side
	$adjacents = 2;

	// We will assign variable here for entry By. you can use your variables here.
	//$EntryBy - $email
	$email = "ola@ribafs.org";

	// We Will prepare SQL Query ServerName = nome
    $STM = $dbh->prepare("SELECT nome FROM clietnes WHERE email = :email");

	// bind paramenters, Named paramenters alaways start with colon(:)
    $STM->bindParam(':email', $email);

	// For Executing prepared statement we will use below function
    $STM->execute();

	// Count no. of records
	$Records = $STM->rowCount();

	// Your File Name will be the same like your php page name which is index.php
	$targetpage = "index.php";

	// Below is setting for no. of records per page.
	$limit = 10; 
	$page = $_GET['page'];

	if($page) 
    	//First Item to dipaly on this page
		$start = ($page - 1) * $limit; 			
	else
	//if no page variable is given, set start to 0
		$start = 0;								

	// Get data using PDO prepare Query.
	$STM2 = $dbh->prepare("SELECT `id`, `nome`, `email`, `nascimento`, `cpf` FROM clientes WHERE email = :email ORDER BY id LIMIT $start, $limit");

	// bind paramenters, Named paramenters alaways start with colon(:)
    $STM2->bindParam(':email', $email);

	// For Executing prepared statement we will use below function
    $STM2->execute();

	// We will fetch records like this and use foreach loop to show multiple Results later in bottom of the page.
	 $STMrecords = $STM2->fetchAll();

	// Setup page variables for display. If no page variable is given, default to 1.
	if ($page == 0) $page = 1;

	//previous page is page - 1					
	$prev = $page - 1;

	//next page is page + 1					
	$next = $page + 1;

	//lastpage is = total Records / items per page, rounded up.						
	$lastpage = ceil($Records/$limit);

	//last page minus 1	
	$lpm1 = $lastpage - 1;						

	//Now we apply our rules and draw the pagination object. We're actually saving the code to a variable in case we want to draw it more than once.
	$pagination = "";

	if($lastpage > 1)
	{	
		$pagination .= "<div class='pagination'>";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href='$targetpage?page=$prev'>Previous</a>";
		else
			$pagination.= "<span class='disabled'>Previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class='current'>$counter</span>";
				else
					$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class='current'>$counter</span>";
					else
						$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href='$targetpage?page=$lpm1'>$lpm1</a>";
				$pagination.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{

				$pagination.= "<a href='$targetpage?page=1'>1</a>";
				$pagination.= "<a href='$targetpage?page=2'>2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class='current'>$counter</span>";
					else
						$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href='$targetpage?page=$lpm1'>$lpm1</a>";
				$pagination.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href='$targetpage?page=1'>1</a>";
				$pagination.= "<a href='$targetpage?page=2'>2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class='current'>$counter</span>";
					else
						$pagination.= "<a href='$targetpage?page=$counter'>$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href='$targetpage?page=$next'>Next</a>";
		else
			$pagination.= "<span class='disabled'>Next</span>";
		$pagination.= "</div>\n";		
	}

	//Below is a start of table in which we will show records using foreach loop.
	echo "<table class='mytableP'>";

	// For Exporting Records to Excel we will send $EntryBy in link and will gate it on ExportToExcel page for stats for this user.	
	echo"<tr><th th colspan=5>Simple Pagination Demo using PDO Quries</div></th></tr>";
	echo"<tr><th>ID#</th><th>Nome</th><th>E-mail</th><th>Nascimento</th><th>CPF</th></tr>";

   	// We use foreach loop here to echo records.
	foreach($STMrecords as $r)
        {
			echo "<tr>";
	    	echo "<td>" .$r[0] ."</td>";
       		echo "<td>" .$r[1] ."</td>";
	   		echo "<td>" .$r[2] ."</td>";
	   		echo "<td>" .$r[3] ."</td>";
	   		echo "<td>" .$r[4] ."</td>";
	   		echo "<td>" .$r[5] ."</td>";
	   		echo "<td>" .$r[6] ."</td>";
	   		echo "<td>" .$r[7] ."</td>";
	   		echo "<td>" .$r[8] ."</td>";
	   		echo "<td>" .$r[9] ."</td>";
	   		echo "<td>" .$r[10] ."</td>";
 			echo "</tr>";  
		}
	echo "</table>";

	// For showing pagination below the table we will echo $pagination here after </table>. For showing above the table we will echo $pagination before <table>
	echo $pagination;

	// Closing MySQL database connection   
    $dbh = null;
	?>
  </body>
</html>	
