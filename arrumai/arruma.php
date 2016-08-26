<?php
error_reporting(E_ERROR | E_PARSE);
//AJEITA SEGMENTS 
//INGLE : 595 611 612 618 619 620 622 623
/*$linha = file('/home/marcos/Área de Trabalho/arrumai/segments');
for($i=0 ; $i< sizeof($linha) ; $i++){
    $elemento = explode(" ",$linha[$i]);
    $escrita = explode("-",$elemento[0]);
    $inicio = $escrita[2];
    $inicio = $escrita[2];
    if((int)$elemento[2] > (int)$elemento[3]){
        $inicio = substr($escrita[2],0,-1);
    }
    $fim = $escrita[3];
    if(strlen($escrita[3])== 7){
        $fim = substr($escrita[3],0,-1);
    }
    //number_format(0403.23, 2, '.', '');
    $inicioT = substr($inicio,0,-2).".".substr($inicio,-2);
    $inicioT = number_format($inicioT, 2, '.', '');
    $fimT = substr($fim,0,-2).".".substr($fim,-2);
    $fimT = number_format($fimT, 2, '.', '');
    $texto = "A".str_pad(str_replace("A","",$escrita[0]),3,"0", STR_PAD_LEFT)."-".$escrita[1]."-".$inicio."-".$fim." "."A".str_pad(str_replace("A","",$escrita[0]),3,"0", STR_PAD_LEFT)." ".$inicioT." ".$fimT;
    echo $texto."\n";
}*/

//ARQUIVOS DO DIRETORIO
/*$path = scandir('/home/marcos/BASE_TRANSCRICAO/',1);
for ($i = 0 ; $i < sizeof($path) ; $i++){
    $arquivo = explode(".",$path[$i]);
    $arq = str_pad(str_replace("A","",$arquivo[0]),3,"0", STR_PAD_LEFT);
    exec("mv /home/marcos/BASE_TRANSCRICAO/$path[$i] /home/marcos/BASE_TRANSCRICAO/A$arq.wav");
}*/

//JUNTA SEGMENTS
/*
for($i = 1 ; $i <= 623 ; $i++){
  if($i != "595" && $i != "611" && $i != "612" && $i != "618" && $i != "619" && $i != "620" && $i != "622" && $i != "623"){
    $id = str_pad($i,3,"0",STR_PAD_LEFT);
    $linha = file('/home/marcosvaladao/Documentos/arquivos/arquivos/segments/A'.$id.'.txt');
    for( $j = 0 ; $j < sizeof($linha) ; $j++){
      file_put_contents('/home/marcosvaladao/Documentos/arquivos/segments', $linha[$j], FILE_APPEND);
    }
  }  
}


//JUNTA TEXT  A001-000002_001067-001250  O UNIVERSO É INFINITO
for($i = 1 ; $i <= 623 ; $i++){
  if($i != "595" && $i != "611" && $i != "612" && $i != "618" && $i != "619" && $i != "620" && $i != "622" && $i != "623"){
    $id = str_pad($i,3,"0",STR_PAD_LEFT);
    $linha = file('/home/marcosvaladao/Documentos/arquivos/arquivos/text/A'.$id.'.txt');
    for( $j = 0 ; $j < sizeof($linha) ; $j++){
      if ($linha[$j] != "\n" ){
        file_put_contents('/home/marcosvaladao/Documentos/arquivos/text', $linha[$j], FILE_APPEND);
      }
    }
  } 
}
*/

//A001-000058_024013-024119 ANOLUZ 
//A614 /home/gtbavi/Documentos/arquivos/A614.wav
//A001-000092_040915-041437 A001 409.15 414.37

//VERIFICA ERROS
$segments = file('/home/marcosvaladao/Documentos/arquivos/segments');
$text = file('/home/marcosvaladao/Documentos/arquivos/text');
$wav_scp = file('/home/marcosvaladao/Documentos/arquivos/wav_scp');

for($i = 0 ; $i < sizeof($wav_scp) ; $i++){
  $nome1 = explode(" ",$wav_scp[$i]);
  for($j = 0 ; $j < sizeof($segments) ; $j++){
    $nome2 = explode(" ",$segments[$i]);
    
  }
  for($l = 0 ; $l < sizeof($text) ; $l++){
    $nome3 = explode("-",$text); 
  }
  
}





































