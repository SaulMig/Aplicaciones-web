<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "
     <tr>
            <td>{$row['nickname']}</td>
            <td>{$row['email']}</td>
    </tr>";
?>