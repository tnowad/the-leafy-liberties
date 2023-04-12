FROM mysql:8.0.32-debian

COPY ./sql/init.sql /docker-entrypoint-initdb.d/init.sql:ro

# expose the port
EXPOSE 3306

# run the container
CMD ["mysqld"]
