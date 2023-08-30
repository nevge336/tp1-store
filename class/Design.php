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
            <h1>MLAB YEAH!!!</h1>
            </header>
            <main>   
        ";
    }


    static public function footer(){
        return "
            </main>
            <footer>

            </footer>
        </body>
        </html>
        
        
        ";
    }

}

?>