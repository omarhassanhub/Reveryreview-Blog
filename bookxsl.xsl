<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:x="http://localhost" exclude-result-prefixes="x">
    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="css/stylexsl.css" />
					<style type="text/css">	
						<!-- This piece of code does not function if placed in an external css file. !-->
						.pdesc{
						display:none;
						}
						input[type=checkbox]:checked + .pdesc {
						  display: block;
						}
	
					</style>
            </head>
            <body>
                <TABLE class="tableParent">
                    <td class="tdBloggers" colspan="2">
                        <h1>BLOGGERS</h1>
                    </td>
                    <xsl:apply-templates select="x:books/x:book"></xsl:apply-templates>
                </TABLE>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="x:book">
        <TR>
            <xsl:apply-templates select="x:title" />
            <xsl:apply-templates select="x:contributor" />
            <xsl:apply-templates select="x:bookImage" />
            <xsl:apply-templates select="x:firstParagraph" />
            <xsl:apply-templates select="." mode="hidden" />
        </TR>
    </xsl:template>
    
    <xsl:template match="x:title">
        <TD class="tdTitle" colspan="2">
            <h2>
                <a href="#">
                    <xsl:value-of select="." />
                </a>
            </h2>
        </TD>
        <TR></TR>
    </xsl:template>
    
    <xsl:template match="x:contributor">
        <TD class="tdAuthor" colspan="2">
            <p>By: <xsl:value-of select="." /></p>
        </TD>
        <TR></TR>
    </xsl:template>
    
    <xsl:template match="x:bookImage">
        <TD class="tdBookImage">
            <xsl:element name="img">
                <xsl:attribute name="src">
                    <xsl:value-of select="." />
                </xsl:attribute>
            </xsl:element>
        </TD>
    </xsl:template>
    
    <xsl:template match="x:firstParagraph">
        <TD class="tdDescription">
            <p class="pDescription">
                <xsl:value-of select="." />
            </p>
        </TD>
    </xsl:template>
    
    <xsl:template match="x:book" mode="hidden">
        <tr></tr>
        <td></td>
        <td class="tdDescription">
            <label>
                <a href="#">Continue reading >></a>
            </label>
            <input type="checkbox"></input>
            <div class="pdesc">
                <p class="pDescription2">
                    <xsl:apply-templates select="x:secondParagraph" />
                </p>
                <h3>Book Details</h3>
                <table class="tableMore">
                    <tr>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Edition</th>
                        <th>Published Date</th>
                        <th>Type</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>
                            <xsl:apply-templates select="x:author" />
                        </td>
                        <td>
                            <xsl:apply-templates select="@isbn" />
                        </td>
                        <td>
                            <xsl:apply-templates select="x:edition" />
                        </td>
                        <td>
							<nobr><xsl:apply-templates select="x:publishedDate/x:day" />/</nobr>
							<nobr><xsl:apply-templates select="x:publishedDate/x:month" />/</nobr>
							<nobr><xsl:apply-templates select="x:publishedDate/x:year" /></nobr>
                        </td>
                        <td>
                            <xsl:apply-templates select="x:type" />
                        </td>
                        <td>
                            <p>£<xsl:apply-templates select="x:price" /></p>
                        </td>
						
						
                    </tr>
                </table>
            </div>
        </td>
        <tr></tr>
    </xsl:template>
	
</xsl:stylesheet>