<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

 // mulai class NavReader
 class NavReader extends idEngine {
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
         * class untuk membaca Konten Full Nav
        **/

         public function readFullNav($theme,$filename) {
         $this->read = parent::readSubFile(Contents,navbars,$filename,nav);
         $this->view = explode("\n", $this->read);
         $title = explode("{%title%}", $this->view[1]);
         $content = explode("{%content%}", $this->read);
         $this->open = $this->ThemeEngine->readTheme($theme,menu); // Full Nav
         $this->data = array("[title]" => $title[1], "[content]" => htmlspecialchars($content[1]));
         return strtr($this->open, $this->data); 
         }

        /**
         * class untuk membaca Konten NavMenu
        **/

         public function readNav($theme,$limit) {
         $this->arrayFile = parent::scan_dir(BASEPATH . 'Contents/navbars');
         $this->arrayFile = array_slice($this->arrayFile, 0, $limit, true); // untuk fitur limit
         foreach($this->arrayFile as $key => $value) {
         $this->explodeFile = explode(".",$value);
            if($this->explodeFile[1]=="nav") { 
         // "post" jenis filetype
         $this->read = parent::readSubFile(Contents,navbars,$this->explodeFile[0],nav); // post adalah jenis filetype
         $this->view = explode("\n", $this->read);
         $title = explode("{%menu%}", $this->view[0]);
         $this->open = $this->ThemeEngine->readTheme($theme,link); // Post
         $this->data = array("[title]" => $title[1], "[url]" => "?menu=" . $this->explodeFile[0]);
         echo strtr($this->open, $this->data); // sengaja echo karena jika pakai return tdk bisa tampil banyak
                }
             }
         }

  } // penutup class

?>