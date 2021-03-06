<?php

namespace core\Group;

use core\Group\App\App;

Class Kernal
{
	public function init()
	{
		$this -> fix_gpc_magic();
		$app = new App();
	   	$app -> init();
	}

	public function fix_gpc_magic()
	{
		static $fixed = false;
		if (!$fixed && ini_get('magic_quotes_gpc')) {

			array_walk($_GET, '_fix_gpc_magic');
			array_walk($_POST, '_fix_gpc_magic');
			array_walk($_COOKIE, '_fix_gpc_magic');
			array_walk($_REQUEST, '_fix_gpc_magic');
			array_walk($_FILES, '_fix_gpc_magic_files');

		}
		$fixed = true;
	}

	private static function _fix_gpc_magic(&$item)
	{
		if (is_array($item)) {
			array_walk($item, '_fix_gpc_magic');
			}
			else {
			$item = stripslashes($item);
		}
	}

	private static function _fix_gpc_magic_files(&$item, $key)
	{
		if ($key != 'tmp_name') {

			if (is_array($item)) {
			  array_walk($item, '_fix_gpc_magic_files');
			}
			else {
			  $item = stripslashes($item);
			}

		}
	}
}
