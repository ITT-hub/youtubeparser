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
     * Youtube ключь API
     */
    private $key = null;

    /**
     * YouTubeParse constructor.
     * @param string $key Youtube ключь API
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param string $key Youtube ключь API
     * @return YouTubeParse
     */
    public static function init(string $key)
    {
        return new self($key);
    }

    /**
     * Вернуть плейлисты канала Ютуб
     * @param string $name Канал Ютуб
     * @return object
     */
    public function chanel(string $name): object
    {
        $url = "https://www.googleapis.com/youtube/v3/playlists?channelId=".$name."&key=".$this->key;

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
