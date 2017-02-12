<?php
if (!defined('ID_ENGINE')) { die('Access Denied!'); }

/**
 * id Engine
 * Author : Yaya Laressa
 * Note : Please don't remove this copyright!
 **/

?>
<?php

 // mulai class idEngine

 class idEngine {
    public $open;
    public $read;
    public $view;
    public $arrayFile;
    public $explodeFile;
    public $karakter;
    public $readmore;
    public $noreadmore;
    public $ignored;
    public $files;
    public $formatdate;

  /**
   * class function untuk membaca file
   **/

    public function readFile($folder,$filename,$filetype) { 
        if (!file_exists(BASEPATH . $folder . '/' . $filename . '.' . $filetype)) {
        die("System error");
        exit(); }
        $this->open = BASEPATH . $folder . '/' . $filename . '.' . $filetype;
        $this->read = fopen($this->open, 'r');
        $this->view = fread($this->read,filesize($this->open));
  fclose($this->read);
        return $this->view;
     }

  /**
   * class function untuk membaca sub folder file
   **/

    public function readSubFile($folder,$subfolder,$filename,$filetype) { 
        if (!file_exists(BASEPATH . $folder . '/' . $subfolder . '/' . $filename . '.' . $filetype)) {
        die("System error");
        exit(); }
        $this->open = BASEPATH . $folder . '/' . $subfolder . '/' . $filename . '.' . $filetype;
        $this->read = fopen($this->open, 'r');
        $this->view = fread($this->read,filesize($this->open));
  fclose($this->read);
        return $this->view;
     }

  /**
   * class function untuk membaca [variable] dalam html
   **/

    public function explodeHTML($html,$path)
    {
        $first = "[".$path."]";
        $second = "[/".$path."]";
        $this->open = explode($first, $html);
        $this->close = explode($second, $this->open[1]);
        $this->explodeFile = $this->close[0];
        return $this->explodeFile;
     }

  /**
   * class function untuk scan filetype
   **/

      public function scanFileType($folder,$filetype) {
      $this->arrayFile = scandir(BASEPATH . $folder,1);
      foreach($this->arrayFile as $key => $value) {
      $this->explodeFile = explode(".",$value);
            if($this->explodeFile[1]==$filetype) {
               return $this->explodeFile[0];
             }
         }
      }

  /**
   * class function untuk fitur ReadMore
   **/

      public function post($postingan) {
               $this->karakter = strlen($postingan);
               if($this->karakter < 200) {
               $this->noreadmore = $postingan;
               return $this->noreadmore;
               } else {
               $this->readmore = substr($postingan,0,200);
               return $this->readmore;
                        }
                }

       public function scan_dir($dir) {
           $this->ignored = array('.', '..'); 
               $this->files = array(); 
           foreach (scandir($dir) as $file) { 
               if (in_array($file, $ignored))
           continue; 
               $this->files[$file] = filemtime($dir . '/' . $file); } 
           arsort($this->files); 
           $this->files = array_keys($this->files); 
           return ($this->files) ? $this->files : false; 
           }

         public function date($tanggal) {
             $dateshow = explode('-', $tanggal);
             $tahun = $dateshow[0];
             $arrayBulan = array(
              "01" => "Januari",
              "02" => "Februari",
              "03" => "Maret",
              "04" => "April",
              "05" => "Mei",
              "06" => "Juni",
              "07" => "Juli",
              "08" => "Agustus",
              "09" => "September",
              "10" => "Oktober",
              "11" => "November",
              "12" => "Desember"
              ); 
             $bulan = strtr($dateshow[1], $arrayBulan);
             $hari = $dateshow[2];
             $this->formatdate = $hari." ".$bulan." ".$tahun;
             return $this->formatdate;
              }
   
  } // penutup class idEngine

?>