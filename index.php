<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$hotelsWithParking = array_filter($hotels, function ($hotel) {
    return $hotel['parking'] === true;
});

$hotelsWithoutParking = array_filter($hotels, function ($hotel) {
    return $hotel['parking'] === false;
});

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .display-none {
            display: none;
        }
    </style>
</head>

<body>
    <h2>Lista Hotel</h2>

    <form action="index.php">
        <input type="checkbox" name="parkingTrue" id="parking" value="true">
        <span>Con Parcheggio</span>
        <input type="checkbox" name="parkingFalse" id="parking" value="false">
        <span>Senza Parcheggio</span>
        <input type="submit">
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['parkingTrue'])) {

                foreach ($hotelsWithParking as $hotelWithParking) {
            ?>
                    <tr>
                        <td><?php echo $hotelWithParking['name']; ?></td>
                        <td><?php echo $hotelWithParking['description']; ?></td>
                        <td><?php echo $hotelWithParking['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?php echo $hotelWithParking['vote']; ?></td>
                        <td><?php echo $hotelWithParking['distance_to_center']; ?> km</td>
                    </tr>
                <?php
                }

            } elseif (isset($_GET['parkingFalse'])) {

                foreach ($hotelsWithoutParking as $hotelWithoutParking) {
                ?>
                    <tr>
                        <td><?php echo $hotelWithoutParking['name']; ?></td>
                        <td><?php echo $hotelWithoutParking['description']; ?></td>
                        <td><?php echo $hotelWithoutParking['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?php echo $hotelWithoutParking['vote']; ?></td>
                        <td><?php echo $hotelWithoutParking['distance_to_center']; ?> km</td>
                    </tr>
                <?php
                }

            } else {

                foreach ($hotels as $hotel) {
                ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?> km</td>
                    </tr>
            <?php
                }
                
            }
            ?>
        </tbody>
    </table>
</body>

</html>