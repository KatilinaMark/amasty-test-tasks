<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
        <form action='includes\searchPersonQuery.php' name='search-person' method='post'>
            <input type='text' name='person-name' placeholder='Enter person name'>
            <button type='submit' name='search-person'>Search person</button>
        </form>
        <form action='includes\searchTransactionQuery.php' name='search-person' method='post'>
            <button type='submit' name='search-transaction'>Search transaction</button>
        </form>
        <form action='includes\searchCityQuery.php' name='search-city' method='post'>
            <button type='submit' name='search-city'>Search city</button>
        </form>
    </div>
</body>
</html>