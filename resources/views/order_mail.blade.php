<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    
    <h3> Dear {{$data['name']}},</h3>

    <br/>
    <p> Your order has been successfully recieved </p>
    <h5>Order number {{$data['order']}} Items ordered: {{$data['product']}} number :{{$data['quantity']}} Cost: {{$data['cost']}}</h5>

    <p> Thank you</p>
</body>
</html>