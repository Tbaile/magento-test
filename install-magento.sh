#!/usr/bin/env sh
bin/magento setup:install \
    --base-url=http://magento.test \
    --db-host=127.0.0.1:3307 \
    --db-name=magento \
    --db-user=magento \
    --db-password=magento \
    --admin-firstname=Tommaso \
    --admin-lastname=Bailetti \
    --admin-email=bailetti.tommaso@gmail.com \
    --admin-user=admin \
    --admin-password=admin123 \
    --elasticsearch-host=127.0.0.1 \
    --elasticsearch-port=9201 \
    --amqp-host=127.0.0.1 \
    --amqp-port=5673 \
    --amqp-user=magento \
    --amqp-password=magento \
    --language=it_IT \
    --currency=EUR \
    --timezone=Europe/Rome \
    --use-rewrites=1

