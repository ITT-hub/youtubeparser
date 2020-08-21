<?php require_once __DIR__."/vendor/autoload.php";

use ITTechnology\Tube\YouTubeParse;

// Initialize application
$tube    = YouTubeParse::init("Your YouTube API key", 30);

// Get channel playlists
$chanels = $tube->chanel("YouTube channel ID");
echo '<h1>Channel playlists '.$chanels->items[0]->snippet->channelTitle.'</h1>';
echo "<pre>";
print_r($chanels);
echo "</pre>";

echo '<h1>Playlist video '.$chanels->items[0]->snippet->title.'</h1>';

// Get video playlists
$video = $tube->video($chanels->items[0]->id);
echo "<pre>";
print_r($video);
echo "</pre>";

