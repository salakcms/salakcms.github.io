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
 class SideLoader extends idEngine {
      public $ThemeEngine;
      public $sidebar;
      public $explodeFile;

        /**
         * class untuk SideLoader
        **/
      public function __construct() {
      $this->ThemeEngine = new ThemeEngine();
      }

      public function BeginSidebar($theme) {
      $this->sidebar = $this->ThemeEngine->readTheme($theme,sidebar);
      $this->explodeFile = $this->ThemeEngine->BeginHTML($this->sidebar,sidebarcode);
      return $this->explodeFile;
      }

      public function EndSidebar($theme) {
      $this->sidebar = $this->ThemeEngine->readTheme($theme,sidebar);
      $this->explodeFile = $this->ThemeEngine->EndHTML($this->sidebar,sidebarcode);
      return $this->explodeFile;
      }

  } // penutup class 

?>