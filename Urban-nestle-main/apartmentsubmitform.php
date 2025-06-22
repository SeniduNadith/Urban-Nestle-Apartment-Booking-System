<!DOCTYPE html>
<html>
    <head>
        <title>Apartment Listing Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="apartmentsubmitform.css">
        <script src="apartmentsubmitform.js"></script> 
       

    </head>
    <body>

    <div class="form-container">

        <form method="post" action="apartmentsubmit.php" >


            <h2>Apartment Listing Form</h2>

            <label for = "title">Apartment Title :</label>
            <input type = "text" id = "title" name = "title" required>

            <label for = "description">Description :</label>
            <textarea id = "description" name = "description" rows="4" required> </textarea>

            <label  for ="city">City :</label>
            <input type="text" id="city" name="city" required>

            <label  for ="address">Address :</label>
            <input type="text" id="address" name="address" required>

            <label  for ="a_type">Apartment Type :</label>
            <input type="text" id="a_type" name="a_type" placeholder="Enter 'Rent' for rent,'Sale' for sale" required>

            <label for="price">Price :</label>
            <input type="text" id="price" name="price" required>

            <input type="submit" value="Submit Now">
            
        </form>

            <button class="clear-button" onclick="clearForm()">Clear</button>
    
    </div>

       

       
    </body>
</html>

