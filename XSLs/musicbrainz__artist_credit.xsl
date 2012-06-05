<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="row">
		<artist_credit>
		<xsl:for-each select="field">
			<xsl:variable name="myXpath" select="@name"/>
			<xsl:choose>
				<xsl:when test="$myXpath='id'">
					<id><xsl:value-of select="."/></id>
				</xsl:when>
				<xsl:when test="$myXpath='name'">
					<name><xsl:value-of select="."/></name>
				</xsl:when>
				<xsl:when test="$myXpath='artist_count'">
					<artist_count><xsl:value-of select="."/></artist_count>
				</xsl:when>
				<xsl:when test="$myXpath='ref_count'">
					<ref_count><xsl:value-of select="."/></ref_count>
				</xsl:when>
				<xsl:when test="$myXpath='created'">
					<created><xsl:value-of select="."/></created>
				</xsl:when>
			</xsl:choose>
		</xsl:for-each>
		</artist_credit>
	</xsl:template>
</xsl:stylesheet>