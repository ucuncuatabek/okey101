Merhaba!
* Projeyi indirdikten sonra sisteminize virtual box ve vagrant kurmuş olmanız gerekiyor.

1 - Projeyi ayağa kaldrmak için Terminalinizden (command prompt) projeyi indirdiğiniz klasöre gitmeniz gerekiyor.
örneğin projeniz desktop/projeler klasöründe ise "cd Desktop/Projeler/okey101" yazarak ulaşabilirsiniz.

2- Projeyi ilk defa açarken terminalden  "cd Desktop/Projeler/okey101" altındaki vagrant klasörüne girip Windows'ta iseniz "init.bat"
Unix'te iseniz "bash init.sh" yazıp enter'a basın. Bu sizin için vagrant klasörü altında homestead.yaml dosyası oluşturacaktır

3- Homestead.yaml dosyasını şu şekilde düzenleyin

        ip: "192.168.10.10"
        memory: 2048
        cpus: 1
        provider: virtualbox

        authorize: ~/.ssh/id_rsa.pub

        keys:
            - ~/.ssh/id_rsa

        folders:
            - map: ../
              to: /home/vagrant/okey101

        sites:
            - map: homestead.app
              to: /home/vagrant/okey101/public

        databases:
            - okey

4 - homestead dosyasını düzenledikten sonra vagrant klasörünün altındaki "after.sh" dosyasını açın ve aşağıdaki gibi düzenleyin

        cd okey101
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

5 - Bu işlemlerden sonra terminalden  "cd Desktop/Projeler/okey101/vagrant" klasörüne gidip "vagrant up" yazarak projeyi çalıştırabilirsiniz.
6. Browserınızın url barına "192.168.10.10" yazarak siteye ulaşabilirsiniz.

7 - Siteyi açtıktan sonra öncelikle sağ üstten Kayıt ol'a basın, Herhangi bir sahte email adresi ile hesap açmanız yeterli olacaktır.
8 - Kayıt olduktan sonra Karşınıza Yeni Eşli Maç Oluşturma tablosu çıkacak, Gerekli inpuları doldurup maçı başlatın
9 - Maçı başlata bastıktan sonra önünüze çıkan tabloda Puan girme ve not yazma inputları göreceksiniz. Not kısmı Oyunun o Eliyle ilgili herhangi bir detayını akılda tutmak için kullanılabilir.
    Puan kısmına kullanıcının o el elde ettiği puani girin. Ek özellikler butonuna tıkladığınızda açılan akordiyon menüde 2 tane input göreceksiniz ceza kısmına oyuncunun o el yaptığı hata sayısını girin.
    Oyuncu çifte gidiyor ise, "çifte gidiyor" kutucuğuna tıklayabilirsiniz. İşleminiz bittikten sonra Tablonun sağ alt kısmında Güncelle butonuna basarak işlemi tamamlayabilirsiniz.
10 - Oyunculara puan girişi yaptıktan sonra hatalı işlem yaptığınızı düşünüyorsanız, oyuncunun adına tıklayarak oyuncunun geçmiş puanlar listesine erişebilir ve geçmiş puanlarında değişiklik yapabilirsiniz.
11 - Maçı bitirmek istediğinizde sol alttan maçı bitir tuşuna basabilirsiniz. Bitirilen maçlar üzerinde herhangi bir düzenleme uygulanamaz.