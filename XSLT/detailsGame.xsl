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
                    <p>Tipo: <xsl:value-of select="tipo"/></p>
                    <p>Categoria: <xsl:value-of select="categoria"/></p>
                    <xsl:call-template name="publicado">
                        <xsl:with-param name="publicado" select="@publicado"/>
                    </xsl:call-template>
                </div>
            </div>
        </xsl:for-each>
    </body>
    </html>
</xsl:template>

<xsl:template name="publicado">
    <xsl:param name="publicado"/>
    <p>Publicado: <xsl:value-of select="$publicado"/></p>
</xsl:template>

</xsl:stylesheet>