<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
         <td>{$row['descripcion']}</td>
         <td>{$row['marca']}</td>
         <td>{$row['modelo']}</td>
         <td>{$row['ip_address']}</td>
         <td>{$row['mac_address']}</td>
    </tr>";
?>