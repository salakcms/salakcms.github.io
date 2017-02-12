<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

 // mulai class Engine
 class NavLoader extends idEngine {
      public $ThemeEngine;
      public $navbar;
      public $explodeFile;

        /**
         * class untuk NavLoader
        **/
      public function __construct() {
      $this->ThemeEngine = new ThemeEngine();
      }

      public function BeginNavbar($theme) {
      $this->navbar = $this->ThemeEngine->readTheme($theme,navbar);
      $this->explodeFile = $this->ThemeEngine->BeginHTML($this->navbar,navbarcode);
      return $this->explodeFile;
      }

      public function EndNavbar($theme) {
      $this->navbar = $this->ThemeEngine->readTheme($theme,navbar);
      $this->explodeFile = $this->ThemeEngine->EndHTML($this->navbar,navbarcode);
      return $this->explodeFile;
      }

  } // penutup class 

?>