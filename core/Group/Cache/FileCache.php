<?php
namespace core\Group\Cache;

use Exception;
use core\Group\Contracts\Cache\Cache as CacheContract;

class FileCache implements CacheContract
{
    protected static $cache_dir = "runtime/cache/";

    /**
    * 获取cache
    *
    * @param  cacheName,  name::key ; cache_dir
    * @return string|array
    */
    public static function get($cacheName, $cache_dir = false)
    {
        $cache_dir = $cache_dir == false ? self::$cache_dir : $cache_dir;
        $dir = $cache_dir.$cacheName;

        return include $dir;
    }

    /**
    * 设置cache
    *
    * @param  cacheName(string); data(array); cache_dir(string)
    */
    public static function set($cacheName, $data, $cache_dir = false)
    {
        $cache_dir = $cache_dir == false ? self::$cache_dir : $cache_dir;
        $dir = $cache_dir.$cacheName;

        $data = var_export($data, true);
        $data = "<?php
return ".$data.";";

        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = '';
        foreach($parts as $part) {

            if(!is_dir($dir .= "$part/")) {
                 mkdir($dir);
            }
        }

        file_put_contents("$dir/$file", $data);
    }

    /**
    * 文件是否存在
    *
    * @param  cacheName(string); cache_dir(string)
    * @return boolean
    */
    public static function isExist($cacheName, $cache_dir = false)
    {
        $cache_dir = $cache_dir == false ? self::$cache_dir : $cache_dir;

        $dir = $cache_dir.$cacheName;

        return file_exists($dir);

    }
}