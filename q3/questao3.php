<?php

  //Questão 3
  class Arquivo{
    private $txt;

   
    public function readFile($file){
      $this->txt = file_get_contents($file); 
    }

    public function printFile(){
      echo htmlentities($this->txt);
    }
	}
	
  $file = new Arquivo();
  $file->readFile('lorem.txt');
	$file->printFile();
   
?>