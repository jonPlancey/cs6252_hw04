<?php
	
	// Get the product data

	$category = filter_input(INPUT_POST, 'categoryName', FILTER_VALIDATE_INT);
	
	$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
	$code = filter_input(INPUT_POST, 'code');
	$name = filter_input(INPUT_POST, 'name');
	$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);


	// Validate inputs
	if ($category == null || $category == false ) {
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