<?php

# definimos los valores iniciales para nuestro calendario
$month=date("n");
$year=date("Y");
$diaActual=date("j");

# Obtenemos el dia de la semana del primer dia
# Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;

# Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
?>



    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Calendario PHP Ricardo Romani</title>
        <meta charset="utf-8">

        <style>
            h1 {
                margin: auto;
                text-align: center;
                height: 75%;
            }

            #calendar {
                margin: auto;
                font-family: Arial;
                font-size: 12px;
                width: 60%;
            }

            #calendar caption {
                text-align: center;
                padding: 5px 10px;
                background-color: darkgrey;
                color: #000;
                font-weight: bold;
            }

            #calendar th {
                background-color: #000000;
                border: 2px black solid;
                color: #fff;
                width: 40px;
            }

            #calendar td {
                text-align: center;
                border: 1px black solid;
                background-color: white;
            }

            #calendar .hoy {
                background-color: lawngreen;
            }

        </style>
    </head>

    <body>
        <h1>Calendario PHP Ricardo Romani</h1>
        <table id="calendar">
            <caption>
                <?php echo $meses[$month]." ".$year?>
            </caption>
            <tr>
                <th>Lun</th>
                <th>Mar</th>
                <th>Mie</th>
                <th>Jue</th>
                <th>Vie</th>
                <th>Sab</th>
                <th>Dom</th>
            </tr>
            <tr bgcolor="white">
                <?php
                $last_cell=$diaSemana+$ultimoDiaMes;
                // hacemos un bucle hasta 42, que es el máximo de valores que puede
                // haber... 6 columnas de 7 dias
                for($i=1;$i<=42;$i++)
                {
                    if($i==$diaSemana)
                    {
                        // determinamos en que dia empieza
                        $day=1;
                    }
                    if($i<$diaSemana || $i>=$last_cell)
                    {
                        // celca vacia
                        echo "<td>&nbsp;</td>";

                    }else{
                        // mostramos el dia
                        if($day==$diaActual)
                            echo "<td class='hoy'>$day</td>";
                        else
                            echo "<td>$day</td>";
                        $day++;
                    }
                    // cuando llega al final de la semana, iniciamos una columna nueva
                    if($i%7==0)
                    {
                        echo "</tr><tr>\n";
                    }
                }
            ?>
            </tr>
        </table>
    </body>

    </html>
