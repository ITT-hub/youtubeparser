<?php require_once __DIR__."/vendor/autoload.php";

use ITTechnology\Tube\YouTubeParse;

// Initialize application
$tube    = YouTubeParse::init("Your YouTube API key");

// Get channel playlists
$chanels = $tube->chanel("YouTube channel ID");

// Get video playlists
for($i=0; $i<$chanels->pageInfo->totalResults; $i++)
{
    echo "<h3>Page ".$i."</h3>";
    echo '<pre>';
    print_r($tube->video($chanels->items[$i]->id));
    echo '</pre>';
}
