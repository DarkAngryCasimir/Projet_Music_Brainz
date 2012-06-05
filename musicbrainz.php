<?php
$xml = new DOMDocument;
$xml->load('musicbrainz__artist_annotation.xml');
$xsl = new DOMDocument;
$xsl->load('musicbrainz__artist_annotation.xsl');
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);
$proc->transformToUri($xml, 'test.xml');
?>