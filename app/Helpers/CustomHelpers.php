
<?php

/**
 *
 * Set active css class if the specific URI is current URI
 *
 * @param string $path       A specific URI
 * @param string $class_name Css class name, optional
 * @return string            Css class name if it's current URI,
 *                           otherwise - empty string
 */
	
if (!function_exists('active_menu')) {
	function active_menu($currentRouteName, $requestName, $start, $finish){
		if (substr($currentRouteName, $start, $finish) == $requestName) {
			return 'active';
		}else{
			return null;
		}
	}
}

