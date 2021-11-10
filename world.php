<?php

// get the q parameter from URL
$country = $_REQUEST["country"];
$context = $_REQUEST["context"];

$host 		  = 'localhost';
$username 	= 'lab5_user';
$password 	= 'password123';
$dbname 	  = 'world';
$conn 		  = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($context == "country"){
  $stmt 		  = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
}
else if($context == "cities"){
  $stmt 		  = $conn->query("SELECT cities.name, district, cities.population FROM countries INNER JOIN cities ON countries.code = cities.country_code WHERE countries.name='$country';");
}


$results 	  = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>



<table>

 
<?php if ($context == "country"): ?>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>

  <?php foreach ($results as $row): ?>
    <tr>
    <td><?= $row['name']?></td>
    <td><?= $row['continent']?></td>
    <td><?= $row['independence_year']?></td>
    <td><?= $row['head_of_state']?></td>
  </tr>
<?php endforeach; ?>

<?php  elseif ($context == "cities" ): ?>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>

  <?php foreach ($results as $row): ?>
    <tr>
    <td><?= $row['name']?></td>
    <td><?= $row['district']?></td>
    <td><?= $row['population']?></td>
  </tr>
<?php endforeach; ?>
<?php endif ?>

</table>
