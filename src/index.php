<?php

const FILE_PATH = "./transaction_files/sample_1.csv";

if (($open = fopen(FILE_PATH, "r")) !== FALSE) {

    while (($data = fgetcsv($open, 1000)) !== FALSE) {
        $array[] = $data;
    }

    fclose($open);
}
echo "<pre>";
var_dump($array);
echo "</pre>";
