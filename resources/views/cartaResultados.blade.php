<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta name="theme-color" content="#004b93">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Universidad Mexicana, Carta de Acreditación</title>

    <script language="javascript">
        window.onbeforeprint = function() {
            noImprimir.style.visibility = 'hidden';
            noImprimir.style.position = 'absolute';
        }

        window.onafterprint = function() {
            noImprimir.style.visibility = 'visible';
            noImprimir.style.position = 'relative';
        }
    </script>
    <link href="stylo.css" rel="stylesheet" type="text/css">
    <style media="print">
        #seg {
            display: block;
        }
    </style>
</head>

<body>
    <div id="wrap">
        <div id="container">
            <table width="650" border="0" align="center" cellpadding="0" cellspacing="0"
                style="margin-top:10px; margin-bottom:10px">
                <tr>
                    <td width="656" style="text-align:left">

                    </td>

                </tr>
                <tr>
                    <td>
                        <div style="position: relative;">
                            <div style="position: absolute; left: 10px; top: 12px; z-index: 1;">
                                <img src="http://unimex.edu.mx/img/header/logo.png" />
                            </div>
                            <div style="position: absolute; left: 15px; top: 90px; z-index: 3;">
                                <img src="../images/logotipo_agua.png" width="35" height="10" />
                            </div>

                        </div>
                        <!--<div align="right" style="width:200px; margin-left:445px; margin-top:30px;" ><a>28 de agosto de 2015</a></div>-->
                        <div align="right" style="width:300px; margin-left:325px; margin-top:30px;">
                            <span>
                                <?php
                                $dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'];
                                $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                                echo date('d') . ' de ' . $meses[date('n') - 1] . ' del ' . date('Y');
                                ?>
                            </span>
                        </div>


                    </td>
                </tr>
                <tr>
                    <td valign="top" height="480"
                        style="background-image:url(logito6.jpg); background-repeat:no-repeat; background-position:center; background-attachment:fixed;">
                        <div align="center">
                            <p>
                                <br /><br /><br />
                                <br />
                                <span class="titulo">CARTA DE ACREDITACI&Oacute;N</span>
                            </p>
                        </div>
                        <table width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                            class="grande">
                            <tr>
                                <br /><br />
                                <td width="600">
                                    <div align="justify">Estimado alumno (a):
                                        {{ $resultados['ResultadoExamen']['Nombre'] }}
                                        <span class="negrita"></span>,
                                        Matr&iacute;cula: {{ $resultados['ResultadoExamen']['Matricula'] }}
                                        <span class="negrita"></span>
                                        <br /><br />
                                        <span class="grande">
                                            Por medio de la presente, te comunicamos oficialmente que el resultado de tu
                                            Examen de Conocimientos de Titulaci&oacute;n realizado el
                                            <strong><?php echo date('d', strtotime($fecha[0])) . ' de ' . $meses[date('n', strtotime($fecha[0])) - 1] . ' del ' . date('Y', strtotime($fecha[0])); ?></strong>, fue
                                            <u><strong>ACREDITADO</strong></u>, por lo que puedes continuar con las
                                            siguientes fases del Proceso de Titulaci&oacute;n.
                                        </span>
                                        <br />
                                        <br />
                                        <br />
                                        <strong>&iexcl;Felicidades por haber logrado esta importante meta en tu
                                            vida!</strong><br /><br /><br />
                                        <p>Apartir del 14 de febrero de 2024, podr&aacute;s realizar tu trámite de
                                            Título Profesional en la Ventanilla Única del Plantel, debiendo cumplir con
                                            todos los requisitos que para tal efecto se requieran.<br />
                                        </p>
                                        <p><br />
                                            <br />
                                            <span class="negrita">
                                                Atentamente<br /><br />
                                                Universidad Mexicana S. C.
                                            </span>
                                        </p>
                                        <span class="negrita">
                                            <div id="seg"
                                                style="color:#1C1C1C;font-size:3.2px;width:5px;top:-25px;left:270px; z-index:2;position:relative;letter-spacing:-.5px;font-weight:bold;">
                                                14</div>
                                        </span>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <br /><br />
            </table>
            <div align="center" class="negrita" id="noImprimir">
                <input class="boton" name="boto" type="button" id="submit"
                    onClick="javascript:location.href='http://unimex.edu.mx/resultados-examen/'" value="REGRESAR" />
                &nbsp;&nbsp;
                <input class="boton" name="boto2" type="button" id="submit" onClick="javascript:window.print()"
                    value="IMPRIMIR" />
                <br /><br /><br /><br />
            </div>
        </div>
    </div>
</body>

</html>
