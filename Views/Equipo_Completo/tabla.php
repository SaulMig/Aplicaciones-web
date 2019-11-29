<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
         <td>{$row['equipo']}</td>
         <td>{$row['service_tag']}</td>
         <td>{$row['Teclado']}</td>
         <td>{$row['Mouse']}</td>
         <td>{$row['Monitor']}</td>
         <td><a class='btn btn-success btn_actualiza'  href='#!' data-id='{$row['m']}'><span class=\"glyphicon glyphicon-refresh\"></span></a></td>
         <td><a class='btn btn-danger btn_elimina'  href='#!' data-id='{$row['m']}'><span class=\"glyphicon glyphicon-remove\"></span></a></td>
    </tr>";
?>