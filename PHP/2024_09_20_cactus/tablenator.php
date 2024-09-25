<form method="post">
  <label for="rows">Filas:</label><br>
  <input type="text" id="rows" name="rows"><br>
  <label for="cols">Columnas:</label><br>
  <input type="text" id="cols" name="cols"><br>
  <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["rows"]) && isset($_POST["cols"])) {
                $rows = htmlspecialchars($_POST["rows"]);
                $cols = htmlspecialchars($_POST["cols"]);


                echo '<table border="1">';
                for ($i = 0; $i < $rows; $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < $cols; $j++) {
                                echo "<td>DAW2</td>";
                        }
                        echo "</tr>";
                }
                echo "</table>";

        }
}
?>
