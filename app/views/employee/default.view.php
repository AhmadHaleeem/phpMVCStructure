<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <style>
        .add_new_emp {
            background: #337ab7;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            float: left;
            margin-left: 81px;
            margin-bottom: 20px;
        }
          p.message {
            background: green;
            color: #fff;
            padding: 5px;
            margin: 3px 0;
            border-radius: 3px;
            font: 1em Arial, Helvetica, sans-serif;
        }

         p.message.error {
            background: #900;
            color: #fff;
            padding: 5px;
            margin: 3px 0;
            border-radius: 3px;
            font: 1em Arial, Helvetica, sans-serif;
        }
        div.employees {
            /*float: right;*/
            /*overflow: hidden;*/
        }

        div.employees table {
            width: 90% !important;
            margin: 20px 20px 0 0;
            border-collapse: collapse;
        }

        div.employees table thead th {
            text-align: left;
            padding: 5px;
            border-right: 2px solid #e4e4e4;
            border-bottom: 2px solid #e4e4e4;
            font: 1.4em Arial, Helvetica, sans-serif;
            color: #666;
        }

        div.employees table thead th:last-of-type {
            border-right: none;
        }

        div.employees table tbody td {
            text-align: left;
            padding: 5px;
            border: 1px solid #e4e4e4;
            font: 1.2em Arial, Helvetica, sans-serif;
            color: #666;
        }

        div.employees table tbody tr:nth-child(2) td {
            background: #f1f1f1;
        }

    </style>
</head>
<body>
<h1>Our Employees</h1>

<div class="employees">
    <?php
        if (isset($_SESSION['message'])) { ?>
            <p class="message <?= isset($error) ? 'error' : '' ?>"><?= $_SESSION['message'] ?></p>
       <?php
            unset($_SESSION['message']);
        }
    ?>
    <a class="add_new_emp" href="/employee/add">Add new employee</a>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Tax (%)</th>
            <th>Control</th>
        </tr>
        </thead>

        <tbody>
        <?php
        if (false != $employees) {
            foreach ($employees as $employee) { ?>
                <tr>
                    <td><?= $employee->name ?></td>
                    <td><?= $employee->age ?></td>
                    <td><?= $employee->address ?></td>
                    <td><?= $employee->tax ?></td>
                    <td>
                        <a href="/employee/edit/<?= $employee->id ?>"><i
                                    style="color: #343222"
                                    class="far fa-edit fa-1x"></a></i>
                        <a href="/employee/delete/<?= $employee->id ?>"
                           onclick="if(!confirm('Do you want to delete this confirm')) return false;"><i
                                    style="color: #990000"
                                    class="fas fa-trash-alt fa-1x"></i></a></i>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <td colspan="6"><p>Sorry no employees to list</p></td>
        <?php }
        ?>


        </tbody>
    </table>
</div>


</body>
</html>