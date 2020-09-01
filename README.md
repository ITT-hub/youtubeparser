# Youtube video parser
The Youtube video parser will allow you to easily select the video information of any channel. The information will contain such data as the video title, description, ID, etc.

### Installation:

**Connect the composer in your file**

`composer require it-tech/youtubeparser`

**Connect vendor/autoload.php**

```php 
use ITTechnology\Tube\YouTubeParse;

// Initialize application
$tube    = YouTubeParse::init("Your YouTube API key", 30);

// Get channel
$chanel = $tube->chanel('YouTube channel ID');
echo '<h1>Channel '.$chanel->items[0]->snippet->title.'</h1>';
echo "<pre>";
print_r($chanel);
echo "</pre>";

// Get channel playlists
$playlist = $tube->playlists("YouTube channel ID");
echo '<h1>Channel playlists '.$playlist->items[0]->snippet->channelTitle.'</h1>';
echo "<pre>";
print_r($playlist);
echo "</pre>";

echo '<h1>Playlist video '.$playlist->items[0]->snippet->title.'</h1>';

// Get video playlists
$video = $tube->video($playlist->items[0]->id);
echo "<pre>";
print_r($video);
echo "</pre>";
```