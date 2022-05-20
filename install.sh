#!/usr/bin/env sh

bin/magento setup:install \
    --base-url=https://magento.lndo.site \
    --db-host=database \
    --db-name=lemp \
    --db-user=lemp \
    --db-password=lemp \
    --admin-firstname=Tommaso \
    --admin-lastname=Bailetti \
    --admin-email=bailetti.tommaso@gmail.com \
    --admin-user=admin \
    --admin-password=admin123 \
    --elasticsearch-host=search \
    --amqp-host=messaging \
    --amqp-user=magento \
    --amqp-password=magento \
    --language=it_IT \
    --currency=EUR \
    --timezone=Europe/Rome \
    --use-rewrites=1
