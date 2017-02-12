<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

 // mulai class Model
 class Model extends idEngine {
      public $ThemeEngine;

         public function __construct() {
         $this->ThemeEngine = new ThemeEngine();
         }

         public function startpage($limit) {  
         if(!isset($_GET[page])||empty($_GET[page])) {
          $start = "0";
          $page = "1";
                } else {
          $start = ($_GET[page] - 1) * $limit;
          $page = $_GET[page];
         }
         // memasukkan ke variable global karena start & page nya ada 2 jadi harus memasukan ke global begini
         $GLOBALS['offset'] = $start;
         $GLOBALS['page'] = $page;
         }

         public function pagenums($theme,$total,$limit) {
         global $page;

         $paging = ceil($total/$limit);
         
         $pagination = $this->ThemeEngine->readTheme($theme,pagination);
         $pageleft = $this->ThemeEngine->readTheme($theme,pageleft);
         $pageright = $this->ThemeEngine->readTheme($theme,pageright);

         echo $this->ThemeEngine->BeginHTML($pagination,pagenums);

         if ($paging > 1) {
         if ($page > 1) {
         $prev = "?page=".($page-1);
         echo str_replace("[prev]", $prev, $pageleft);
         } else {
         // ini ditampilkan saat off bagian kiri
                }
         if ($page < $paging) {
         $next = "?page=".($page+1);
         echo str_replace("[next]", $next, $pageright);
          } else {
         // saat bagian kanan off tdk ada data
                   }
               }
         echo $this->ThemeEngine->EndHTML($pagination,pagenums);
           }

  } // penutup class Model

?>