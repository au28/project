# sqlsec

Final year project on securing a web application against sql injection attacks.


## Instructions

    Start the proxy by typing "sqlsec.start", stopping is done by "sqlsec.stop"
    Need to install a web server(like Apache) and mysql client/server
    This application assumes that the server root is /var/www/html, make changes otherwise
    Example web applications with and without using the proxy is given in the examples folder
    Copy the examples to /var/www/html and test
      

## Build

sqlsec can be built by cloning the repository and then running make:

    git clone https://github.com/abhm/sqlsec.git
    cd sqlsec
    sudo make install

