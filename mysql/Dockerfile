FROM mysql:5.6

MAINTAINER Mahmoud Zalt <mahmoud@zalt.me>

RUN chown -R 777 /var/lib/mysql
RUN chown -R 777 /var/lib/mysql-files
ADD my.cnf /etc/mysql/conf.d/my.cnf

CMD ["mysqld"]

EXPOSE 3306
