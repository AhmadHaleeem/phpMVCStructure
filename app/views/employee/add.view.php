<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new employee</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
            outline: none;
            line-height: 1.2;
            font-size: 1em;
        }

        div.wrapper {

        }

        div.wrapper div.empForm {
            /*float: left;*/
        }

        div.wrapper div.employees {
            float: right;
            overflow: hidden;
        }

        form.appForm {
            width: auto;
            margin: 14px auto;
        }

        form.appForm fieldset {
            padding: 10px;
            background: #f1f1f1;
            border: 1px solid #e4e4e4;
        }

        form.appForm fieldset legend {
            background: #e4e4e4;
            padding: 5px;
            font: 2em Arial, Helvetica, sans-serif;
            color: #666;
        }

        form.appForm fieldset p.message {
            background: green;
            color: #fff;
            padding: 5px;
            margin: 3px 0;
            border-radius: 3px;
            font: 1em Arial, Helvetica, sans-serif;
        }

        form.appForm fieldset p.message.error {
            background: #900;
            color: #fff;
            padding: 5px;
            margin: 3px 0;
            border-radius: 3px;
            font: 1em Arial, Helvetica, sans-serif;
        }

        form.appForm table {
            width: 100%;
        }

        form.appForm label {
            font-family: Arial;
            font-size: 1.35em;
            color: #666;
        }

        form.appForm table tr td input[type=text],
        form.appForm table tr td input[type=number] {
            width: 96%;
            padding: 2%;
            font-family: Arial;
            font-size: 1.25em;
        }

        form.appForm table tr td input[type=submit] {
            padding: 8px;
            border-radius: 3px;
            background: green;
            color: #fff;
            font-family: Arial;
            font-size: 1.25em;
            margin-top: 10px;
        }

        form.appForm table tr td {
            padding: 3px 0;
        }

        div.wrapper div.employees table {
            width: 600px;
            margin: 20px 20px 0 0;
            border-collapse: collapse;
        }

        div.wrapper div.employees table thead th {
            text-align: left;
            padding: 5px;
            border-right: 2px solid #e4e4e4;
            border-bottom: 2px solid #e4e4e4;
            font: .9em Arial, Helvetica, sans-serif;
            color: #666;
        }

        div.wrapper div.employees table thead th:last-of-type {
            border-right: none;
        }

        div.wrapper div.employees table tbody td {
            text-align: left;
            padding: 5px;
            border: 1px solid #e4e4e4;
            font: .8em Arial, Helvetica, sans-serif;
            color: #666;
        }

        div.wrapper div.employees table tbody tr:nth-child(2) td {
            background: #f1f1f1;
        }

    </style>
</head>
<body>
<div class="wrapper">
    <div class="empForm">
        <form class="appForm" method="post" enctype="application/x-www-form-urlencoded">

            <fieldset>
                <legend>معلومات الموظفين :</legend>

                <?php if (isset($_SESSION['message'])) { ?>
                    <p class="message <?= isset($error) ? 'error' : '' ?>"><?= $_SESSION['message']; ?></p>
                    <?php
                    unset($_SESSION['message']);
                }
                ?>

                <table>
                    <tr>
                        <td>
                            <label for="name">اسم الموظف :</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="name" id="name" placeholder="ادخل اسم الموظف"
                                   maxlength="50" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="age">عمر الموظف :</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="number" name="age" id="age" placeholder="ادخل عمر الموظف" min="20"
                                   max="60" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="address">عنوان الموظف :</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="address" id="address" placeholder="ادخل عنوان الموظف"
                                   maxlength="100" >
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <label for="salary">راتب الموظف :</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="number" step="0.01" name="salary" id="salary"

                                   min="1500" max="9000" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="tax">ضريبة الموظف (%):</label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="number" step="0.01" name="tax" id="tax"

                                   min="1" max="5" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input class="btn btn-primary" type="submit" name="submit" value="حفظ">
                        </td>
                    </tr>
                </table>
            </fieldset>

        </form>
    </div>
</div>
</body>
</html>