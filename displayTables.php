<html>
<body>
<?php

    $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug"); 
    
    $finalStr = 
        "CREATE TABLE City 
        (CID int not null,
        name varchar(40) not null,
        country varchar(40) null,
        region varchar(40) null,
        Primary key (CID));

        CREATE TABLE Client_Lives_In 
        (CLID int not null,
        CID int not null,
        billingAddress varchar(255) not null,
        Name varchar(255) null,
        creditCardNum varchar(255) null,
        Email varChar(255) null,
        cellnum varchar(255) null,
        Primary key (CLID),
        Foreign key (CID) references City ON DELETE CASCADE);

        CREATE TABLE Item (
        IID varchar(40) not null,
        category varchar(40) not null,
        name varchar(40) not null,
        price FLOAT(20) not null,
        supplierCode varchar(40) not null,
        itemStock int not null,
        PRIMARY KEY(IID));

        CREATE TABLE Warehouse_Located (
        WID int  not null,
        CID int  not null,
        streetName varchar(20) null,
        postalCode varchar(7) null,
        numOfEmployees int null,
        numOfForklift int null,
        Primary key (WID),
        Foreign key (CID) references City ON DELETE CASCADE);

        CREATE TABLE Order_Makes (
        CLID int not null,
        OD   int not null,
        isShipped varchar(5) null,
        ShippingAddress varchar (20) null,
        DesiredTime varchar(255) null,
        ExpectedDeliveryTime varchar(255) null,
        IsDelivered varchar(5) null,
        Primary key (CLID, OD),
        FOREIGN KEY (CLID) references Client_Lives_In ON DELETE CASCADE);

        CREATE TABLE STORES 
        (WID int  not null,
        IID varchar(40)  not null,
        Primary key (WID, IID),
        Foreign key (WID) references Warehouse_Located ON DELETE CASCADE,
        Foreign key (IID) references Item ON DELETE CASCADE); 

        CREATE TABLE CONTAINS 
        (IID varchar(40)  not null,
        CLID int  not null,
        OD int  not null,
        Primary key (IID, CLID, OD),
        Foreign key (IID) references Item ON DELETE CASCADE,
        Foreign key (CLID, OD) references Order_Makes ON DELETE CASCADE);


        INSERT INTO City
        (CID, Name, Region, Country)
        VALUES
        (00000001, 'North Vancouver', 'British Columbia', 'Canada');

        INSERT INTO City
        (CID, Name, Region, Country)
        VALUES
        (00000002, 'Richmond', 'British Columbia', 'Canada');

        INSERT INTO City
        (CID, Name, Region, Country)
        VALUES
        (00000003, 'Burnaby', 'British Columbia', 'Canada');

        INSERT INTO City
        (CID, Name, Region, Country)
        VALUES
        (00000004, 'Makati City', 'Manila', 'Philippines');

        INSERT INTO City
        (CID, Name, Region, Country)
        VALUES
        (00000005, 'Abbotsford', 'British Columbia', 'Canada');

        INSERT INTO Client_Lives_In
        (CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
        VALUES
        (10000000, 00000001, '2451 Westhill Court, West Vancouver, BC, A3K 2F4', 'Natalie Chen', '11114444090958367', 'chennat@yahoo.com', '6042910876');

        INSERT INTO Client_Lives_In
        (CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
        VALUES
        (20000000, 00000002, '1234 Francis Road, Richmond, BC, F9T 2W4', 'Ash Ketchum', '1024567820394563', 'pikachu@hotmail.com', '7786450098');

        INSERT INTO Client_Lives_In
        (CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
        VALUES
        (30000000, 00000003, '1456 3rd Street, Burnaby, BC, J9T 4F9', 'Ted Mosby', '2222567800003456', 'mosbius0101@gmail.com', '6045698754');

        INSERT INTO Client_Lives_In
        (CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
        VALUES
        (40000000, 00000004, '5690, Manga Street, Makati City, Manila, I1P 1B5', 'Michael Smith', '7541110905942345', 'msmith24@yahoo.com', '7782233450');

        INSERT INTO Client_Lives_In
        (CLID, CID, billingAddress, Name, creditCardNum, Email, cellnum)
        VALUES
        (50000000, 00000005, '2341, Moric Road, Abbotsford, BC, U7T 2W1', 'Bruce Wayne', '1234567890987654', 'wayne_industries@gmail.com', '6041239900');

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000001, 'Appliances', 'Humidifier', 57.60, 12345, 695);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000002, 'Appliances', 'Toaster', 35.99, 12345, 345);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000003, 'Appliances', 'Rice Cooker', 45.99, 12345, 159);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000004, 'Toys', 'Solar Glasses', 5.25, 40987, 4025);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000005, 'Toys', 'Hot Wheels', 5.99, 40335, 932);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000006, 'Food', 'Belgian Chocolate', 169.69, 50345, 515);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000007, 'Food', 'Russian Spaghetti', 50.55, 50299, 700);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000008, 'Electronics', '58 Smart LED Tv', 840.00, 43340, 40);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000009, 'Electronics', 'PS4', 855.45, 41134, 688);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000010, 'Electronics', 'Google Mini', 67.99, 75456, 289);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000011, 'Furniture', 'Couch', 85.89, 22111, 854);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000012, 'Furniture', 'Standing Table', 239.99, 22111, 211);

        INSERT INTO Item
        (IID, category, name, price, supplierCode, itemStock)
        VALUES
        (10000013, 'Furniture', 'Computer Desk', 320.49, 45687, 351);

        INSERT INTO Order_Makes
        (CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
        VALUES
        (10000000, 32458745, 1, 'Y4N 7F3', '13:00', '14:00', 'FALSE');

        INSERT INTO Order_Makes
        (CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
        VALUES
        (20000000, 66984248, 0, 'P0B 1D3', '9:00', '19:00', 'FALSE');

        INSERT INTO Order_Makes
        (CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
        VALUES
        (30000000, 98486248, 0, 'T2L 1Z6', '18:00', '14:00', 'FALSE');

        INSERT INTO Order_Makes
        (CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
        VALUES
        (40000000, 22258748, 1, 'V0N 1U2', '10:00', '10:30', 'FALSE');

        INSERT INTO Order_Makes
        (CLID, OD, isShipped, shippingAddress, desiredTime, ExpectedDeliveryTime, isDelivered)
        VALUES
        (50000000, 96584125, 1, 'V0N 1U2', '13:00', '11:00', 'TRUE');

        INSERT INTO Warehouse_Located 
        (WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
        VALUES
        (4001, 00000001, 'Contigo', 'F3W 0T3', 30, 10);

        INSERT INTO Warehouse_Located 
        (WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
        VALUES
        (4002, 00000002, 'Aquafina', 'H3F 9V2', 10, 2);

        INSERT INTO Warehouse_Located 
        (WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
        VALUES
        (4003, 00000003, 'Chestnut', 'V3D 0Z2', 50, 40);

        INSERT INTO Warehouse_Located 
        (WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
        VALUES
        (4004, 00000004, 'Sundowner', 'F7P 3Y4', 125, 45);

        INSERT INTO Warehouse_Located 
        (WID, CID, streetName, postalCode, numofEmployees, numOfForklift)
        VALUES
        (4005, 00000005, 'Walnut', 'H3R 6V5', 82, 30);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4001, 10000001);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000001);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000002);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000003);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000004);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000005);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000006);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000007);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000008);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000009);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000010);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000011);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000012);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4002, 10000013);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4003, 10000003);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4004, 10000008);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4004, 10000006);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4004, 10000004);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4004, 10000002);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4004, 10000001);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4005, 10000011);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4005, 10000002);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4005, 10000007);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4005, 10000009);

        INSERT INTO STORES
        (WID, IID)
        VALUES
        (4005, 10000010);

        INSERT INTO CONTAINS
        (IID, CLID, OD)
        VALUES
        (10000001, 10000000, 32458745);

        INSERT INTO CONTAINS
        (IID, CLID, OD)
        VALUES
        (10000004, 20000000, 66984248);

        INSERT INTO CONTAINS
        (IID, CLID, OD)
        VALUES
        (10000003, 30000000, 98486248);

        INSERT INTO CONTAINS
        (IID, CLID, OD)
        VALUES
        (10000004, 40000000, 22258748);

        INSERT INTO CONTAINS
        (IID, CLID, OD)
        VALUES
        (10000011, 50000000, 96584125);";

    $pieces = explode(";", $finalStr);
    foreach($pieces as $piece){
        $stid = oci_parse($conn, $piece);
        $x = oci_execute($stid);
    }
    
    function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
        //echo "<br>running ".$cmdstr."<br>";
        global $conn, $success;
        $statement = OCIParse($conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

        if (!$statement) {
            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($conn); // For OCIParse errors pass the       
            // connection handle
            echo htmlentities($e['message']);
            $success = False;
        }

        $r = OCIExecute($statement, OCI_DEFAULT);
        if (!$r) {
            echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
            $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
            echo htmlentities($e['message']);
            $success = False;
        } else {

        }
        return $statement;
    }
    
    function printItemResult($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table align=center>";
        echo "Items";
        echo "<tr><th>ID</th><th>Name</th><th>Category</th><th>Supplier Code</th><th>Item Stock</th><th>Price</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["IID"] . 
                "</td><td>" . $row["NAME"] . 
                "</td><td>" . $row["CATEGORY"] . 
                "</td><td>" . $row["SUPPLIERCODE"] . 
                "</td><td>" . $row["ITEMSTOCK"] . 
                "</td><td>" . $row["PRICE"] . 
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printCityResult($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<br>";
        echo "<table align=center>";
        echo "City";
        echo "<tr><th>ID</th><th>Name</th><th>Country</th><th>Region</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["CID"] . 
                "</td><td>" . $row["NAME"] . 
                "</td><td>" . $row["COUNTRY"] . 
                "</td><td>" . $row["REGION"] . 
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printClient_Lives_InResult($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<br>";
        echo "<table align=center>";
        echo "Client";
        echo "<tr><th>CLID</th><th>CID</th><th>billingAddress</th><th>Name</th><th>creditCardNum</th><th>Email</th><th>cellnum</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["CLID"] . 
                "</td><td>" . $row["CID"] . 
                "</td><td>" . $row["BILLINGADDRESS"] . 
                "</td><td>" . $row["NAME"] . 
                "</td><td>" . $row["CREDITCARDNUM"] .
                "</td><td>" . $row["EMAIL"] .
                "</td><td>" . $row["CELLNUM"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printWarehouse_LocatedResult($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<br>";
        echo "<table align=center>";
        echo "Warehouse";
        echo "<tr><th>WID</th><th>CID</th><th>streetName</th><th>postalCode</th><th>numOfEmployees</th><th>numOfForklift</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["WID"] . 
                "</td><td>" . $row["CID"] . 
                "</td><td>" . $row["STREETNAME"] . 
                "</td><td>" . $row["POSTALCODE"] . 
                "</td><td>" . $row["NUMOFEMPLOYEES"] .
                "</td><td>" . $row["NUMOFFORKLIFT"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printOrder_Makes($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<br>";
        echo "<table align=center>";
        echo "Order";
        echo "<tr><th>CLID</th><th>OD</th><th>ISSHIPPED</th><th>SHIPPINGADDRESS</th><th>DESIREDTIME</th><th>EXPECTEDDELIVERYTIME</th><th>ISDELIVERED</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["CLID"] . 
                "</td><td>" . $row["OD"] . 
                "</td><td>" . $row["ISSHIPPED"] . 
                "</td><td>" . $row["SHIPPINGADDRESS"] . 
                "</td><td>" . $row["DESIREDTIME"] .
                "</td><td>" . $row["EXPECTEDDELIVERYTIME"] .
                "</td><td>" . $row["ISDELIVERED"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printStores($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<br>";
        echo "<table align=center>";
        echo "Warehouse Stores";
        echo "<tr><th>WID</th><th>IID</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["WID"] . 
                "</td><td>" . $row["IID"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printContains($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<br>";
        echo "<table align=center>";
        echo "Order Contains";
        echo "<tr><th>IID</th><th>CLID</th><th>OD</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["IID"] . 
                "</td><td>" . $row["CLID"] .
                "</td><td>" . $row["OD"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
        echo "<br>";
    }
    
        
    $getStr = "SELECT * FROM Item";
    $result = executePlainSQL($getStr);
    printItemResult($result);
    
    $getStrCity = "SELECT * From City";
    $resultCity = executePlainSql($getStrCity);
    printCityresult($resultCity);
    
    $getStrLives = "SELECT * From Client_Lives_In";
    $resultLives = executePlainSql($getStrLives);
    printClient_Lives_InResult($resultLives);
    
    $getStrWarehouse = "SELECT * From Warehouse_Located";
    $result = executePlainSql($getStrWarehouse);
    printWarehouse_LocatedResult($result);
    
    $getStrOrder = "SELECT * From Order_Makes";
    $result = executePlainSql($getStrOrder);
    printOrder_Makes($result);
    
    $getStrStores = "SELECT * From STORES";
    $result = executePlainSql($getStrStores);
    printStores($result);
    
    $getStrContains = "SELECT * From CONTAINS";
    $result = executePlainSql($getStrContains);
    printContains($result);
    
    
    
?>
</body>
</html>