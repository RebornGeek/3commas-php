FROM reborngeek/lamp:latest
EXPOSE 80
EXPOSE 443
RUN mkdir -p /etc/apache2/ssl
RUN mkdir -p /home/logs/thehardylawfirm.com/ && chown www-data:www-data /home/logs
RUN ln -sf /proc/self/fd/1 /var/log/apache2/access.log && ln -sf /proc/self/fd/1 /var/log/apache2/error.log
RUN ln -sf /proc/self/fd/1 /home/logs/thehardylawfirm.com/access_log && ln -sf /proc/self/fd/1 /home/logs/thehardylawfirm.com/error_log
RUN apt-get update && apt-get install -y php-curl
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]