<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

  // panggil class
   $NavLoader = new NavLoader();
   $NavReader = new NavReader();

   // begin sidebar
   echo  $NavLoader->BeginNavbar($theme);

   echo $NavReader->readNav($theme,3);

  // end sidebar
   echo $NavLoader->EndNavbar($theme);

?>
