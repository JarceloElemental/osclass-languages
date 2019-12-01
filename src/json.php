<?php
/*
 * Script will create a JSON file for every language folder with it's name and code.
 * Navjot used Python, but I'll stick with PHP.
 *
 * WEBmods
*/

$languages = array();
$langFolders = glob(__DIR__ . '/*' , GLOB_ONLYDIR);
foreach($langFolders as $folder) {
    $code = basename($folder);
    if(file_exists($folder.'/index.php')) {
        include_once $folder.'/index.php';
        $data = call_user_func('locale_'.$code.'_info');
        $languages[$code] = $data['name'];
    } else {
        continue;
    }
}

file_put_contents('list.json', json_encode($languages, JSON_PRETTY_PRINT));
?>
