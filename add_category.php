<?php
	
	// Get the Category data
	$category = filter_input(INPUT_POST, 'category_name');
	
	// Validate inputs	
	if ($category == null) {
		$error = "Invalid product data. Check all fields and try again.";
		include('error.php');
	} else {
		require_once('database.php');

		// Add the product to the database  
		$query = 'INSERT 
				  INTO 
				 	products (categoryName)
				  VALUES (:category_name)';
		
		$statement = $db->prepare($query);
		$statement->bindValue(':category_name', $category);
		$statement->execute();
		$statement->closeCursor();

		// Display the Category List page
		include('category_list.php');
	}    

    

?>