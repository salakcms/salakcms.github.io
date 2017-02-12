<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

  // Load configure
   $theme = $config['theme'];
   $domain = $config['domain'];
   $sitetitle = $config['sitename'];
   $sitename = $config['sitename'];
   $description = $config['description'];

  // panggil class
   $ThemeEngine = new ThemeEngine();

  // membaca header
   $header = $ThemeEngine->readTheme($theme,header);

   // Tampilkan Header
   $arrayHeader = array("[title]" => $sitetitle,
                        "[sitename]" => $sitename, 
                        "[domain]" => $domain,
                        "[description]" => $description);
   echo strtr($header, $arrayHeader);

?>
