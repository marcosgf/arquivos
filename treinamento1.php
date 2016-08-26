<meta charset="UTF-8">  
<?php

function removeCaracteres($x) {
    $remover = array("WEBVTT", ",","!", '"', "-", ":", ".", ">","?","[","]","_", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0","MÚSICA");
    
    $trocaMIN = array(
        'à', 'á', 'ã', 'â',
        'ê', 'é',
        'í',
        'ó', 'õ', 'ô',
        'ú', 'ü',
        'ç',
        'é', 'ê');

    $trocaMAI = array(
        'À', 'Á', 'Ã', 'Â',
        'Ê', 'É',
        'Í',
        'Ó', 'Õ', 'Ô',
        'Ú', 'Ü',
        'Ç',
        'É', 'Ê');
    
    return $x=(strtoupper(str_replace($trocaMIN,$trocaMAI,(str_replace($remover,"",$x)))));
}

for($aulanum=1;$aulanum<=1;$aulanum++){
	//Mudar o caminho de acordo com o arquivo srt ou vtt que for usar.
	$arquivo = "/home/gtbavi/Documentos/arquivos/A".$aulanum.".vtt";
	$file = file($arquivo, FILE_IGNORE_NEW_LINES);

	//$tam= count($var) . '<br>';
	//echo $tam;

	foreach ($file as &$item) {
		$item=removeCaracteres($item);
		if (strlen($item) == 2)
			$item = "/";
		  //echo $item."\n";
	}

	$file = array_filter($file);

	//echo count($var);
	//foreach($var as $item)
	//echo $item."<br>";

	//Caminho aonde serão criados os aquivos
	$camaux = '/home/gtbavi/Documentos/arquivos/aux';
	//$cam = '/home/gtbavi/Área de Trabalho/documents-export-2016-07-25/A'.$aulanum;
	$extencao = '.txt';


	//Cria um aquivo auxiliar que será excluido depois do processo
	$t=0;
	foreach ($file as $item) {
		if($t==0) $frase = "";		
		elseif ($item == '/')
			$frase = "\n";
		else
			$frase = $item . " ";
	file_put_contents($camaux . $extencao, $frase, FILE_APPEND);
	$t++;
	}

	//Criando arquivo principal.
	$file2 = file($camaux . $extencao);
	$i = 0;
	
	//	CRIA ARQUIVO TEXT 
	/*$id1 = str_pad($aulanum,3,"0", STR_PAD_LEFT);
	$path = scandir('/home/gtbavi/Documentos/arquivos/base_treinamento/A'.$id1,1);
	foreach ($file2 as $item) {
		
		for($j=0;$j<sizeof($path);$j++){
		  $aux = explode("_",$path[$j]);
		  $idaux  = explode("-",$aux[0]);
		  if ($idaux[1] == strval($i)){
		    $id = $j;
		  }
		}
		$name = explode(".",$path[$id]);
		if (strlen($item) == 1)
			$frase = $item;
		else {
			$frase = $name[0]." ".$item;
		}
		file_put_contents('/home/gtbavi/Documentos/arquivos/arquivos/text/A'.$id1.'.txt', $frase, FILE_APPEND);
		$i++;
	}
	file_put_contents('/home/gtbavi/Documentos/arquivos/arquivos/text/A'.$id1.'.txt', "\n", FILE_APPEND);

	//CRIA ARQUIVO SEGMENTS 
	$arqText = file('/home/gtbavi/Documentos/arquivos/arquivos/text/A'.$id1.'.txt');
	$path = scandir('/home/gtbavi/Documentos/arquivos/base_treinamento/A'.$id1,1);
	for($k=0;$k<=sizeof($path);$k++){
	  $base = explode(".",$path[$k]);
	  if($base[1] == "wav"){
		  $aux = explode("-",$base[0]);
		  $pat1 = $aux[0];
		  $aux2 = explode("_",$base[0]);
		  $tempos = explode("-",$aux2[1]);
		  $inicio = intval($tempos[0]);
		  $fim = intval($tempos[1]);
		  if(strlen($inicio) == 1 && $inicio != 0) $inicio = "0.0".$inicio;
		  if(strlen($fim) == 1) $fim = "0.0".$fim;
		  if(strlen($inicio) == 2) $inicio = "0.".$inicio;
		  if(strlen($fim) == 2) $fim = "0.".$fim;
		  if(strlen($inicio) >= 3) $inicio = substr($inicio,0,-2).".".substr($inicio,-2);
		  if(strlen($fim) >= 3) $fim = substr($fim,0,-2).".".substr($fim,-2);
		  $frase = $base[0]." ".$pat1." ".$inicio." ".$fim."\n";
		  file_put_contents('/home/gtbavi/Documentos/arquivos/arquivos/segments/A'.$id1.'.txt',$frase, FILE_APPEND);
	  }
	}
	*/	
	//CRIA ARQUIVO WAV.SCP
	$path = scandir('/home/gtbavi/Documentos/arquivos/',1);
	for($i = 0 ; $i < sizeof($path); $i++){
		$arquivo = explode(".",$path[$i]);
		if($arquivo[1] == "wav"){
			$frase = $arquivo[0] . " /home/gtbavi/Documentos/arquivos/".$arquivo[0].".wav\n";
			file_put_contents('/home/gtbavi/Documentos/arquivos/arquivos/wav.scp/wav_scp'.'.txt',$frase, FILE_APPEND);
		}
	}

	//Apaga o arquivo auxliar

	unlink($camaux . $extencao);	
}

//echo file_get_contents($cam . $extencao);
?>
