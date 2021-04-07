FROM adminer:latest

USER root
COPY BaltimoreCyberTrustRoot.crt.pem /certs/ca.pem
RUN chmod 444 /certs/ca.pem

WORKDIR /var/www/html
COPY login-azure-ssl.php plugins-enabled/login-azure-ssl.php

RUN chown -R adminer plugins-enabled
USER adminer