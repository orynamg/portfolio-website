# My protfolio website (PHP version)

### Development notes 

Lookup remote MySQL connection string: run in the project folder

    heroku config | grep CLEARDB

Connect to remote MySQL: first add MySQLWorkbench bin folder to PATH so that `mysql` command becomes available, then connect using hostname, username and password from heroku config

    export PATH=$PATH:/Applications/MySQLWorkbench.app/Contents/MacOS
    mysql -h host -u user dbname -p

To push to heroku

    git push heroku master


