<head> 
</head>
<?
require_once 'Zend/Loader.php';

/**
 * @see Zend_Gdata_YouTube
 */
Zend_Loader::loadClass('Zend_Gdata_YouTube');

$clientLibraryPath = '/var/www/vhosts/zlyma.com/httpdocs/youtube/library/';
$oldPath = set_include_path(get_include_path() . PATH_SEPARATOR . $clientLibraryPath);
$answer_title=$_GET[answer_title]; 
$artist=$_GET[artist]; 
echo($keyword); echo"</BR>";
require_once dirname(__FILE__).'/../../ech1/lib/EchoNest/Autoloader.php';
EchoNest_Autoloader::register();
$echonest = new EchoNest_Client();
$echonest->authenticate(YOUR_ECHONEST_API);
$songApi = $echonest->getSongApi();
$songApi->setOption('raw', false);

// Youtube functions
function findFlashUrl($entry)
{
    foreach ($entry->mediaGroup->content as $content) {
        if ($content->type === 'application/x-shockwave-flash') {
            return $content->url;
        }
    }
    return null;
}

/**
 * Echo the video embed code, related videos and videos owned by the same user
 * as the specified videoId.
 *
 * @param  string $videoId The video
 * @return void
 */
function echoVideoPlayer($videoId)
{
    $yt = new Zend_Gdata_YouTube();

    $entry = $yt->getVideoEntry($videoId);
    $videoTitle = $entry->mediaGroup->title;
    $videoUrl = findFlashUrl($entry);

    print <<<END
    <b>$videoTitle</b><br />
    <object width="425" height="350">
      <param name="movie" value="${videoUrl}&autoplay=1"></param>
      <param name="wmode" value="transparent"></param>
      <embed src="${videoUrl}&autoplay=1" type="application/x-shockwave-flash" wmode="transparent"
        width=425" height="350"></embed>
    </object>
END;
    echo '<br />';
  
}


function searchAndPrint($searchTerms = 'lady gaga')
{
  $yt = new Zend_Gdata_YouTube();
  $yt->setMajorProtocolVersion(2);
  $query = $yt->newVideoQuery();
  $query->setSafeSearch('none');
  $query->setVideoQuery($searchTerms);

  // Note that we need to pass the version number to the query URL function
  // to ensure backward compatibility with version 1 of the API.
  $videoFeed = $yt->getVideoFeed($query->getQueryUrl(2));
  $video1=$videoFeed[0];
   $id=$video1->getVideoId();
   echoVideoPlayer($id);
 // var_dump($videoFeed);
  //printVideoFeed($videoFeed, 'Search results for: ' . $searchTerms);
}

//Echonest Stuff
if(
$responses = $songApi->search(array('title' => $answer_title, 'artist' => $artist,'results' => 1,'sort' => 'artist_familiarity-desc')))
{ 
echo"Correct, you won. You found the song : ";
foreach($responses as $response){ echo($response["artist_name"]);echo"-"; echo($response["title"]); echo"<br/>";

searchAndPrint($answer_title." ".$artist);


}

}
else { echo"Wrong artist";}
?> 
<a href="http://www.zlyma.com/projectm/test/">Play again</a>
