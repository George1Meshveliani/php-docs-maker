<?php

/**
 * @param $file
 */
function fileToArray($file) {
    if (($open = fopen($file, "r")) !== FALSE) {

        while (($data = fgetcsv($open, 1000)) !== FALSE) {
            $array[] = $data;
        }

        fclose($open);
    }

    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}