<?php
require('parts/header.php');
require('parts/navigation.php');
?>
<div class="main-right">
    <h1>Add Product</h1>
    <div class="main-box">
        <form action='inc/database/add_inventory.php' name='submit' id="inventory-form" method="POST" enctype="multipart/form-data">
            <div class="left-form-content">
                <label>Product Name</label>
                <input type="text" name="product_name" id="product_name" placeholder="Enter Product Name" required> 
                <label>Company Name</label>
                <input type="text" name="company_name" id="company_name" placeholder="Enter Company Name" required> 
                <label>Category</label>
                <select name="product_category" required>
                    <option value="disabled" disabled selected>Select</option>
                    <option value="Test1">Test1</option>
                    <option value="Test2">Test2</option>
                    <option value="Test3">Test3</option>
                </select>
                <label>Barcode</label>
                <input class="number" type='text' name='product_barcode' id='product_barcode' placeholder='Enter Barcode' required/>
                <label>Register Date</label>
                <span class="date">
                    <input class="inventory-date-picker readonly" type="text" name="product-register-date" id="product-register-date" placeholder="Enter Register Date" required/>
                </span>
                <label>Cost Price</label>
                <input class="number" type='text' name='product_cost' id='product_cost' placeholder='Enter Cost Price' required/>

                <label>Quantity</label>
                <input class="number" type="text" name="product_quantity" id="product_quantity" placeholder="Enter Quantity" required/>
            </div>
            <div class="right-form-content">
                <label>Description </label>
                <textarea name="product_description" id="product_description" placeholder="Write something..." required></textarea>
                <input type="submit" value="Add product" name="submit" id="add_product_submit"/>
            </div>
        </form>
        <?php
        require('parts/footer.php');
        