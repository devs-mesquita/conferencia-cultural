#!/bin/bash
php artisan key:generate && \
php artisan config:cache &&\
php artisan migrate --force && \
php artisan db:seed --force && \
apache2ctl -D FOREGROUND
