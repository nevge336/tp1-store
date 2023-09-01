<?php

class Design{

    static public function header($title){
        return "
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <title>$title</title>
            <link rel='stylesheet' href='./assets/css/main.css'>
        </head>
        <body>
            <header>
                <h1>Mlab</h1>
                <h2>$title</h2>
            </header>
            <main>   
        ";
    }


    static public function footer(){
        return "
            </main>
            <footer class='footer'>

            </footer>
        </body>
        </html>
        
        
        ";
    }

}

?>