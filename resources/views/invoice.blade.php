<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>

    <style>

        body{
            font-family: DejaVu Sans;
        }

        h1{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        td,th{
            border:1px solid #000;
            padding:10px;
        }

    </style>

</head>

<body>

<h1>Trip Invoice</h1>

<table>

<tr>
    <th>Trip</th>
    <td>{{ $booking->trip->name }}</td>
</tr>

<tr>
    <th>Price</th>
    <td>{{ $booking->trip->price }} EGP</td>
</tr>

<tr>
    <th>Persons</th>
    <td>{{ $booking->persons }}</td>
</tr>

<tr>
    <th>Total</th>
    <td>{{ $booking->trip->price * $booking->persons }} EGP</td>
</tr>

<tr>
    <th>Trip Date</th>
    <td>{{ $booking->trip->trip_date }}</td>
</tr>

<tr>
    <th>Status</th>
    <td>{{ $booking->status }}</td>
</tr>

</table>

</body>

</html>