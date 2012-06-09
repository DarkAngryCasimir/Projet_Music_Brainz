<-- Auteur : Vincent Le Guevel -->
<html>
	<body>
		<h1>Formulaire de recherche MusicBrainz</h1>
		<form name="f" action="#" method="POST">
			<label>Recherche:</label>
			<input type="text" name="rec" value="..." /><br/>
			<input type="radio" name="choix" value="album" /><label for="album">Album</label>
			<input type="radio" name="choix" value="artiste" /><label for="artiste">Artiste</label>
			<input type="radio" name="choix" value="morceau" /><label for="morceau">Morceau</label><br/>
			<label>Annee:</label>
			<input type="text" name="annee" value="<?php echo date('Y');?>" /><br/>
			<input type="submit" value="Valider" />
		</form>
	</body>
</html>

<?php	
	include_once("fct.php");
	if(isset($_POST['rec']) && ($_POST['rec'])!=""){
		$connect_array=array();
   
		$serveur="http://localhost:5290" ;
		$connect_array = xedix_connect ( $serveur ) ;
		$cleSession = $connect_array[1];
	
		$requete = "";
		$select = "";

		if($_POST['choix'] == "album"){
			$requete = $_POST['rec']."<DANS>";
			$select = "";
			echo "album";
		}
		else if($_POST['choix'] == "morceau"){
			$requete = $_POST['rec']."<DANS>";
			$select = "";
			echo "morceau";
		}
		else if($_POST['choix'] == "artiste"){
			$requete = $_POST['rec']."<DANS>"l;
			$select = "";
			echo "artiste";
		}

		/*$requete_url=my_encode2($requete) ;
		$select_url=my_encode2($select) ;
		
		$flux = xedix_send ($connect_array[0],$serveur,$cleSession,$requete_url,$select_url);*/
		
	}

?>
