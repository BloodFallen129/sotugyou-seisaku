<?php

echo '--- Befor $= --- <br/>';

$host     = 'k022c2044.mysql.database.azure.com';
$username = 'K022C2044';
$password = 'Noise0926';
$db_name  = 'users_db';

echo '--- After $= --- <br/>';

//Establishes the connection
$conn = mysqli_init();

echo '--- mysql_init --- <br/>';
var_dump($conn);
echo '<br/>';

mysqli_ssl_set( $conn, NULL, NULL, './DigiCertGlobalRootCA.crt.pem' , NULL, NULL );

echo '--- ssl_set --- <br/>';

mysqli_real_connect( $conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);

echo '--- real_connect --- <br/>';

if (mysqli_connect_errno()) {
    echo '--- connect error ---';
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

echo '--- connect --- <br/>';

//Run the Select query
printf("Reading data from table: \n");
$res = mysqli_query($conn, 'SELECT * FROM user');
while ($row = mysqli_fetch_assoc($res)) {
    var_dump($row);
}

echo '--- SQL Select --- <br/>';

//Close the connection
mysqli_close($conn);

echo '--- close --- <br/>';

?>
