FROM php:7.0.33-cli

COPY --from=composer /usr/bin/composer /usr/bin/composer

# COPY docker-composer-entrypoint.sh /docker-composer-entrypoint.sh

ENTRYPOINT ["/usr/bin/composer"]

CMD ["install"]
