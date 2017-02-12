<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php 

   $filecontent = $_GET['menu']; // untuk getmenu

  // panggil class 
   $NavReader = new NavReader();

  // membaca page menu full serta tema
   echo $NavReader->readFullNav($theme,$filecontent);

?>
