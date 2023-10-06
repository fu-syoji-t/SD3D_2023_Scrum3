<?php
    class template{
        function __construct($text1,$text2,$text3){
            echo "<h1>".$text1."</h1>";
            echo "<h2>".$text2."</h2>";
            echo "<h3>".$text3."</h3>";
        }
    }

    class html_standard_template{
        function __construct()
        {
            echo '<head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
            <title>hometown_detail</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <style>
        
            </style>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        </head>';
        }
    }

?>