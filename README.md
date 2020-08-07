# Youtube video parser
The Youtube video parser will allow you to easily select the video information of any channel. The information will contain such data as the video title, description, ID, etc.

### Installation:

**Connect the composer in your file**

`composer require it-tech/youtubeparser`

**Connect vendor/autoload.php**

```php 
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
```