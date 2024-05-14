<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
    <h2>Lista de Juegos</h2>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Género</th>
        <th>Precio</th>
      </tr>
      <xsl:for-each select="juego">
      <tr>
        <td><xsl:value-of select="@id"/></td>
        <td><xsl:value-of select="nombre"/></td>
        <td><xsl:value-of select="descripcion"/></td>
        <td><xsl:value-of select="genero"/></td>
        <td><xsl:value-of select="precio"/></td>
      </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>