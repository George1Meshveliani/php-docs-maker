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

            $date = $arr[0];
            $formated_date =  date('F d, Y', strtotime($date));
            $check = $arr[1];
            $transaction = $arr[2];
            $amount = $arr[3];
            $amount_number = str_replace('$', '', $arr[3]);

            if ($amount_number > 0) {
                $amounts = "<td style='color: limegreen'> $amount </td>";
                $transactions = "<td style='color: limegreen'> $transaction </td>";
                $checks = "<td style='color: limegreen'> $check </td>";
                $given_date = "<td style='color: limegreen'> $formated_date </td>";
            }
            else {
                $amounts = "<td style='color: red'> $amount </td>";
                $transactions = "<td style='color: red'> $transaction </td>";
                $checks = "<td style='color: red'> $check </td>";
                $given_date = "<td style='color: red'> $formated_date </td>";
            }
            echo "
                  <tr> 
                    $given_date
                    $checks
                    $transactions 
                    $amounts
                  </tr>          
                  ";
        }
    }
}

/**
 * @param $array_name
 * @param string $result
 */
function getTotal($array_name, $result = '') {
    $sum = 0;
    if ($result == 'income') {
        foreach ($array_name as $arr) {
            $amount_number = str_replace('$', '', $arr[3]);
            if ($amount_number > 0) {
                $sum += $amount_number;
            }
        }
    }

    if ($result == 'expenses') {
        foreach ($array_name as $arr) {
            $amount_number = str_replace('$', '', $arr[3]);
            if ($amount_number < 0) {
                $sum -= $amount_number;
            }
        }
    }

    if ($result == 'net') {
        foreach ($array_name as $arr) {
            $amount_number = str_replace('$', '', $arr[3]);
            $sum += abs($amount_number);
        }
    }
    return $sum;
}

?>