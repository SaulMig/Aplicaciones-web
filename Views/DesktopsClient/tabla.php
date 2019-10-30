<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
         <td>{$row['service_tag']}</td>
         <td>{$row['modelo']}</td>
         <td>{$row['garantia']}</td>
    </tr>";
?>