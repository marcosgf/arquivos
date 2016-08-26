<?php
//623
error_reporting(E_ERROR | E_PARSE);
for($i=1;$i<=623;$i++){
	$temp = explode("\n",file_get_contents("/home/gtbavi/Documentos/arquivos/tempos/$i.txt"));
	for($j=0;$j<sizeof($temp);$j++){
		
		$tempo= explode("|||||",$temp[$j]);
		echo "$tempo[0]|||||$tempo[1]\n";
		$nom1 = explode(".",$tempo[0]);
		$text1 = explode(":",$nom1[0]);
		$nom2 = explode(".",$tempo[1]);
		$text2 = explode(":",$nom2[0]);
		$inicio = ((int)$text1[0] * 3600) + ((int)$text1[1] * 60 ) + ((int) $text1[2]);
		$fim = ((int)$text2[0] * 3600) + ((int)$text2[1] * 60 ) + ((int) $text2[2]);
		$inicio = str_pad($inicio, 4, "0", STR_PAD_LEFT) . str_pad(substr(round((int)$nom1[1],-1),0,-1),2,0,STR_PAD_LEFT);
		$fim = str_pad($fim, 4, "0", STR_PAD_LEFT) . str_pad(substr(round((int)$nom2[1],-1),0,-1),2,0,STR_PAD_LEFT);
		$inicio = str_pad($inicio, 6, "0",STR_PAD_LEFT);
		$fim = str_pad($fim, 6, "0",STR_PAD_LEFT);
		$id1 = str_pad($i,3,"0",STR_PAD_LEFT);
		if($j==0) exec ( "sudo ffmpeg -i A$i.mp4 -vn -ac 1 -ab 256k -ar 16000 A$id1.wav && mkdir base_treinamento/A$id1");
		if(strlen($inicio) == 7){
			$inicio = substr($inicio,0,-1);		
		}
		if(strlen($fim) == 7){
			$fim = substr($fim,0,-1);		
		}
		exec ( "sudo ffmpeg -i A$id1.wav -ss 00:00:00.000 -t $tempo[1] base_treinamento/A$id1/$id1-p-$j.wav");
		$id2 = str_pad($j, 6, "0", STR_PAD_LEFT);
		exec ( "sudo ffmpeg -i base_treinamento/A$id1/$id1-p-$j.wav -ss $tempo[0] base_treinamento/A$id1/A$id1-$id2"."_$inicio-$fim.wav");
		unlink("/home/gtbavi/Documentos/arquivos/base_treinamento/A$id1/$id1-p-$j.wav");
	}

}
