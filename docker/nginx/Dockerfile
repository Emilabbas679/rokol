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
ARG NGINX_DOCKER_INTERNAL_HOST_HTTP_PORT
ARG NGINX_HOST_HTTPS_PORT
ARG NGINX_DOCKER_INTERNAL_HOST_HTTPS_PORT
ARG NGINX_SERVER_NAME

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

RUN mkdir -p /etc/nginx/sites-enabled

RUN echo "server {\
        listen ${NGINX_DOCKER_INTERNAL_HOST_HTTP_PORT};\
        listen [::]:${NGINX_DOCKER_INTERNAL_HOST_HTTP_PORT};\
        add_header X-Frame-Options \"SAMEORIGIN\";\
        add_header X-Content-Type-Options \"nosniff\";\
        charset utf-8;\
        server_name ${NGINX_SERVER_NAME};\
        root /var/www/html/public;\
        index index.php index.html index.htm;\
        location / {\
            try_files \$uri \$uri/ /index.php?\$query_string;\
        }\
        location = /favicon.ico { access_log off; log_not_found off; }\
        location = /robots.txt  { access_log off; log_not_found off; }\
        location ~* \.(?:jpg|jpeg|gif|png|ico|cur|gz|svg|svgz|mp4|mp3|ogg|ogv|webm|htc|woff2|woff)$ {\
            expires 30d;\
            access_log off;\
            add_header Cache-Control \"max-age=2629746, public\";\
        }\
        location ~* \.(?:css|js)$ {\
            expires 1y;\
            access_log off;\
            add_header Cache-Control \"max-age=31556952, public\";\
        }\
        location ~ \.php$ {\
            fastcgi_pass php-upstream;\
            fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;\
            include fastcgi_params;\
           	fastcgi_index  index.php;\
            fastcgi_intercept_errors  on;\
            fastcgi_send_timeout 600s;\
            fastcgi_read_timeout 600s;\
            fastcgi_buffer_size 128k;\
            fastcgi_buffers 256 16k;\
            fastcgi_busy_buffers_size 256k;\
            fastcgi_temp_file_write_size 256k;\
        }\
        error_log /var/log/nginx/${NGINX_PHP_UPSTREAM_CONTAINER}_error.log;\
        access_log /var/log/nginx/${NGINX_PHP_UPSTREAM_CONTAINER}_access.log;\
    }" >> /etc/nginx/sites-enabled/site.conf


ADD ./startup.sh /opt/startup.sh
RUN sed -i 's/\r//g' /opt/startup.sh
CMD ["/bin/bash", "/opt/startup.sh"]

EXPOSE ${NGINX_DOCKER_INTERNAL_HOST_HTTP_PORT} ${NGINX_DOCKER_INTERNAL_HOST_HTTPS_PORT}
