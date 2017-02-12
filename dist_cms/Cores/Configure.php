<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

   /**
    * Configure for SalakCMS
    * Developer by Yaya Laressa
    **/

     $config['domain'] = "http://".$_SERVER['HTTP_HOST'];
     $config['theme'] = "simple"; // theme
     $config['limit'] = "3"; // limit post
     $config['sitename'] = "Salak CMS"; // site name
     $config['description'] = "Just Write, Upload, Publish your content !"; // description
     $config['copyright'] = "2016 - " . date('Y') . " © SalakCMS - Developer by Yaya Laressa";

?>