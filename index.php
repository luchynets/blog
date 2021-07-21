<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyBlog</title>
</head>
<body>
    <?php 
        $link = mysqli_connect('localhost', 'root', 'root', 'postes') 
    		or die("Ошибка " . mysqli_error($link));
    	if(isset($_REQUEST['btn'])){
    		$date = date('y-m-d');
    		$post = $_REQUEST['post'];
    		$thema = $_REQUEST['thema'];
    		mysqli_query($link, "INSERT INTO postes (name, thema, dates) VALUES ('$thema', '$post', '$date')");
            echo "<meta http-equiv='refresh' content='0'>";
    	}
    	$result = mysqli_query($link, "SELECT * FROM postes") or die("Ошибка " . mysqli_error($link)); 
		if($result)
		{
   			$rows = mysqli_num_rows($result); // количество полученных строк
     		echo "<hr/>";
    		for ($i = 0 ; $i < $rows ; ++$i)
    		{
       			$row = mysqli_fetch_row($result);
            	echo "<h2>$row[0]</br></h2>";
            	echo "<p>$row[1]</br></p>";
            	echo "<p>$row[2]</br></p>";
        		echo "<hr/>";
    		}
		}
    	mysqli_close($link);
    ?>
    <form action="index.php" method="POST">
    	<input name="thema" type="text" placeholder="Введіть тему">
    	<textarea name="post" name="textarea" cols="40" rows="5" placeholder="Напишіть пост"></textarea>
    	<button name="btn" type="submit">Готово</button>
    </form>
</body>
</html>