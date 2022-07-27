<!DOCTYPE html>
<html>  
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

  <body>
    <!-- (A) SEARCH FORM -->
    <form method="post" action="search.php">
      <h1>SEARCH FOR MORE RECORDS</h1>
      <input type="text" name="search" required/>
      <input type="submit" value="Search"/> 
     
    </form>

    <?php
    // (B) PROCESS SEARCH WHEN FORM SUBMITTED
    if (isset($_POST["search"])) {
      // (B1) SEARCH FOR USERS
      require "2-search.php";

      // (B2) DISPLAY RESULTS
          $n=1;
         printf("<h1>The records found are: </h1><br>");
      if (count($results) > 0) { foreach ($results as $r) {
      
        printf("<div>".$n."-%s with code %s from %s branch were %s in total and %s drugs were issued </div>", $r["name"], $r["code"], $r["branch"], $r["quantity"], $r["allocated"]);
            $n += $n;
      }} else { echo "No results found"; }
    }
    ?>
  </body>
</html>
