<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php 

   $filecontent = $_GET['post']; // untuk getpost

  // panggil class model
   $PostReader = new PostReader();

  // membaca posting full serta tema
   echo $PostReader->readFullPost($theme,$filecontent);

?>
