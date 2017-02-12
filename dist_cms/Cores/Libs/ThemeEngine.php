<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

 // mulai class ThemeEngine
 class ThemeEngine extends idEngine {
      public $read;
      public $view;
      public $open;
      public $explodeFile;

        /**
         * class untuk membaca Tema
        **/

        public function readTheme($theme,$path) {
        $this->read = parent::readSubFile(Themes,$theme,template,html);
        $this->explodeFile = parent::explodeHTML($this->read,$path);
        $path_theme = 'Themes/' . $theme;
        $this->view = str_replace("[path_theme]", $path_theme, $this->explodeFile);
         return $this->view;
        }

         public function BeginHTML($theme,$path) {
          $this->explodeFile = explode("[".$path."]", $theme);
          return $this->explodeFile[0];
         }

         public function EndHTML($theme,$path) {
          $this->explodeFile = explode("[".$path."]", $theme);
          return $this->explodeFile[1];
         }

  } // penutup class Model

?>