<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Inline styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .card {
            margin-top: 3%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #464AC8;
            color: #fff;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .card-body {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="card" style="margin-top: 3%; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-header" style="background-color: #464AC8; color: #fff; padding:5px; border-bottom: 1px solid #ccc;">
            <h4 class="text-light">Hello {{$admin}} you have new Order</h4>
        </div>
        <div class="card-body" style="padding: 20px;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">name</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">price</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">product</th>
                         <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">country</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">phone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{$customer}}</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{$price}}</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{$productName}}</th>
                         <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{$city}}</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{$phone}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
