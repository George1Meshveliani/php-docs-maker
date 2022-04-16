<?php

const FILE_PATH = "./transaction_files/sample_1.csv";

if (($open = fopen(FILE_PATH, "r")) !== FALSE) {

    while (($data = fgetcsv($open, 1000)) !== FALSE) {
        $array[] = $data;
    }

    fclose($open);
}

function getDateData($array_name) {
    foreach ($array_name as $arr) {
        if ($arr[0] != 'Date') {
            echo "<tr> 
                    <td> $arr[0] </td> 
                  </tr>";
        }
    }
}

?>