<?php 
	require_once ('Stack.php');
	//use \Stack;
	
	$stack = new Stack\Stack();
	
	if(isset($_POST['pushActionButton'])){
		if(is_numeric($_POST['val'])){
			$stack->push($_POST['val']);
		}else{
			echo "กรอกข้อมูล";
		}
	}else if(isset($_POST['popActionButton'])){
		$stack->pop();
  
	}
      /*  else if (isset($_POST['IndexActionButton'])) {
            if(is_numeric($_POST['val'])){
                 $stack->push($_POST['val']);
            }
            else {
                echo "กรอกข้อมูล";
            } 
        }
*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>  
       <form action="index.php" method="POST">
	<input name="val" />
	<button type="submit" name="pushActionButton">Push</button>
	<button type="submit" name="popActionButton">Pop</button>
	</form>
        <form action="index.php" method="POST">
	<input name="val" />
	<button type="submit" name="IndexActionButton">Index</button>
	</form>
	<?php
            $dbsql = "SELECT * FROM TestStack";
            $tableSql = "SELECT * FROM Stack_data ORDER BY index_data DESC";
            $tableResult = mysqli_query($stack->con, $tableSql);
            if(mysqli_num_rows($tableResult) > 0){
		echo "<table>";
		echo "<tr>";
		echo "<th>Index</th>";
		echo "<th>Value</th>";
		echo "</tr>";
                    while($rows = mysqli_fetch_array($tableResult)){
			echo "<tr><td>".$rows['index_data']."</td><td>".$rows['value']."</td></tr>";
			}
			echo "</table>";
			} 
        ?>
        </body>
</html>    

       