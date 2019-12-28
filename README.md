SQL console to test and learn queries 
1. Clone repo
2. ``cd SQLtester/``
3. ``docker-compose up -d``
4. Create directory `cache` inside `SQLtester/www/`
and make it writable on your container
    * if you added locally `cache` in `SQLtester/www/` it should appear inside container too in directory
        `/var/www/html/`
    * go to container console `` docker exec -it sqltester_www_1 /bin/bash``,
    while `sqltester_www_1` will vary on your machine. 
    You can find container name: `docker ps`.
    * ``chmod a+w cache/``
5. find sample database table in `SQLtester/www/app/`