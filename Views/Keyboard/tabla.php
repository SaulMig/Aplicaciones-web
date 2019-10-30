<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
         <td>{$row['modelo']}</td>
         <td>{$row['descripcion']}</td>
         <td><a class=\"btn btn-success\" id='act' data-id='{$row['m']}' href='#!' ><span class=\"glyphicon glyphicon-refresh\"></span></a></td>
         <td><a class=\"btn btn-danger\" id='elimina' href='#!' data-id='{$row['m']}'><span class=\"glyphicon glyphicon-remove\"></span></a></td>
    </tr>";
?>