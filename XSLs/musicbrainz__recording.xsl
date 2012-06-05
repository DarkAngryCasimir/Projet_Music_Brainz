<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="row">
		<recording>
		<xsl:for-each select="field">
			<xsl:variable name="myXpath" select="@name"/>
			<xsl:choose>
				<xsl:when test="$myXpath='id'">
					<id><xsl:value-of select="."/></id>
				</xsl:when>
				<xsl:when test="$myXpath='gid'">
					<gid><xsl:value-of select="."/></gid>
				</xsl:when>
				<xsl:when test="$myXpath='name'">
					<name><xsl:value-of select="."/></name>
				</xsl:when>
				<xsl:when test="$myXpath='artist_credit'">
					<artist_credit><xsl:value-of select="."/></artist_credit>
				</xsl:when>
				<xsl:when test="$myXpath='length'">
					<length><xsl:value-of select="."/></length>
				</xsl:when>
				<xsl:when test="$myXpath='comment'">
					<comment><xsl:value-of select="."/></comment>
				</xsl:when>
				<xsl:when test="$myXpath='edits_pending'">
					<edits_pending><xsl:value-of select="."/></edits_pending>
				</xsl:when>
				<xsl:when test="$myXpath='last_updated'">
					<last_updated><xsl:value-of select="."/></last_updated>
				</xsl:when>
			</xsl:choose>
		</xsl:for-each>
		<recording>
	</xsl:template>
</xsl:stylesheet>