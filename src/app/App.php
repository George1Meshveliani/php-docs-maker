<?php

const FILE_PATH = "./transaction_files/sample_1.csv";

if (($open = fopen(FILE_PATH, "r")) !== FALSE) {

    while (($data = fgetcsv($open, 1000)) !== FALSE) {
        $array[] = $data;
    }

    fclose($open);
}

/**
 * @param $array_name
 */
function getData($array_name) {
    foreach ($array_name as $arr) {
        if ($arr[0] != 'Date') {
            echo "
                  <tr> 
                    <td> $arr[0] </td> 
                    <td> $arr[1] </td> 
                    <td> $arr[2] </td> 
                    <td> $arr[3] </td> 
                  </tr>          
                  ";
        }
    }
}

?>