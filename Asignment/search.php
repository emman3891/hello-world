<html>  
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

  <body>    
    <p><a href="index.php" class="btn btn-primary"><<==Go Back</a>
      <a href="1-form.php" class="btn btn-primary"><<=DO MORE SEARCH=>></a></p>
  </body>
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
            $n = $n + 1;
      }} else { echo "No results found"; }
    }
    ?>
