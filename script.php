<?php

// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect('usuario', 'senha', 'host:port/SID');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$query = "SELECT PES_ID, PES_NOME, PES_CEL FROM PESSOA WHERE PES_CEL IS NOT NULL ORDER BY PES_ID";


//verifico erros no select
$parse = ociparse($conn, $query);

//mando executar minha instrucao
$result = ociexecute($parse);

//caracteres que não deveriam estar junto ao numero e serão excluidos **** Sim estava um show de horrores mas consegui tirar todos
$lixo = array("a",'b','B', "e", "i", "o", "u", "A", "E", "I", "O", "U",'ú','Ú','-',' ','x','X',')','(','.','*','M','C','c','m','r','R','D','d','n','N','s','S','p','P','ó','Ó','g','G','Ã','ã','F','f','h','H','á','Á','j','J','+','[',']','t','T','m','M','_');

//alimento a array
$nrow = oci_fetch_all($parse,$arrDB);
$arrRetorno = array();

for($i = 0; $i < $nrow;$i++){
	
	$arrRow['PES_ID']  = $arrDB['PES_ID'][$i];
	$arrRow['PES_NOME']= $arrDB['PES_NOME'][$i];
	$arrRow['PES_CEL'] = $arrDB['PES_CEL'][$i];
	$arrRow['PES_CEL_TRIMED'] = str_replace($lixo, "", $arrDB['PES_CEL'][$i]);

	if (strstr($arrRow['PES_CEL_TRIMED'],'/')){
		$numbers = explode("/", $arrRow['PES_CEL_TRIMED']);
		$arrRow['PES_CEL_TRIMED'] = $numbers[0];
	}
		$arrRetorno[] = $arrRow;
}
		
	echo "$nrow rows fetched<br>\n";
