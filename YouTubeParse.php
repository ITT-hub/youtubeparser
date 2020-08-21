<?php
/*
 * Created 06.08.2020 12:45
 */

namespace ITTechnology\Tube;

/**
 * Class YouTubeParse
 * @package ITTechnology\Tube
 * @author Alexandr Pokatskiy
 * @copyright ITTechnology
 */
class YouTubeParse
{
    /**
     * @var int Выдавать позиций
     */
    private $max;
    /**
     * Youtube ключь API
     */
    private $key = null;
    /**
     * YouTubeParse constructor.
     * @param string $key Youtube ключь API
     */
    public function __construct(string $key, int $max)
    {
        $this->key = $key;
        $this->max = $max;
    }

    /**
     * @param string $key Youtube ключь API
     * @return YouTubeParse
     */
    public static function init(string $key, int $max)
    {
        return new self($key, $max);
    }

    /**
     * Вернуть плейлисты канала Ютуб
     * @param string $name Канал Ютуб
     * @return object
     */
    public function chanel(string $name): object
    {
        $url = "https://www.googleapis.com/youtube/v3/playlists?part=snippet"
            . "&channelId=".$name
            . "&maxResults=".$this->max
            . "&key=".$this->key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responce = curl_exec($ch);
        if(curl_error($ch)) {
            echo curl_error($ch);
        }
        curl_close($ch);

        return json_decode($responce);
    }

    /**
     * Выбрать видео плейлиста
     * @param string $playlist
     * @return object
     */
    public function video(string $playlist): object
    {
        $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet'
            . '&playlistId='.$playlist
            . '&maxResults='.$this->max
            . '&key='.$this->key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responce = curl_exec($ch);
        if(curl_error($ch)) {
            echo curl_error($ch);
        }
        curl_close($ch);

        return json_decode($responce);
    }
}
