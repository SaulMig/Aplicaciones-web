<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
         <td>{$row['modelo']}</td>
         <td>{$row['descripcion']}</td>
    </tr>";
?>