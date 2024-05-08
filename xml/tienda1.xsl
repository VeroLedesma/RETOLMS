<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent= "yes" version="1.0" encoding="iso-8859-1"/>  
    <xsl:template match="/">
        <html>
            <head>
                <title>Tienda de Juegos</title>
                <link rel="stylesheet" type="text/css" href="tiendaCss.css"/>
            </head>
  
            <body>
                <!-- Menú de categorías -->
                <div class="category-menu">
                    <xsl:for-each select="tienda/categorias/categoria">
                        <a href="{@id}">
                            <xsl:value-of select="nombre"/>
                        </a>
                        <xsl:text> </xsl:text>
      
                    </xsl:for-each>
                </div>

                <!-- Tabla de juegos -->
                <h2>Lista de Juegos</h2>
                <table border="1">
                    <tr>
                        <th>Nombre</th>
                       
                        <th>Imagen</th>
                        
                        <th>Precio</th>
                        
                         <th>Genero</th>
                        
                    </tr>
                    <xsl:for-each select="tienda/juegos/juego">
                        <tr>
                            <td>
                                <xsl:value-of select="nombre"/>
                            </td>
                            <td>
                                <xsl:if test="imagen">
                                    <img src="{imagen}" alt="{nombre}" style="max-width:100px; max-height:100px;"/>
                                </xsl:if>
                                <xsl:if test="not(imagen)">
                                    No hay imagen disponible
                                </xsl:if>
                            </td>
                            <td>
                                <xsl:value-of select="precio"/>
                            </td>
                    
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

  
</xsl:stylesheet> 