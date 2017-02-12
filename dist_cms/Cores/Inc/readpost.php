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
   $limit = $config['limit'];

  // panggil class
   $model = new Model();
   $ThemeEngine = new ThemeEngine();
   $PostReader = new PostReader();

   // Tampilkan Halaman ReadPost

   // start pagination
   $model->startpage($limit);
   global $offset;

   echo $PostReader->readPost($theme,$offset,$limit);

   // nav pagination
   $total = $PostReader->totalPost();
   $model->pagenums($theme,$total,$limit);
   // end pagination


?>
