<?php require 'includes/config.php';?>
<?php include 'includes/header.php';?>

<?php
//firstdata.php

$sql = 'SELECT * FROM XXXXXX_Customers';
//----config area ends here-------------------

echo '
<h1>customers.php</h1>
<p>
Clever content goes here!
</p>
';



//Connect to MySQL, authenticate the MySQL users
$myConn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

//Connect to the Database, verify authorization to this resource
mysql_select_db(DB_NAME,$myConn);


//Select data to be retrieved via SQL statement
//Retrieve data set (result)
$result = mysql_query($sql,$myConn);

//Loop through the data, and insert it into our page
while($row=mysql_fetch_assoc($result))
{ //pull data from array
    echo "FirstName: " . $row['FirstName'] . "<br />";
    echo "LastName: " . $row['LastName'] . "<br />";
    echo "Email: " . $row['Email'] . "<br />";
} 


//Disconnect from MySQL, and release resources 
@mysql_free_result($result); # releases web server memory
@mysql_close($myConn);

include 'includes/footer.php';

?>


