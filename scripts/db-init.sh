#!/bin/bash
# wait for MySQL to be ready
until mysql -h "localhost" -u"$MYSQL_ROOT_USER" -p"$MYSQL_ROOT_PASSWORD" &> /dev/null
do
    echo "Waiting for MySQL..."
    sleep 2
done

echo "Running init.sql..."
mysql -u"$MYSQL_ROOT_USER" -p"$MYSQL_ROOT_PASSWORD" php_app < /docker-entrypoint-initdb.d/init.sql

echo "Database initialized!"