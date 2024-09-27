FROM nginx:alpine

COPY nginx.conf /etc/nginx/

RUN apk update \
    && apk upgrade \
    && apk --update add logrotate \
    && apk add --no-cache openssl \
    && apk add --no-cache bash

RUN apk add --no-cache curl

RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

ARG NGINX_PHP_UPSTREAM_CONTAINER
ARG NGINX_PHP_UPSTREAM_PORT
ARG NGINX_HOST_HTTP_PORT
ARG NGINX_HOST_HTTPS_PORT

# Create 'messages' file used from 'logrotate'
RUN touch /var/log/messages

# Copy 'logrotate' config file
COPY logrotate/nginx /etc/logrotate.d/
RUN mkdir -p /etc/nginx/ssl
RUN chown root:root /etc/nginx/ssl
RUN chmod 777 /etc/nginx/ssl

# Set upstream conf and remove the default conf
RUN echo "upstream php-upstream { server ${NGINX_PHP_UPSTREAM_CONTAINER}:${NGINX_PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf \
    && rm /etc/nginx/conf.d/default.conf

RUN echo

ADD ./startup.sh /opt/startup.sh
RUN sed -i 's/\r//g' /opt/startup.sh
CMD ["/bin/bash", "/opt/startup.sh"]

EXPOSE ${NGINX_HOST_HTTP_PORT} ${NGINX_HOST_HTTPS_PORT}
