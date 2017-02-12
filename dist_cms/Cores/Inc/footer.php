<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php
  
  // load config
   $copyright = $config['copyright'];

  // panggil class
   $ThemeEngine = new ThemeEngine();

  // membaca footer
   $footer = $ThemeEngine->readTheme($theme,footer);

   // Tampilkan Halaman Footer
   echo str_replace("[copyright]", $copyright, $footer);

?>
