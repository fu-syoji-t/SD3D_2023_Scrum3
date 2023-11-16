<?php
    class Template {

        function __construct() {
            // コンストラクタを明示的に定義しないとインスタンス生成時にエラーが出る。
        }

        function test_h($t1, $t2, $t3) {
            echo
                '<div style="color: #c0f">
                    <p style="font-size: 2.5rem">'.$t1.'</p>
                    <p style="font-size: 5rem">'.$t2.'</p>
                    <p style="font-size: 10rem">'.$t3.'</p>
                </div>';
        }

        function head($title) {
            echo 
                '<!DOCTYPE html>
                <html>
                <head>
                    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
                    <title>'.$title.'</title>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
                </head>';
        }

        function header() {
            echo 
                '
                    <header>
                        <button onclick="location.href='."'#'".'">menu</button>
                        <button onclick="location.href='."'hometown.php?branch=all'".'">hometown</button>
                        <button onclick="location.href='."'#'".'">commit</button>
                        <button onclick="location.href='."'region.php'".'">category</button>
                        <button onclick="location.href='."'profile.php'".'">account</button>
                        <button onclick="location.href='."'#'".'">login</button>
                    </header>';
        }

        function footer() {
            echo
               '    <footer>
                        <h2>footer</h2>
                    </footer>
                </body>
                </html>';
        }
    }
?>