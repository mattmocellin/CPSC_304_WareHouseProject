<html>
<body>
<?php
$conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");

$insertID = $_GET["IIDInsert"];
$insertWID = $_GET["WIDInsert"];

//echo($itemCategory);
$finalStr = "INSERT INTO STORES (WID,IID) VALUES ('{$insertWID}', '{$insertID}')";
//echo($finalStr);

$stid = oci_parse($conn, $finalStr);
$x = oci_execute($stid);
header('Location: ManagerView.php');
exit;

?>

</body>
</html>
