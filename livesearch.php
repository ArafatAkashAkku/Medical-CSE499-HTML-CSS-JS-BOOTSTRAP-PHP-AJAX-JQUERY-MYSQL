<?php
// Include the database configuration file.
require_once 'includes/config.php';
include 'includes/dbConnect.php';
// Retrieve the value of the "search" variable from "script.js".
if (isset($_POST['search'])) {
    // Assign the search box value to the $Name variable.
    $name = $_POST['search'];
    // Define the search query.
    $query = "SELECT `id`,`fullname` FROM doctor WHERE `fullname` LIKE '%$name%' LIMIT 5";
    // Execute the query.
    $execquery = MySQLi_query($con, $query);
    // Create an unordered list to display the results.
    echo '
<ul style="display:flex;flex-direction:column;gap:10px;">
   ';
    // Fetch the results from the database.
    while ($result = MySQLi_fetch_array($execquery)) {
        if ($result) {
?>
            <!-- Create list items.
        Call the JavaScript function named "fill" found in "script.js".
        Pass the fetched result as a parameter. -->

            <li onclick='fill("<?php echo htmlentities($result['fullname']); ?>")'>
                <a style="cursor:pointer; text-decoration:none;color:black;" href="search_result?search=<?php echo $result['fullname']; ?>">
                    <!-- Display the searched result in the search box of "search.php". -->
                    <?php echo $result['fullname']; ?>
            </li></a>
            <!-- The following PHP code is only for closing parentheses. Do not be confused. -->
        <?php
        } else {
        ?>
            <li>
                <a">
                    <!-- Display the searched result in the search box of "search.php". -->
                    <?php "No result"; ?>
            </li></a>
<?php
        }
    }
}
?>
</ul>