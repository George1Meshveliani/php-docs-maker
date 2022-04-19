<?php
    require './app/App.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <link rel="stylesheet" href="styles.css">
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
    <?php getData($array); ?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">Total Income:</th>
        <td>
            <!-- YOUR CODE -->
            <?php echo getTotal($array, 'income'); ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Total Expense:</th>
        <td>
            <!-- YOUR CODE -->
            <?php echo getTotal($array, 'expenses') ?>
        </td>
    </tr>
    <tr>
        <th colspan="3">Net Total:</th>
        <td>
            <!-- YOUR CODE -->
            <?php echo getTotal($array, 'net') ?>
        </td>
    </tr>
    </tfoot>
</table>
</body>
</html>