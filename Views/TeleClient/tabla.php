<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
         <td>{$row['usuario']}</td>
         <td>{$row['descripcion']}</td>
         <td>{$row['ip_address']}</td>
         <td>{$row['marca']}</td>
         <td>{$row['modelo']}</td>
        
    </tr>";
?>