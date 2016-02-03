<?php
	require_once('database.php');

	// Get category ID
	if (!isset($category_id)) {
		$category_id = filter_input(INPUT_GET, 'category_id',
				FILTER_VALIDATE_INT);
		if ($category_id == NULL || $category_id == FALSE) {
			$category_id = 1;
		}
	}	
	
	
	// Get all categories
	$query = 'SELECT * FROM categories
	                       ORDER BY categoryID';
	$statement = $db->prepare($query);
	$statement->execute();
	$categories = $statement->fetchAll();
	$statement->closeCursor();
	

?>






<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
        <!-- Newly added table -->
  			 <?php foreach ($categories as $category) : ?>
            <tr>                
                <td><?php echo $category['categoryName']; ?></td>
              
                <td><form action="add_category.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>  
                             
        <!-- Newly added tabe -->        
    
    </table>

    <h2>Add Category</h2>
    
    <!-- Newly added form code -->    
    <label>Name:</label>
    <input type="text" name="price">

    <label>&nbsp;</label>
    <input type="submit" value="Add"><br>        
    <!-- Newly added form code -->    
    
    <br>
    <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>