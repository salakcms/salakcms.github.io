<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

 // mulai class WidgetReader
 class WidgetReader extends idEngine {
      public $read;
      public $view;
      public $open;
      public $arrayFile;
      public $explodeFile;
      public $data;
      public $ThemeEngine;
      public $SideLoader;
      public $widget;

      public function __construct() {
      $this->ThemeEngine = new ThemeEngine();
      $this->SideLoader = new SideLoader();
      }

        /**
         * class untuk membaca Widget Posting Terakhir
        **/

         public function readLastPost($theme,$limit) {
         $this->arrayFile = parent::scan_dir(BASEPATH . 'Contents/posts');
         $this->arrayFile = array_slice($this->arrayFile, 0, $limit, true); // untuk fitur limit
         foreach($this->arrayFile as $key => $value) {
         $this->explodeFile = explode(".",$value);
            if($this->explodeFile[1]=="post") { 
         // "post" jenis filetype
         $this->read = parent::readSubFile(Contents,posts,$this->explodeFile[0],post); // post adalah jenis filetype
         $this->view = explode("\n", $this->read);
         $title = explode("{%title%}", $this->view[0]);
         $this->open = $this->ThemeEngine->readTheme($theme,link); // Post
         $this->data = array("[title]" => $title[1], "[url]" => "?post=" . $this->explodeFile[0]);
         echo strtr($this->open, $this->data); // sengaja echo karena jika pakai return tdk bisa tampil banyak
                }
             }
         }

         /**
          * Widget Reader
          * From folder widgets
          **/

         public function readWidget($theme,$limit) {
         $this->arrayFile = parent::scan_dir(BASEPATH . 'Contents/widgets');
         $this->arrayFile = array_slice($this->arrayFile, 0, $limit, true); // untuk fitur limit
         foreach($this->arrayFile as $key => $value) {
         $this->explodeFile = explode(".",$value);
            if($this->explodeFile[1]=="wid") { 
         // "post" jenis filetype
         $this->read = parent::readSubFile(Contents,widgets,$this->explodeFile[0],wid);
         $this->view = explode("\n", $this->read);
         $title = explode("{%title%}", $this->view[0]);
         $content = explode("{%content%}", $this->read);

   // begin widget
   $this->widget = $this->ThemeEngine->readTheme($theme,widget);
         $this->data = array("[title]" => $title[1], "[widgetcode]" => $content[1]);
         echo strtr($this->widget, $this->data);
   // end widget

                }
             }
         }


  } // penutup class

?>