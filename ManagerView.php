<!doctype html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div id="boxed">
    <ul>
        <li><?php include('displayTables.php'); ?></li>
    </ul>
</div>


<div id = "queriesManager">
    <form action="insert_item_manager.php" method="get">
        Item ID:<input type="text" name="IIDInsert" id="IIDInsert" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." >
        Item Category:<input type="text" name="itemCategoryInsert" id="itemCategoryInsert"  maxlength="40" title="Please enter the item category." placeholder="Enter the item category">
        Item name:<input type="text" name="nameInsert" id="nameInsert" maxlength="40" pattern="[A-Za-z]+" title="Please enter the item name." placeholder="Enter the item name." >
        Item Price:<input type="number" name="priceInsert" id="priceInsert" step="0.01" onkeypress="if(this.value.length==15) return false;" min="0.01" max="999999999999999"  title="Please enter numbers only." placeholder="Enter numbers only." >
        Item Supply code:<input type="text" maxlength="40" name="supplyCodeInsert" id="supplyCodeInsert"  title="Please enter the supplier code." placeholder="Enter the supplier code.">
        Item Stock:<input type="text" name="stockInsert" id="stockInsert" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57' title="Please enter numbers only."  placeholder="Enter numbers only.">
        <button type="add item" id="addItemButton">Add Item to Items table</button> <br>

        <script type="text/javascript">
            document.getElementById('addItemButton').onclick = function() {
                var id = document.getElementById("IIDInsert").value;
                var cat = document.getElementById("itemCategoryInsert").value;
                var name = document.getElementById("nameInsert").value;
                var price = document.getElementById("priceInsert").value;
                var supplyCode = document.getElementById("supplyCodeInsert").value;
                var stock = document.getElementById("stockInsert").value;
                if (id && cat && name && price && supplyCode && stock){
                    var finStr =  "INSERT INTO Item (IID, category, name, price, supplierCode, itemStock) VALUES ("+ id + ", " + cat+ ", " + name+ ", " + price + ", "+ supplyCode+ ", " + stock + ")";
                    alert(finStr);
                }  else {
                    var errStr = "Insertion failed";
                    alert(errStr);
                }
            }
        </script>
    </form>

    <form action="insert_stores.php" method="get">
        Item ID:<input type="text" name="IIDInsert" id="IIDInsert" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." >
        Warehouse ID:<input type="text" name="WIDInsert" id="WIDInsert"  maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." >
        <button type="add item" id="addItemButton">Add Item to a Warehouse</button> <br>

        <script type="text/javascript">
            document.getElementById('addItemButton').onclick = function() {
                var id = document.getElementById("IIDInsert").value;
                var wid = document.getElementById("WIDInsert").value;
                if (id && wid){
                    var finStr =  "INSERT INTO STORES (IID, WID) VALUES ("+ id + ", "+wid + ")";
                    alert(finStr);
                }
            }
        </script>
    </form>

    <form action="update_itemStock_manager.php" method="get">
        Item ID: <input type="text" name="IIDUpdateStock" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'  title="Please enter numbers only." placeholder="Enter numbers only." id="IIDUpdateStock">

        Update stock by: <input type="text" name="stockUpdate" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57' title="Please enter numbers only." placeholder="Enter numbers only." id="stockUpdate">
        <button type="add item" id="updateStockButton">Update stock of an Item</button> <br>
        <script type="text/javascript">
            document.getElementById('updateStockButton').onclick = function() {
                var id = document.getElementById("IIDUpdateStock").value;
                var stock = document.getElementById("stockUpdate").value;
                if (id && stock){
                    var finStr =  "UPDATE Item SET itemStock =" +stock+  " WHERE IID = " + id;
                    alert(finStr);
                } else {
                    var errStr = "Update to item stock failed";
                    alert(errStr);
                }
            }
        </script>
    </form>


    <form action="update_itemPrice_manager.php" method="get">
        Item ID: <input type="text" name="IIDUpdatePrice" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57' placeholder="Enter numbers only." title="Please enter numbers only." id="IIDUpdatePrice">
        Set the new price: <input type="number" name="priceUpdate" step="0.01" onkeypress="if(this.value.length==15) return false;" min="0.01" max="999999999999999"  title="Please enter numbers only." placeholder="Enter numbers only." id="priceUpdate">
        <button type="add item" id="updatePriceButton">Update price of an Item</button> <br>
        <script type="text/javascript">
            document.getElementById('updatePriceButton').onclick = function() {
                var id = document.getElementById("IIDUpdatePrice").value;
                var price = document.getElementById("priceUpdate").value;
                if (id && price){
                    var finStr =  "UPDATE Item SET itemPrice =" +price+  " WHERE IID = " + id;
                    alert(finStr);
                } else {
                    var errStr = "Update to item price failed";
                    alert(errStr);
                }
            }
        </script>
    </form>


    <form action="delete_item_manager.php" method="get">
        Item ID: <input type="text" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'  title="Please enter numbers only." placeholder="Enter numbers only." name="deleteIID" id="deleteIID">
        <button type="deleteItemButton" id="deleteItemButton">Delete Item</button> <br>
        <script type="text/javascript">
            document.getElementById('deleteItemButton').onclick = function() {
                    var id = document.getElementById("deleteIID").value;
                    if (id){
                        var finStr = "DELETE FROM Item WHERE IID =" + id;
                        alert(finStr);
                    } else {
                        var errStr = "Deletion failed";
                        alert(errStr);
                    }
                }
        </script>
    </form>
    
    <form action="get_itemPrice_manager.php" method="post">
                Items with price
            <select name="operator" id="operator">
                <option value=">">&gt;</option>
                <option value="<">&lt;</option>
                <option value="=">=</option>
                <option value=">=">&ge;</option>
            <option value="<=">&le;</option>
            </select>
            <input type="number" step="0.01" onkeypress="if(this.value.length==15) return false;" min="0.01" max="999999999999999"  title="Please enter numbers only." placeholder="Enter numbers only."  name="retrievePrice" id="retrievePrice">
                <button type="add item" id="selectItemsPriceButton">Select Items</button> <br>
            <script type="text/javascript">
            document.getElementById('selectItemsPriceButton').onclick = function() {
                var op = document.getElementById("operator").value;
                var but = document.getElementById("retrievePrice").value;
                if (op && but) {
                var finalStr = "SELECT * FROM Item WHERE price " + op + but;
                alert(finalStr);
                } else {
                    var errStr = "Selection failed";
                    alert(errStr);
                }

            }
        </script>
    </form>

    <form action="join_itemsWarehouse.php" method="get">
        <button type="add item" id="notShippedItemsButton">Show items in each warehouse</button> <br>
        <script type="text/javascript">
            document.getElementById('notShippedItemsButton').onclick = function() {
                        var finStr = "SELECT streetName, W.WID, IID FROM Warehouse_Located W, Stores S WHERE w.WID = S.WID";
                        alert(finStr);
                      }
        </script>
    </form>

    <form action="warehousesWithAllItems_manager.php" method="get">
        <button type="deleteItem" id="deleteItem">Find Warehouses with all Items</button> <br>
         <script type="text/javascript">
            document.getElementById('deleteItem').onclick = function() {
                        var finStr = "SELECT W.streetName, W.WID  FROM warehouse_Located W WHERE NOT EXISTS (SELECT I.IID FROM Item I WHERE NOT EXISTS (SELECT S.IID FROM STORES S WHERE S.IID = I.IID AND S.WID = W.WID))";
                        alert(finStr);
                      }
        </script>
    </form>

    <form action="findCategoryAvg_manager.php", method="post">
        <select name="operator" id="operatorFind">
            <option value="max"> Maximum</option>
            <option value="min"> Minimum</option>
        </select>
        <button type="add item" id="selectAverageCategoryButton">Average Category price</button> <br>
        <script type="text/javascript">
            document.getElementById('selectAverageCategoryButton').onclick = function() {
                var op = document.getElementById("operatorFind").value;
                var finStr = "select " + op  + "(x) from (select avg(price) as x from item group by category)";
                        alert(finStr);
                      }
        </script>
    </form>

    <form action="get_itemCategoryAggregationPrice_manager.php", method="post">
        <select name="operator" id="operatorGet">
            <option value="max"> Maximum</option>
            <option value="min"> Minimum</option>
            <option value="avg"> Average</option>
        </select>
        <button type="add item" id="selectPriceCategoryButton">Price in Category</button> <br>
        <script type="text/javascript">
            document.getElementById('selectPriceCategoryButton').onclick = function() {
                var op = document.getElementById("operatorGet").value;
                var finStr = "select category, " + op  + "(price) from item group by category";
                        alert(finStr);
                      }
        </script>
    </form>

</div>