$count = 0;
foreach($arrRetorno as  $pessoa){
	//Retira os zeros antes do DDD
	if(substr($pessoa['PES_CEL_TRIMED'], 0, 1) == 0){
		$pessoa['PES_CEL_TRIMED'] = substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 1);
	}

	if(strlen($pessoa['PES_CEL_TRIMED']) == 10){// verifica pela quantidade de caracteres se esta com DDD

		switch (substr($pessoa['PES_CEL_TRIMED'], 0, 2)){
			
			case 11:
				$pessoa['PES_CEL_TRIMED'] = '119'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 12:
				$pessoa['PES_CEL_TRIMED'] = '129'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;	
			case 13:
				$pessoa['PES_CEL_TRIMED'] = '139'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 14:
				$pessoa['PES_CEL_TRIMED'] = '149'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 15:
				$pessoa['PES_CEL_TRIMED'] = '159'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 16:
				$pessoa['PES_CEL_TRIMED'] = '169'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 17:
				$pessoa['PES_CEL_TRIMED'] = '179'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 18:
				$pessoa['PES_CEL_TRIMED'] = '189'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 19:
				$pessoa['PES_CEL_TRIMED'] = '199'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 21:
				$pessoa['PES_CEL_TRIMED'] = '219'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 22:
				$pessoa['PES_CEL_TRIMED'] = '229'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 24:
				$pessoa['PES_CEL_TRIMED'] = '249'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 27:
				$pessoa['PES_CEL_TRIMED'] = '279'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 28:
				$pessoa['PES_CEL_TRIMED'] = '289'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 31:
				$pessoa['PES_CEL_TRIMED'] = '319'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 32:
				$pessoa['PES_CEL_TRIMED'] = '329'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 33:
				$pessoa['PES_CEL_TRIMED'] = '339'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 34:
				$pessoa['PES_CEL_TRIMED'] = '349'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 35:
				$pessoa['PES_CEL_TRIMED'] = '359'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 37:
				$pessoa['PES_CEL_TRIMED'] = '379'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 38:
				$pessoa['PES_CEL_TRIMED'] = '389'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 41:
				$pessoa['PES_CEL_TRIMED'] = '419'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 42:
				$pessoa['PES_CEL_TRIMED'] = '429'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 43:
				$pessoa['PES_CEL_TRIMED'] = '439'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 44:
				$pessoa['PES_CEL_TRIMED'] = '449'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 45:
				$pessoa['PES_CEL_TRIMED'] = '459'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 46:
				$pessoa['PES_CEL_TRIMED'] = '469'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 47:
				$pessoa['PES_CEL_TRIMED'] = '479'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 48:
				$pessoa['PES_CEL_TRIMED'] = '489'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 49:
				$pessoa['PES_CEL_TRIMED'] = '499'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 51:
				$pessoa['PES_CEL_TRIMED'] = '519'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 53:
				$pessoa['PES_CEL_TRIMED'] = '539'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 54:
				$pessoa['PES_CEL_TRIMED'] = '549'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 55:
				$pessoa['PES_CEL_TRIMED'] = '559'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 61:
				$pessoa['PES_CEL_TRIMED'] = '619'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 62:
				$pessoa['PES_CEL_TRIMED'] = '629'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 63:
				$pessoa['PES_CEL_TRIMED'] = '639'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 64:
				$pessoa['PES_CEL_TRIMED'] = '649'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 65:
				$pessoa['PES_CEL_TRIMED'] = '659'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 66:
				$pessoa['PES_CEL_TRIMED'] = '669'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 67:
				$pessoa['PES_CEL_TRIMED'] = '679'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 68:
				$pessoa['PES_CEL_TRIMED'] = '689'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 69:
				$pessoa['PES_CEL_TRIMED'] = '699'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 71:
				$pessoa['PES_CEL_TRIMED'] = '719'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 73:
				$pessoa['PES_CEL_TRIMED'] = '739'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 74:
				$pessoa['PES_CEL_TRIMED'] = '749'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 75:
				$pessoa['PES_CEL_TRIMED'] = '759'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 77:
				$pessoa['PES_CEL_TRIMED'] = '779'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 79:
				$pessoa['PES_CEL_TRIMED'] = '799'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 81:
				$pessoa['PES_CEL_TRIMED'] = '819'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 82:
				$pessoa['PES_CEL_TRIMED'] = '829'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 83:
				$pessoa['PES_CEL_TRIMED'] = '839'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 84:
				$pessoa['PES_CEL_TRIMED'] = '849'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 85:
				$pessoa['PES_CEL_TRIMED'] = '859'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 86:
				$pessoa['PES_CEL_TRIMED'] = '869'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 87:
				$pessoa['PES_CEL_TRIMED'] = '879'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 88:
				$pessoa['PES_CEL_TRIMED'] = '889'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 89:
				$pessoa['PES_CEL_TRIMED'] = '899'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 91:
				$pessoa['PES_CEL_TRIMED'] = '919'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 92:
				$pessoa['PES_CEL_TRIMED'] = '929'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 93:
				$pessoa['PES_CEL_TRIMED'] = '939'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 94:
				$pessoa['PES_CEL_TRIMED'] = '949'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 95:
				$pessoa['PES_CEL_TRIMED'] = '959'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 96:
				$pessoa['PES_CEL_TRIMED'] = '969'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 97:
				$pessoa['PES_CEL_TRIMED'] = '979'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 98:
				$pessoa['PES_CEL_TRIMED'] = '989'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			case 99:
				$pessoa['PES_CEL_TRIMED'] = '999'.substr_replace($pessoa['PES_CEL_TRIMED'], '', 0, 2);
				break;
			
			
		}
		

	}else{
		$pessoa['PES_CEL_TRIMED'] = '9'.$pessoa['PES_CEL_TRIMED'];
	}


	// isso printa na tela os numeros novo para ver se ficaram correto
	echo '<pre>';
	echo($pessoa['PES_ID'].' - '.$pessoa['PES_CEL_TRIMED']);
	echo '</pre>';

	
		// Atualiza no banco o campo com o novo numero
		$sql = "UPDATE PESSOA SET PES_CEL = '".$pessoa['PES_CEL_TRIMED']."' WHERE PES_ID = ".$pessoa['PES_ID'];


		$parse = ociparse($conn, $sql);
		var_dump($parse);
		//mando executar minha instrucao
		$result = oci_execute($parse,OCI_COMMIT_ON_SUCCESS);
		var_dump($result);


		
	

}






?>