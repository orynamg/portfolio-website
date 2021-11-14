# My portfolio website (PHP version)

## Development notes 

### Run locally

Start docker compose in the project folder then open [localhost](http://localhost) in browser. [docker-compose.yaml](docker-compose.yaml) binds `src` folder into PHP Docker container so any changes are visible upon refresh. JS, CSS, HTML are cached by the browser so _hard refresh_ is sometimes needed.

First, export database connection string used by docker compose. To connect to db on heroku, lookup the details such as username, password and hostname in heroky config (see below)

    export CLEARDB_DATABASE_URL=mysql://user:password@hostname/dbname?reconnect=true
    docker-compose up

to stop

    docker-compose down

to start with a local database **uncomment the other two services in the docker compose fil** and use the following database connection string instead. Apply schema and seed the database if needed.  

    export CLEARDB_DATABASE_URL=mysql://webapp:webapp@db:3306/app1?reconnect=true

to stop and wipe out local seeded database run (-v removes volumes, see [documentation](https://docs.docker.com/compose/reference/down/))

    docker-compose down -v


### Connect to remote MySQL

Lookup remote MySQL connection string: run in the project folder

    heroku config | grep CLEARDB

Add MySQLWorkbench binaries to PATH so that `mysql` command becomes available. Then connect using hostname, username and password from heroku config

    export PATH=$PATH:/Applications/MySQLWorkbench.app/Contents/MacOS
    mysql -h host -u user dbname -p

### Deploy to Heroku

    git push heroku master

## External documentation

[docker-compose up](https://docs.docker.com/compose/reference/up/)

[docker-compose down](https://docs.docker.com/compose/reference/down/)