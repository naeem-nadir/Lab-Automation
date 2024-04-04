<?php
include('query.php');
try {
    $pdo = new PDO($server, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the product name from the form
        $productName = $_POST["productName"];

        // Example query
        $stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE :productName");
        $productName = "%$productName%";
        $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display results
        echo "<div style='text-align: center;'>";
        echo "<h2>Search Results:</h2>";

        foreach ($results as $row) {
            echo "<div style='text-align: center;'>";
            echo "<h2>Product Name = " . $row["name"] . "</h2>";
            echo "<h2>Product Weight = " . $row["weight"] . "</h2>";
            echo "<h2>Product ID = " . $row["productid"] . "</h2>";

            // Display image if 'image' is not empty
            if (!empty($row["image"])) {
                echo "<img src='assets/pics/" . htmlspecialchars($row["image"]) . "' alt='Product Image' height='200px'>";
            } else {
                echo "<p>No Image Available</p>";
            }
            echo "<h2> " . $row["STATUS"] . "</h2>";
            echo "</div>";
        }

        echo "</div>";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>