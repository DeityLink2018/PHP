<?php

$host = '127.0.0.1';
$port = '5432';
$database = 'broscience';
$user = 'dbuser';
$password = 'RangeOfMotion%777';

$connectString = 'host=' . $host . ' port=' . $port . ' dbname=' . $database . 
         ' user=' . $user . ' password=' . $password;


$link = pg_connect ($connectString);
if (!$link)
{
         die('Error: Could not connect: ' . pg_last_error());
}


$query = 'select * from users';

$result = pg_query($query);

$i = 0;
echo '<html><body><table><tr>';
while ($i < pg_num_fields($result))
{
         $fieldName = pg_field_name($result, $i);
          echo '<td>' . $fieldName . '</td>';
          $i = $i + 1;
}
echo '</tr>';
$i = 0;

while ($row = pg_fetch_row($result)) 
{
         echo '<tr>';
          $count = count($row);
          $y = 0;
           while ($y < $count)
                    {
                             $c_row = current($row);
                              echo '<td>' . $c_row . '</td>';
                              next($row);
                               $y = $y + 1;
                               }
            echo '</tr>';
            $i = $i + 1;
}
pg_free_result($result);

echo '</table></body></html>';
?>
