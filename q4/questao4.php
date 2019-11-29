
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Questão 4</title>
</head>
<body>

  <form action="questao4.php" method="post" enctype="multipart/form-data">
    <h3>Selecione o arquivo (formato .txt):</h3>
    <input type="file" name="fileUpload" id="fileUpload"><br><br>
    <input type="submit" value="Enviar" name="submit">
  </form>

  <?php
    //Questão 4
    //Obs: nessa lógica acabei não utilizando nenhum método criado na questão 3
    class Arquivo{
      private $txt;

      public function readFile($file){
        $this->txt = file_get_contents($file); 
      }

      public function printFile($file){
        echo htmlentities($file);
      }

      public function readFileUploaded(){
        //checa se o formulário foi enviado
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $this->txt = $_FILES["fileUpload"];
          //verifica se carregou o arquivo
          if(empty($this->txt["tmp_name"])){
            echo "Selecione um arquivo antes!<br>";
          }
          else{
            //verifica se o arquivo é do tipo .txt 
            if($this->txt["type"] != 'text/plain'){
              echo "Somente arquivos .txt são permitidos!<br>";
            }else{
              //verifica se não há erros
              if($this->txt["error"] == 0){
                //imprime o conteúdo do arquivo
                echo "<hr>";
                echo "<h3>Conteúdo do arquivo: </h3>";
                echo file_get_contents($this->txt['tmp_name']); 
              }else{
                echo "Erro no arquivo!<br>";
              }
            }
          }
        }
      }//fim função

    }//fim classe
	
    $p1 = new Arquivo();
    echo "<br>";
    $p1->readFileUploaded();
   
  ?>
  
</body>
</html>
  
