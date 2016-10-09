<?php
require_once("connection.php");

if(!empty($_POST["country_id"])) {
	$statement = $db->prepare("SELECT * FROM villages WHERE marketing_id = ?");
$statement->execute(array($_POST["country_id"]));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
	<option value="">Select State</option>
<?php
	foreach ($result as $row) {
	?>
	<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>

	<?php
		}
}
?>
