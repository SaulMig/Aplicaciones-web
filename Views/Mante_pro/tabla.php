<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
         <td>{$row['equipo']}</td>
         <td>{$row['usuario']}</td>
         <td>{$row['fecha1']}</td>
         <td>{$row['fecha2']}</td>
         <td>{$row['garantia1']}</td>
         <td>{$row['garantia2']}</td>
         <td>{$row['observacion']}</td>
          <td><a class=\"btn btn-outline-info\" id='act' data-id='{$row['m']}' href='#!' ><span class=\"glyphicon glyphicon-refresh\"></span></a></td>
         <td><a class=\"btn btn-outline-warning\" id='enviar' href='#!' data-id='{$row['m']}'><span class=\"glyphicon glyphicon-send\"></span></a></td>
    </tr>";
?>