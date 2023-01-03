<!DOCTYPE html>
<html>

<head>
    <title>Invoice Details</title>
</head>

<body>

    <h1> {{ $details['title'] }} </h1>

    <p> <?php $detail = explode('/', $details['body']);
    
    ?>
    <p> {{ $detail['0'] }}</p>
    <p> {{ $detail['1'] }}</p>

    </p>

    <h3>Thank you</h3>
</body>

</html>
