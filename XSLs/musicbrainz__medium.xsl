<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="row">
		<medium>
		<xsl:for-each select="field">
			<xsl:variable name="myXpath" select="@name"/>
			<xsl:choose>
				<xsl:when test="$myXpath='id'">
					<id><xsl:value-of select="."/></id>
				</xsl:when>
				<xsl:when test="$myXpath='tracklist'">
					<tracklist><xsl:value-of select="."/></tracklist>
				</xsl:when>
				<xsl:when test="$myXpath='release'">
					<release><xsl:value-of select="."/></release>
				</xsl:when>
				<xsl:when test="$myXpath='position'">
					<position><xsl:value-of select="."/></position>
				</xsl:when>
				<xsl:when test="$myXpath='format'">
					<format><xsl:value-of select="."/></format>
				</xsl:when>
				<xsl:when test="$myXpath='name'">
					<name><xsl:value-of select="."/></name>
				</xsl:when>
				<xsl:when test="$myXpath='edits_pending'">
					<edits_pending><xsl:value-of select="."/></edits_pending>
				</xsl:when>
				<xsl:when test="$myXpath='last_updated'">
					<last_updated><xsl:value-of select="."/></last_updated>
				</xsl:when>
			</xsl:choose>
		</xsl:for-each>
		</medium>
	</xsl:template>
</xsl:stylesheet>