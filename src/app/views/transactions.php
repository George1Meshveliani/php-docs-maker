<?php
use  App as CU;
    require '../app/App.php';
    $id = new CU\CurrentUser(1);
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
        getData($array);
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">Total Income:</th>
        <td>
            <!-- YOUR CODE -->
            <?php
                echo getTotal($array, 'income');
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Total Expense:</th>
        <td>
            <?php
                echo getTotal($array, 'expenses')
            ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Net Total:</th>
        <td>
            <?php
                echo getTotal($array, 'net')
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