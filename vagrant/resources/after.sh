#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.

cd projects/okey
composer install
echo "Composer Çalıştırıldı ^-^"
cp -n .env.example .env
echo ".env Dosyası Oluşturuldu :3"
php artisan key:generate
echo "App Key Oluşturuldu (・ω・)"
php artisan migrate
echo "Migrationlar Çalıştırıldı ^o^"
php artisan db:seed
echo "Seederlar Çalıştırıldı *-*"
