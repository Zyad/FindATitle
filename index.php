<head> 
<meta property="og:title" content="Guess song titles with specific words in them..."/> 
<meta property="fb:admins" content="578315273"/> 

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29674372-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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



echo"</br>";
echo"contact : zlyma.contact@gmail.com";