<?php
// hindari akses langsung ke file ini
define('ID_ENGINE','OPEN');

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

     error_reporting(0);
     date_default_timezone_set("Asia/Jakarta");

    // definisi direktori
       define('BASEPATH', (__DIR__) . '/');
       define('CORE', BASEPATH . 'Cores/');
       define('PAGE', BASEPATH . 'Pages/');
       define('LIB', CORE . 'Libs/');
       define('INC', CORE . 'Inc/');

    // masukkan file class HARUS dimulai dari engine.php
    // karena engine.php adalah induk class
        require CORE . 'Configure.php';
        require CORE . 'idEngine.php';
        require CORE . 'Model.php';

     // Load Libs
        require LIB . 'ThemeEngine.php';
        require LIB . 'NavLoader.php';
        require LIB . 'NavReader.php';
        require LIB . 'PostReader.php';
        require LIB . 'SideLoader.php';
        require LIB . 'WidgetLoader.php';
        require LIB . 'WidgetReader.php';

     // file loader.php
    if (!file_exists(BASEPATH . 'loader.php')) { die('File Loader Tidak ada'); }

    // sisipkan file loader.php
    include BASEPATH . 'loader.php';

?>