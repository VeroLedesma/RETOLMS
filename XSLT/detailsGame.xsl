<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:param name="id"/>

<xsl:template match="/">
    <html>
    <body>
        <xsl:for-each select="tienda/juegos/juego[@id=$id]">
            <div class="item">
                <div class="item_footer">
                    <h2><xsl:value-of select="nombre"/></h2>
                    <p><xsl:value-of select="descripcion"/></p>
                    <p>Género: <xsl:value-of select="genero"/></p>
                    <p>Precio: <xsl:value-of select="precio"/></p>
                </div>
            </div>
        </xsl:for-each>
    </body>
    </html>
</xsl:template>

</xsl:stylesheet>