<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
            <td>{$row['descripcion']}</td>
            <td>{$row['marca']}</td>
            <td><a class=\"btn btn-success\" id='act' data-id='{$row['id_modelo']}' href='#!'><span class=\"glyphicon glyphicon-refresh\"></span></a></td>
            <td><a class=\"btn btn-danger\" id='elimina' data-id='{$row['id_modelo']}' href='#!'> <span class=\"glyphicon glyphicon-remove\"></span></a></td>
    </tr>";
?>