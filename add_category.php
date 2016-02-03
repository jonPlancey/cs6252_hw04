<?php
	
	// Get the product data
	$category = filter_input(INPUT_POST, 'categoryName', FILTER_VALIDATE_INT);
	
	echo $category;
	
	// Validate inputs
	if ($category == null) {
		$error = "Invalid product data. Check all fields and try again.";
		include('error.php');
	} else {
		require_once('database.php');

		// Add the product to the database  
		$query = 'INSERT INTO products
					 (categoryName)
				  VALUES
					 (:categoryName)';
		$statement = $db->prepare($query);
		$statement->bindValue(':categoryName', $category);
		$statement->execute();
		$statement->closeCursor();

		// Display the Product List page
		include('category_list.php');
	}    

    

?>