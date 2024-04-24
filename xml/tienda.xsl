<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" version="1.0" encoding="UTF-8" />
    <xsl:template match="tienda">
        <html>
            <table>
                <thead>
                    <tr>
                        <th>Nombre del ciclo</th>
                        <th>Grado</th>
                        <th>Año del título</th>
                    </tr>
                </thead>
                <xsl:apply-templates />
            </table>
        </html>
    </xsl:template>
    <xsl:template match="ciclo">
        <tbody>
            <tr>
                <td>
                    <xsl:value-of select="nombre" />
                </td>
                <td>
                    <xsl:value-of select="grado" />
                </td>
                <td>
                    <xsl:value-of select="@anio"/>
                </td>
            </tr>
        </tbody>
    </xsl:template>
</xsl:stylesheet>