cd okey101

composer install
echo "Composer Çalıştırıldı"

cp -n .env.example .env
echo ".env Dosyası Oluşturuldu"

php artisan key:generate
echo "App Key Oluşturuldu"

php artisan migrate
echo "Migrationlar Çalıştırıldı"

php artisan db:seed
echo "Seederlar Çalıştırıldı"
