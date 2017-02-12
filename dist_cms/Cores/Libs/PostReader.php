<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

 // mulai class PostReader
 class PostReader extends idEngine {
      public $read;
      public $view;
      public $open;
      public $arrayFile;
      public $explodeFile;
      public $data;
      public $totalArray;
      public $ThemeEngine;

      public function __construct() {
      $this->ThemeEngine = new ThemeEngine();
      }

        /**
         * class untuk membaca Konten Fullpost
        **/

         public function readFullPost($theme,$filename) {
         $this->read = parent::readSubFile(Contents,posts,$filename,post);
         $this->view = explode("\n", $this->read);
         $title = explode("{%title%}", $this->view[0]);
         $date = explode("{%date%}", $this->view[1]);
         $author = explode("{%author%}", $this->view[2]);
         $content = explode("{%content%}", $this->read);
         $this->open = $this->ThemeEngine->readTheme($theme,fullpost); // Full
         $this->data = array("[title]" => $title[1], "[date]" => parent::date($date[1]), "[author]" => $author[1], "[content]" => htmlspecialchars($content[1]));
         return strtr($this->open, $this->data); 
         }

        /**
         * class untuk membaca Konten MorePost
        **/

         public function readPost($theme,$offset,$limit) {
         $this->arrayFile = parent::scan_dir(BASEPATH . 'Contents/posts');
         $this->arrayFile = array_slice($this->arrayFile, $offset, $limit, true); // untuk fitur pagination
         foreach($this->arrayFile as $key => $value) {
         $this->explodeFile = explode(".",$value);
            if($this->explodeFile[1]=="post") { 
         // "post" jenis filetype
         $this->read = parent::readSubFile(Contents,posts,$this->explodeFile[0],post); // post adalah jenis filetype
         $this->view = explode("\n", $this->read);
         $title = explode("{%title%}", $this->view[0]);
         $date = explode("{%date%}", $this->view[1]);
         $author = explode("{%author%}", $this->view[2]);
         $content = explode("{%content%}", $this->read);
         $this->open = $this->ThemeEngine->readTheme($theme,post); // Post
         $this->data = array("[title]" => $title[1], "[urlpost]" => "?post=" . $this->explodeFile[0], "[date]" => parent::date($date[1]), "[author]" => $author[1], "[content]" => parent::post(htmlspecialchars($content[1])));
         echo strtr($this->open, $this->data); // sengaja echo karena jika pakai return tdk bisa tampil banyak
                }
             }
         }

         public function totalPost() {
         $this->arrayFile = scandir(BASEPATH . 'Contents/posts');
         $this->totalArray = count($this->arrayFile) - 2; // dikurangi 2 krn "." ".." jd tdk dihitung
         return $this->totalArray;
         }


  } // penutup class

?>