<?php
    session_start();
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/semantic.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/components/icon.min.css">
        <link rel="stylesheet" type="text/css" href="../css/menu.css">

    </head>
    <body>

        <?php
            include "./menu.php";
        ?>

        <div class="ui container">

        <header class="ui blue raised stackable segment centered header">A B O U T</header>
        
        <div class="ui teal raised stackable segment">
            <div class="ui red padded aligned raised segment">
                <h1 style="font-size: 20px;color: red;">Movie Ticket Booking Platform</h1>
                <div class="ui horizontal divider"><i class="star red icon"></i></div>
                <p style="text-align: justify;font-size: 20px;text-indent: 40px;" >
                    A movie ticket booking platform is a digital service that allows users to browse, select, and purchase tickets for movies showing in theaters. These platforms typically offer a user-friendly interface where customers can search for movies by title, genre, location, or showtime. Once a movie and showtime are selected, users can choose their seats from a seating chart and proceed to payment.
                </p>
            </div>
            <div class="ui blue raised stackable segment">
                <div class="ui blue header">RGUKT Map</div>
                <div class="ui horizontal divider">
                    <i class="blue star icon"></i>
                </div>
                <div class="ui centred segment">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15100.505932119995!2d77.91977568179941!3d18.881469205597153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1710063583947!5m2!1sen!2sin" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        </div>
    </body>
</html>