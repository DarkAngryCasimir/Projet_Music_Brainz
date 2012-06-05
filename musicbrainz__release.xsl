<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="row">
		<release>
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
				<xsl:when test="$myXpath='release_group'">
					<release_group><xsl:value-of select="."/></release_group>
				</xsl:when>
				<xsl:when test="$myXpath='status'">
					<status><xsl:value-of select="."/></status>
				</xsl:when>
				<xsl:when test="$myXpath='packaging'">
					<packaging><xsl:value-of select="."/></packaging>
				</xsl:when>
				<xsl:when test="$myXpath='country'">
					<country><xsl:value-of select="."/></country>
				</xsl:when>
				<xsl:when test="$myXpath='language'">
					<language><xsl:value-of select="."/></language>
				</xsl:when>
				<xsl:when test="$myXpath='script'">
					<script><xsl:value-of select="."/></script>
				</xsl:when>
				<xsl:when test="$myXpath='date_year'">
					<date_year><xsl:value-of select="."/></date_year>
				</xsl:when>
				<xsl:when test="$myXpath='date_month'">
					<date_month><xsl:value-of select="."/></date_month>
				</xsl:when>
				<xsl:when test="$myXpath='date_day'">
					<date_day><xsl:value-of select="."/></date_day>
				</xsl:when>
				<xsl:when test="$myXpath='barcode'">
					<barcode><xsl:value-of select="."/></barcode>
				</xsl:when>
				<xsl:when test="$myXpath='comment'">
					<comment><xsl:value-of select="."/></comment>
				</xsl:when>
				<xsl:when test="$myXpath='edits_pending'">
					<edits_pending><xsl:value-of select="."/></edits_pending>
				</xsl:when>
				<xsl:when test="$myXpath='quality'">
					<quality><xsl:value-of select="."/></quality>
				</xsl:when>
				<xsl:when test="$myXpath='last_updated'">
					<last_updated><xsl:value-of select="."/></last_updated>
				</xsl:when>
			</xsl:choose>
		</xsl:for-each>
		</release>
	</xsl:template>
</xsl:stylesheet>