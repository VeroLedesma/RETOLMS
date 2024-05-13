<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <head>
    <title>Tienda de Juegos</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
  </head>
  <body>
    <!-- Menú de categorías -->
    <div class="category-menu">
      <xsl:for-each select="tienda/categorias/categoria">
        <a href="#"><xsl:value-of select="nombre"/></a>
      </xsl:for-each>
    </div>

    <!-- Tabla de juegos -->
    <h2>Lista de Juegos</h2>
    <table border="1">
      <tr>
        <th>Nombre</th>
        <th>Precio</th>
      </tr>
      <xsl:for-each select="tienda/juegos/juego">
        <tr>
          <td><xsl:value-of select="nombre"/></td>
          <td><xsl:value-of select="precio"/></td>
        </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>