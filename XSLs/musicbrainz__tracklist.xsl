<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="row">
		<tracklist>
		<xsl:for-each select="field">
			<xsl:variable name="myXpath" select="@name"/>
			<xsl:choose>
				<xsl:when test="$myXpath='id'">
					<id><xsl:value-of select="."/></id>
				</xsl:when>
				<xsl:when test="$myXpath='track_count'">
					<track_count><xsl:value-of select="."/></track_count>
				</xsl:when>
				<xsl:when test="$myXpath='last_updated'">
					<last_updated><xsl:value-of select="."/></last_updated>
				</xsl:when>
			</xsl:choose>
		</xsl:for-each>
		</tracklist>
	</xsl:template>
</xsl:stylesheet>