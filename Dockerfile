FROM quay.io/phpramework/composer

MAINTAINER phpramework <phpramework@gmail.com>

ENV FRAMEWORK=unknown \
    URI_JSON=/json \
    URI_DB=/db \
    URI_QUERIES=/queries/ \
    URI_UPDATES=/updates/ \
    URI_FORTUNES=/fortunes \
    URI_PLAINTEXT=/plaintext

RUN curl -L http://codeception.com/codecept.phar > /usr/local/bin/codecept \
    && chmod +x /usr/local/bin/codecept \
    && curl -L https://github.com/consolidation/Robo/releases/download/1.0.0-RC3/robo.phar > /usr/local/bin/robo \
    && chmod +x /usr/local/bin/robo \
    && composer global require flow/jsonpath

RUN rm -rf /var/cache/apk/* /var/tmp/* /tmp/*

RUN mkdir -p /result
VOLUME /result

COPY tests /project/tests
COPY codeception.yml /project/codeception.yml
COPY RoboFile.php /project/RoboFile.php

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh", "robo", "verify"]
