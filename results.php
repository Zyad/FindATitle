<?php
$answer=$_GET[answer];
$keyword=$_GET[keyword];
echo($keyword); echo"</BR>";
require_once dirname(__FILE__).'/../../ech1/lib/EchoNest/Autoloader.php';
EchoNest_Autoloader::register();
$echonest = new EchoNest_Client();
$echonest->authenticate(YOUR_ECHONEST_API);
$songApi = $echonest->getSongApi();

$songApi->setOption('raw', false);

if(( $responses = $songApi->search(array('title' => $answer, 'results' => 25,'sort' => 'song_hotttnesss-desc'))) && (preg_match("/\b".$keyword."\b/i", $answer)) )
{ 
echo"The title is correct , now find the artist who sings: ".$answer;
?>
<form action="results_artist.php" method="GET">
	<label for="username">artist:</label>
	<input type="text" name="artist" />
	<input type="hidden" name="answer_title" value="<?php echo($answer);?>" />
	<input type="submit" value="Answer" />
</form>
<?
}
else { echo"Wrong title";
?>
</br>
<a href="http://www.zlyma.com/projectm/test/">Play again</a>
<?php
}

?> 