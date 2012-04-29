<head> 

</head>
<div id="fb-root"></div>

<?php 
$keywords_array=array("sun","life","never","always","world","believe","young","sexy","together","born","poker","love","young","good","you","forgive","high","somebody","city","turn");
$rand_keys = array_rand($keywords_array, 1);
      echo "  Find the title of a song which contains the word :  ". $keywords_array[$rand_keys] ."\n";
?>
<form action="results.php" method="GET">
	<label for="username">Answer:</label>
	<input type="text" name="answer" />
	<input type="hidden" name="keyword" value="<?php echo($keywords_array[$rand_keys]);?>" />
	<input type="submit" value="Answer" />
</form>

<?php 

echo"</br>";
echo"To get a new word, just refresh the page";
echo"</br></br></br>";

echo"contact : zlyma.contact@gmail.com";