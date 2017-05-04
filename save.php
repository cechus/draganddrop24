<?php
// $dbconn3 = pg_connect("host=localhost port=5432 dbname=academico user=postgres password=cechus");
// 
$conn = pg_pconnect("dbname=academico");
if (!$conn) {
  echo "An error occurred.\n";
  exit;
}

$result = pg_query($conn, "SELECT author, email FROM authors");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
  echo "Author: $row[0]  E-mail: $row[1]";
  echo "<br />\n";
}
 
?>