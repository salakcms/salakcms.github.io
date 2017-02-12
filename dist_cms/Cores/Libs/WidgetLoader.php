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
 class WidgetLoader extends idEngine {
      public $ThemeEngine;
      public $widget;
      public $explodeFile;

        /**
         * class untuk WidgetLoader
        **/
      public function __construct() {
      $this->ThemeEngine = new ThemeEngine();
      }

      public function BeginWidget($theme) {
      $this->widget = $this->ThemeEngine->readTheme($theme,widget);
      $this->explodeFile = $this->ThemeEngine->BeginHTML($this->widget,widgetcode);
      return $this->explodeFile;
      }

      public function EndWidget($theme) {
      $this->widget = $this->ThemeEngine->readTheme($theme,widget);
      $this->explodeFile = $this->ThemeEngine->EndHTML($this->widget,widgetcode);
      return $this->explodeFile;
      }

  } // penutup class 

?>