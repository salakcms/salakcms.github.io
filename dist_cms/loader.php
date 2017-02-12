<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

// mulai session
session_start();

/**
 * Developer by Yaya Laressa
**/


$post = (isset($_GET['post'])) ? $_GET['post'] : false;
$menu = (isset($_GET['menu'])) ? $_GET['menu'] : false;

if (isset($post) && $post) { // untuk membaca artikel
    require PAGE . 'posts.php';

} 
else if (isset($menu) && $menu) { // untuk membaca konten menu
    require PAGE . 'menus.php';

} 
  else { // menampilkan halaman depan
    require PAGE . 'home.php';
}

?>
