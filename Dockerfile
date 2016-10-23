FROM phpramework/composer

MAINTAINER phpramework <phpramework@gmail.com>

RUN curl -L http://codeception.com/codecept.phar > /usr/local/bin/codecept \
    && chmod +x /usr/local/bin/codecept \
    && composer global require flow/jsonpath \
    && rm -rf /var/cache/apk/* /var/tmp/* /tmp/*

COPY tests /project/tests
COPY codeception.yml /project/codeception.yml

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

ENV SERVER_HOST=localhost \
    SERVER_PORT=8080 \
    URI_JSON=/json \
    URI_DB=/db \
    URI_QUERIES=/queries?queries= \
    URI_UPDATES=/updates?queries= \
    URI_FORTUNES=/fortunes \
    URI_PLAINTEXT=/plaintext

ENTRYPOINT ["entrypoint.sh", "phpdbg", "-qrr", "/usr/local/bin/codecept", "run"]
CMD ["-d"]