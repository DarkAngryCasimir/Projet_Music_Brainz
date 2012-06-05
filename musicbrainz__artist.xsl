<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	
	<xsl:template match="/">
		<xsl:apply-templates/>
	</xsl:template>
	
	<xsl:template match="row">
		<artist>
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
				<xsl:when test="$myXpath='sort_name'">
					<sort_name><xsl:value-of select="."/></sort_name>
				</xsl:when>
				<xsl:when test="$myXpath='begin_date_year'">
					<begin_date_year><xsl:value-of select="."/></begin_date_year>
				</xsl:when>
				<xsl:when test="$myXpath='begin_date_month'">
					<begin_date_month><xsl:value-of select="."/></begin_date_month>
				</xsl:when>
				<xsl:when test="$myXpath='begin_date_day'">
					<begin_date_day><xsl:value-of select="."/></begin_date_day>
				</xsl:when>
				<xsl:when test="$myXpath='end_date_year'">
					<end_date_year><xsl:value-of select="."/></end_date_year>
				</xsl:when>
				<xsl:when test="$myXpath='end_date_month'">
					<end_date_month><xsl:value-of select="."/></end_date_month>
				</xsl:when>
				<xsl:when test="$myXpath='end_date_day'">
					<end_date_day><xsl:value-of select="."/></end_date_day>
				</xsl:when>
				<xsl:when test="$myXpath='type'">
					<type><xsl:value-of select="."/></type>
				</xsl:when>
				<xsl:when test="$myXpath='country'">
					<country><xsl:value-of select="."/></country>
				</xsl:when>
				<xsl:when test="$myXpath='gender'">
					<gender><xsl:value-of select="."/></gender>
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
				<xsl:when test="$myXpath='ended'">
					<ended><xsl:value-of select="."/></ended>
				</xsl:when>
			</xsl:choose>
		</xsl:for-each>
		</artist>
	</xsl:template>
</xsl:stylesheet>