<-- Auteur : Vincent Le Guevel -->
<html>
	<body>
		<h1>Formulaire d'ajout de CD MusicBrainz</h1>
		<?php	
		if(!isset($_POST['nbL'])){
		?>		
		<form name="f1" action="#" method="POST">
			<label>Nombre de titres de l'album:</label>
			<input type="text" name="nbL" value="" /><br/>
			<input type="submit" value="Valider" />		
		</form>
		<?php
		}
			
		if(!isset($_POST['artiste']) && isset($_POST['nbL']) && ($_POST['nbL'])!=""){
		?>	
		<form name="f2" action="#" method="POST">
			<label>Artiste:</label>
			<input type="text" name="artiste" value="" /><br/>
			<label>Album:</label>
			<input type="text" name="album" value="" /><br/>
			<label>Annee:</label>
			<input type="text" name="annee" value="<?php echo date('Y');?>" /><br/>
			<?php
			for($i=0;$i<$_POST['nbL'];$i++){
			?>
			<label>Track <?php echo $i+1; ?>:</label>
			<input type="text" name="track<?php echo $i+1; ?>" value="" /><br/>
			<?php
			}
			?>
			<input type="hidden" name="nbL" value="<?php echo $_POST['nbL']; ?>" />
			<input type="submit" value="Valider" />
		</form>
		<?php
		}
		?>
	</body>
</html>
<?php	
	include_once("fct.php");
	if(isset($_POST['artiste']) && ($_POST['artiste'])!="" && isset($_POST['album']) && ($_POST['album'])!="" && isset($_POST['annee']) && ($_POST['annee'])!=""){
		
		$rd = rand();

		//creation premiere table
		$release_g = fopen("/var/www/xml/release_g.xml", "w+");
		$text = "<?xml version='1.0'?>
			<!DOCTYPE release_group SYSTEM 'release_group.dtd'>
			<?XEDIX id $rd?>
			<?XEDIX class DO?>
			<release_group>
				<id>1</id>
				<gid>123</gid>
				<name>".$_POST['album']."</name>
				<artist_credit>".$_POST['artiste']."</artist_credit>
				<type></type>
				<comment></comment>
				<edits_pending></edits_pending>
				<last_updated></last_updated>
			</release_group>";
		echo $text;
		fwrite($release_g, $text);
		fclose($release_g);
		
		//creation deuxieme table
		$artist = fopen("xml/artist.xml", "w+");
		$text = "<?xml version='1.0'?>
			<!DOCTYPE artist_credit SYSTEM 'artist_credit.dtd'>
			<?XEDIX id ". $rd+1 ."?>
			<?XEDIX class DO?>
				<artist_credit>
					<id>1.".$_POST['artiste']."</id>
					<name>".$_POST['artiste']."</name>
					<artist_count></artist_count>
					<ref_count></ref_count>
					<created></created>
				</artist_credit>";
		fputs($artist, $text);
		fclose($artist);
		
		//creation troisieme table
		for($i=0;$_POST['nbL'];$i++){		
			$track = fopen("xml/track".$i.".xml", "w+");
			$text = "<?xml version='1.0'?>
				<!DOCTYPE track SYSTEM 'track.dtd'>
				<?XEDIX id ". $rd+2 ."?>
				<?XEDIX class DO?>
				<track>
					<id>". $i+1 ."</id>
					<recording></recording>
					<tracklist></tracklist>
					<position>". $i+1 ."</position>
					<name>".$_POST['track'.$i+1]."</name>
					<artist_credit>".$_POST['artiste']."</artist_credit>
					<length></length>
					<edits_pending></edits_pending>
					<last_updated></last_updated>
					<number></number>
				</track>";
			fputs($track, $text);
			fclose($track);
		}
		//creation quatrieme table
		$release_g = fopen("xml/release.xml", "w+");
		$text = "<?xml version='1.0'?>
			<!DOCTYPE release SYSTEM 'release.dtd'>
			<?XEDIX id ". $rd+3 ."?>
			<?XEDIX class DO?>
			<release>
				<id>1</id>
				<gid>123</gid>
				<name>".$_POST['album']."</name>
			        <artist_credit>".$_POST['artiste']."</artist_credit>
				<release_group></release_group>
				<status></status>
				<packaging>collector</packaging>
				<country>USA</country>
				<language>En</language>
				<script></script>
				<date_year>".$_POST['annee']."</date_year>
				<date_month></date_month>
				<date_day></date_day>
				<barcode></barcode>
				<comment></comment>
				<edits_pending></edits_pending>
				<quality></quality>
				<last_updated></last_updated>
			</release>";
		fputs($release, $text);
		fclose($release);
		
		echo "<p>CD enregistré en base.</p><a href='index.php'>Retour</a>";
		
		exec("/home/vincent/Documents/Projet/xedixts/bin/rempli_base -base LOW artist.xml");
		for($i=0;$i<$_POST['nbL'];$i++){		
			exec("/home/vincent/Documents/Projet/xedixts/bin/rempli_base -base LOW ".$_POST['track'.$i].".xml");
		}
		exec("/home/vincent/Documents/Projet/xedixts/bin/rempli_base -base LOW /var/www/xml/release_g.xml");
		exec("/home/vincent/Documents/Projet/xedixts/bin/rempli_base -base LOW release.xml");
		
		
	}

?>
