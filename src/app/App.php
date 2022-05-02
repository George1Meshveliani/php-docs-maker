<?php

namespace App;

class App {

    private array $array_name;
    private string $result;

    public function __construct($array_name, $result) {
        $this->array_name = $array_name;
        $this->result = $result;
    }
    /**
     * @param $array_name
     */
    function getData() {

        foreach ($this->array_name as $arr) {

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
    function getTotal() {
        $sum = 0;
        if ($this->result == 'income') {
            foreach ($this->array_name as $arr) {
                $amount_number = intval(str_replace('$', '', $arr[3]));
                if ($amount_number > 0) {
                    $sum += $amount_number;
                }
            }
        }

        if ($this->result == 'expenses') {
            foreach ($this->array_name as $arr) {
                $amount_number = intval(str_replace('$', '', $arr[3]));
                if ($amount_number < 0) {
                    $sum -= $amount_number;
                }
            }
        }

        if ($this->result == 'net') {
            foreach ($this->array_name as $arr) {
                $amount_number = intval(str_replace('$', '', $arr[3]));
                $sum += abs($amount_number);
            }
        }
        return $sum;
    }

}


?>