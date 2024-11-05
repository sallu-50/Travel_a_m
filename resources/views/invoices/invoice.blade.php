<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice</title>
</head>

<body>
    <h1>Invoice for Booking #{{ utf8_encode($booking['id']) }}</h1>
    <p>Name: {{ utf8_encode($booking['registration']['full_name']) }}</p>
    <p>Paid Amount: {{ utf8_encode($booking['paid_amount']) }}</p>
</body>

</html>
