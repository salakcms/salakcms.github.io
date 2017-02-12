<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

  // panggil class
   $SideLoader = new SideLoader();
   $WidgetLoader = new WidgetLoader();
   $WidgetReader = new WidgetReader();

   // begin sidebar
   echo  $SideLoader->BeginSidebar($theme);

   /////////////////    ///////////////////
   // begin widget
   $BeginWidget = $WidgetLoader->BeginWidget($theme);
   echo str_replace("[title]", "Postingan Terbaru", $BeginWidget);
   // widget Last Post
   echo $WidgetReader->readLastPost($theme,5); // 5 adalah limit
   // end widget
   echo $WidgetLoader->EndWidget($theme);
  ///////   /////////////////////////////
   // custom Widget

    echo $WidgetReader->readWidget($theme,5);

   // end sidebar
   echo $SideLoader->EndSidebar($theme);


?>
