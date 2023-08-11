<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["csv_file"]) && !empty($_FILES["csv_file"]["name"])) {
        $csv_file = $_FILES["csv_file"]["tmp_name"];

        if (($handle = fopen($csv_file, "r")) !== false) {
            echo "<h2>Conteúdo do Arquivo CSV:</h2>";
            echo "<table border='1'>";
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                echo "<tr>";
                foreach ($data as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            fclose($handle);
        } else {
            echo "Erro ao ler o arquivo CSV.";
        }
    } else {
        echo "Nenhum arquivo CSV enviado.";
    }
}
?>