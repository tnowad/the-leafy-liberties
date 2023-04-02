FROM mysql:8.0.32-debian

COPY ./sql/ /docker-entrypoint-initdb.d/

# expose the port
EXPOSE 3306

# run the container
CMD ["mysqld"]
