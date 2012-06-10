<?php
	
########################################################
# 		  Récupération des champs du formulaire        #
########################################################	
	
$champs1 = $_POST['champs_1'];
$textchamps1 = $_POST['text_champs_1'];
print("<center>Bonjour $champs1 $textchamps1 </center>");


########################################################
# 				   Connexion à XediX       			   #
########################################################	

$connect_array=array();
   $serveur="http://localhost:5290" ;
   $connect_array = xedix_connect ( $serveur ) ;
   $cleSession = $connect_array[1];

# Requetage
$requete= $textchamps1." <DANS> ".$champs1;

//$requete= "*";

# On encode la requete pour la passer en argument
   $requete_url=my_encode2($requete) ;

   
########################################################
# 				   Récupération l'id  		           #
########################################################

    # Selection de l'id
  $select1="from<all|0>;to<all|0>;subject<all|0>;body<all|0>;";

# On encode la selection pour la passer en argument
   $select_url=my_encode2($select1);

# On envoie l'appel regroupant requete+selection a XediX
   $flux1 = xedix_send ($connect_array[0],$serveur,$cleSession,$requete_url,$select_url) ;
   $idArray= $flux1;
 
 
########################################################
# 			  Récupération de l'expediteur  	       #
########################################################
 

 # Selection de l'expediteur
  $select1="id<all|0>;to<all|0>;subject<all|0>;body<all|0>;";

# On encode la selection pour la passer en argument
   $select_url=my_encode2($select1);

# On envoie l'appel regroupant requete+selection a XediX
   $flux1 = xedix_send ($connect_array[0],$serveur,$cleSession,$requete_url,$select_url) ;
   
   $fromArray = split(".com",$flux1);
   
   $nbvaleurs = count($fromArray) - 1;
   
  for($i=0; $i < $nbvaleurs;$i++){
   	$fromArray[$i] = $fromArray[$i].".com";
   }
   
   
########################################################
# 				  Récupération du sujet  		       #
########################################################


    # Selection du sujet
  $select1="id<all|0>;to<all|0>;body<all|0>;";

# On encode la selection pour la passer en argument
   $select_url=my_encode2($select1);

# On envoie l'appel regroupant requete+selection a XediX
   $flux1 = xedix_send ($connect_array[0],$serveur,$cleSession,$requete_url,$select_url) ;
   
   $subjectArray = split($fromArray[0],$flux1);
   
   
########################################################
# 			  Récupération du destinataire  	       #
########################################################


    # Selection du destinataire
  $select1="id<all|0>;from<all|0>;subject<all|0>;body<all|0>;";

# On encode la selection pour la passer en argument
   $select_url=my_encode2($select1);

# On envoie l'appel regroupant requete+selection a XediX
   $flux1 = xedix_send ($connect_array[0],$serveur,$cleSession,$requete_url,$select_url) ;
   
  $toArray = split(".com",$flux1);
   
   $nbvaleurs = count($fromArray) - 1;
   
  for($i=0; $i < $nbvaleurs;$i++){
   	$toArray[$i] = $toArray[$i].".com";
   	}

########################################################
# 				  Récupération du body  		       #
########################################################

    # Selection du body
  $select1="id<all|0>;to<all|0>;subject<all|0>;";

# On encode la selection pour la passer en argument
   $select_url=my_encode2($select1);

# On envoie l'appel regroupant requete+selection a XediX
   $flux1 = xedix_send ($connect_array[0],$serveur,$cleSession,$requete_url,$select_url) ;
   
   $bodyArray = split($fromArray[0],$flux1);
      
########################################################
# 					  Corps de la page	 		       #
########################################################

 	
	print "<html xmlns='http://www.w3.org/1999/xhtml'>";
	print "<head>";
		print "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
		print "<title>Recherche MusiBrainz</title>";
		print "<link rel='stylesheet' type='text/css' href='view.css' media='all'>";
		print "<script type='text/javascript' src='view.js'></script>";

	print "</head>";
	print "<body id='main_body'>";
	
	print "<img id='top' src='top.png' alt=''>";
	print "<div id='form_container'>";
		
		print "<h1><a>Recherche MusicBrainz</a></h1>";
		print "<div id='form_427450' class='appnitro'>";
			print "<div class='form_description'>";
				print "<h2>Recherche MusiBrainz</h2>";
				print "<p>Sélectionnez vos champs de recherche puis entrez les termes recherchés</p>";
			print "</div>";						
	
			print "<table border='1'>";
			print "<tr><td><b>De</b></td> <td><b>Sujet</b></td></tr>";
			
			
			$nb = 0;
		    for ( $i=0; $i < $nbvaleurs ; $i++ ) {
			if(substr_count($fromArray[$i],$textchamps1)> 0 || substr_count($subjectArray[$i+1],$textchamps1)> 0  || 
			substr_count($toArray[$i],$textchamps1)> 0 || substr_count($bodyArray[$i+1],$textchamps1)> 0 ){
				print "<tr><td>".$fromArray[$i]."</td> <td>".$subjectArray[$i+1]."</td><td><a href = mail.php?id=".$idArray[$i].">Lire</a></td></tr>";
				$nb++;
			  }
				
		   }
		   print "</table>";
		 
		   if($nb == 0){
			print "<P><i>Aucun r&eacute;sultat.</i>";
			}

		print "</div>";	
	print "<a href = form.html>&#60;-Retour</a>";	
	print "</div>";
	
	print "<img id='bottom' src='bottom.png' alt=''>";
	print "</body>";
print "</html>";



########################################################
# 					  Fonctions XediX 			       #
########################################################

  
function tagextract ($tag,$f) {
	
   $tago="<".$tag.">" ;
   $tagf="</".$tag.">" ;
   $temp=explode($tago,$f);
   $temp1=$temp[1];
   $temp2=explode($tagf,$temp1);
   return $temp2[0];
}

function xedix_connect ( $serveur ) {

#  Identification de l'utilisateur

   $login='admin' ;
   $password=rawurlencode('xedix#amodifier') ;
   $c='';

#  Ouverture de la session

   $fi=fopen($serveur.'/cgi-bin/client?X2Admin+13++login='.$login.'&pwd='.$password.'&output=xml', 'r');

   if ( $fi == 0 ) {
        echo 'Connexion impossible' ;
        exit (1) ;
   }

   while(!feof($fi)){
       $c .= fread($fi, 4096);
       }

# Extraction de la valeur de la cle de session

    $cleSession=tagextract("clefsession",$c) ;
    $retour=array();
    $retour[0]=$fi ;
    $retour[1]= $cleSession ;
    return  $retour ;
}

function xedix_send ($fr,$serveur,$cleSession,$requete_url,$select_url) {
	
    $cc='';
    $fr=fopen($serveur."/cgi-bin/client?X2Xsearch+7+admin,".$cleSession."+allrequest=".$requete_url."&elems=".$select_url."&output=xml&targetcoll=listepropre&high=no&display=simple",'r');
	
   if ( $fr == 0 ) {
        echo "L'envoi de donnees a echoue" ;
        exit (1) ;
   }

   while(!feof($fr)){

        $cc .= fread($fr, 4096);
   
   }

# Nettoyage du flux XML
  
   $flux=tagextract("doclisteetendue",$cc);

    return $flux;
}


function xedix_disconnect ($fr) {

	fclose($fr) ;
	return ;
}


function my_encode2 ( $chaine ) {

	$temp3=str_replace(" ","+",$chaine);
	return $temp3 ;
}

?> 