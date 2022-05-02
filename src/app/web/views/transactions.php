<?php
use  App\Users as User;
use App\Calculations as Calculations;

const FILE_PATH = "../app/web/transaction_files/sample_1.csv";

$id = new User\CurrentUser(1);

if (($open = fopen(FILE_PATH, "r")) !== FALSE) {

    while (($data = fgetcsv($open, 1000)) !== FALSE) {
        $array[] = $data;
    }

    fclose($open);
}

$calculations = new Calculations\CalculationMethods($array, '');
$income = new Calculations\CalculationMethods($array, 'income');
$expenses = new Calculations\CalculationMethods($array, 'expenses');
$net = new Calculations\CalculationMethods($array, 'net');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
<!--    <link rel="stylesheet" href="./styles.css">-->
    <style>
        body {
            padding: 1%;
            background-color: black;;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        table tr th, table tr td {
            color: lightgoldenrodyellow;
            padding: 6px;
            border: 2px darkblue solid;
        }
        tfoot tr th, tfoot tr td {
            font-size: 18px;
        }
        tfoot tr th {
            text-align: right;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Date   </th>
        <th>Check #</th>
        <th>Description </th>
        <th>Amount </th>
    </tr>
    </thead>
    <tbody>
    <!-- YOUR CODE -->
    <?php
       $calculations->getData();
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">Total Income:</th>
        <td>
            <!-- YOUR CODE -->
            <?php
                echo $income->getTotal();
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Total Expense:</th>
        <td>
            <?php
                echo $expenses->getTotal();
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Net Total:</th>
        <td>
            <?php
                echo $net->getTotal();
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Current User ID:</th>
        <td>
            <?php
            echo $id->getCurrentUser()->id;
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Generated unique ID:</th>
        <td>
            <?php
            echo $id->generateUserUniqueID();
            ?>
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>