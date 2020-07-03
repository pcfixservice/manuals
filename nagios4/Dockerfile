docker run -d  --name nagios4  \
  -v /var/www/html/nagios4/etc/:/opt/nagios/etc/ \
  -v /var/www/html/nagios4/var/:/opt/nagios/var/ \
  -v /var/www/html/nagios4/var/:/opt/Custom-Nagios-Plugins \
  -v /var/www/html/nagios4/nagiosgraph/var/:/opt/nagiosgraph/var \
  -v /var/www/html/nagios4/nagiosgraph/etc/:/opt/nagiosgraph/etc \
  -p 0.0.0.0:8080:80 jasonrivers/nagios:latest
