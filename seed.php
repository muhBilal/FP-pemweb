<?php
require_once __DIR__ . '/config/connection.php';

function seedUsers($conn) {
    $users = [
        ['username' => 'John Doe', 'email' => 'john@example.com', 'password' => md5('password'), 'role' => 'admin'],
        ['username' => 'Jane Doe', 'email' => 'jane@example.com', 'password' => md5('password'), 'role' => 'visitor'],
        ['username' => 'Alice Smith', 'email' => 'alice@example.com', 'password' => md5('password'), 'role' => 'visitor'],
    ];

    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach ($users as $user) {
        $stmt->bind_param('ssss', $user['username'], $user['email'], $user['password'], $user['role']);
        $stmt->execute();
    }

    $stmt->close();
    echo "Users table seeded successfully.\n";
}

function seedTariDaerah($conn) {
    $tari_daerah = [
        ['name' => 'Tari Reog Ponorogo', 'description' => 'Tari Reog Ponorogo adalah salah satu kesenian tradisional yang paling terkenal di Jawa Timur. Tarian ini berasal dari Ponorogo dan memiliki elemen tari, musik, dan seni bela diri. Tari Reog Ponorogo ditampilkan dalam bentuk pertunjukan yang melibatkan topeng besar dan ornamen-ornamen yang menggambarkan singa atau harimau, serta burung merak. Pertunjukan ini biasanya diiringi oleh musik gamelan dan dibawakan oleh para penari pria yang memainkan peran sebagai tokoh-tokoh seperti Raja Singa dan Warok.', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252881.1715582226!2d111.3646053099395!3d-7.971198946583241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e790b859cfee851%3A0x3027a76e352bea0!2sKabupaten%20Ponorogo%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716126726763!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/no1xmv-9bIU?si=rFTE32nwASSilkfA', 'image_url' => '/public/images/upload/tari-daerah/reog.jpeg'],
        ['name' => 'Tari Remo', 'description' => 'Tari Remo adalah tarian selamat datang yang biasanya ditampilkan untuk menyambut tamu kehormatan. Gerakan tarian ini penuh semangat dan enerjik, sering kali menampilkan gerakan kaki yang dinamis serta kostum yang khas dengan ikat kepala dan selendang.', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126647.96915575222!2d112.69551764809486!3d-7.269374281096594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf93cf2de6b%3A0x3b952696d53fda55!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716126450080!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/wYsXgoqHQOs?si=A-w4payjcnY6QpR7', 'image_url' => '/public/images/upload/tari-daerah/remo.jpg'],
        ['name' => 'Tari Gandrung', 'description' => 'Tari Gandrung adalah tarian tradisional yang erat kaitannya dengan rasa syukur masyarakat Banyuwangi setelah panen. Tarian ini ditampilkan oleh penari perempuan dengan gerakan yang anggun dan diiringi musik gamelan khas Banyuwangi.
        ', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31590.872579122308!2d114.34555120789719!3d-8.216924476182378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd15aeb98f842ab%3A0x4027a76e3530a90!2sBanyuwangi%2C%20Kec.%20Banyuwangi%2C%20Kabupaten%20Banyuwangi%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716127185200!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/qELvlYwVUOo?si=9KjX19-kQhzhyFf1', 'image_url' => '/public/images/upload/tari-daerah/gandrung.jpeg'],
    ];

    $sql = "INSERT INTO tari_daerah (name, description, maps, youtube_url, image_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach ($tari_daerah as $item) {
        $stmt->bind_param('sssss', $item['name'], $item['email'], $item['maps'], $item['youtube_url'], $item['image_url']);
        $stmt->execute();
    }

    $stmt->close();
    echo "Tari Daerah table seeded successfully.\n";
}

function seedMakananDaerah($conn) {
    $makanan_daerah = [
        ['name' => 'Lontong Balap', 'description' => 'Lontong Balap adalah salah satu makanan khas Surabaya yang terkenal dengan cita rasa yang lezat. Hidangan ini terdiri dari lontong yang disajikan dengan tauge, tahu goreng, lentho (sejenis camilan yang terbuat dari kacang hijau dan kelapa parut), dan kuah kacang. Biasanya, Lontong Balap juga disertai dengan sambal petis dan kecap manis untuk menambah cita rasa. Hidangan ini sering dinikmati sebagai sarapan atau makan siang oleh masyarakat Surabaya.', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126647.96915575222!2d112.69551764809486!3d-7.269374281096594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf93cf2de6b%3A0x3b952696d53fda55!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716126450080!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/vhb2b32-cf0?si=Y23GmJ5k_AOY_Ws1', 'image_url' => '/public/images/upload/makanan-daerah/6668d865e2995_1718147173.jpg'],
        ['name' => 'Rawon', 'description' => 'Rawon adalah sup daging sapi khas Jawa Timur yang memiliki kuah hitam pekat. Warna hitam ini berasal dari kluwek, sejenis rempah yang memberikan rasa dan aroma khas. Rawon biasanya disajikan dengan nasi, tauge, telur asin, dan sambal.', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63220.429729548254!2d112.62079576216618!3d-7.9703132449951415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62822063dc2fb%3A0x78879446481a4da2!2sMalang%2C%20Kota%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716126520655!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/kMJDI4z7G6s?si=zcPrlYYQZ9dLC9K7', 'image_url' => '/public/images/upload/makanan-daerah/6668d87672125_1718147190.jpg'],
        ['name' => 'Rujak Cingur', 'description' => 'Rujak Cingur adalah makanan khas Surabaya yang terdiri dari irisan mulut sapi (cingur), sayuran segar, dan buah-buahan seperti bengkoang, mangga muda, dan nanas. Semua bahan ini dicampur dengan bumbu rujak yang terbuat dari petis udang, kacang tanah, dan gula merah.
        ', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126647.96915575222!2d112.69551764809486!3d-7.269374281096594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf93cf2de6b%3A0x3b952696d53fda55!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716126450080!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/JTw8T-vY6O4?si=Eej_UDozpqARNG__', 'image_url' => '/public/images/upload/makanan-daerah/6668d887bcb47_1718147207.jpeg'],
    ];

    $sql = "INSERT INTO makanan_daerah (name, description, maps, youtube_url, image_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach ($makanan_daerah as $item) {
        $stmt->bind_param('sssss', $item['name'], $item['email'], $item['maps'], $item['youtube_url'], $item['image_url']);
        $stmt->execute();
    }

    $stmt->close();
    echo "Makanan Daerah table seeded successfully.\n";
}

function seedPakaianDaerah($conn) {
    $pakaian_adat = [
        ['name' => 'Pakaian Adat Madura', 'description' => 'Pakaian adat Madura memiliki ciri khas yang unik dan menonjolkan budaya masyarakat Madura. Pakaian adat ini terdiri dari baju, celana, dan aksesoris khusus yang digunakan oleh pria dan wanita Madura. Pakaian adat Madura menggambarkan identitas budaya masyarakat Madura yang kaya akan tradisi dan keunikan. Pakaian ini biasanya dikenakan dalam acara-acara khusus, seperti pernikahan, upacara adat, dan festival budaya.', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506826.23490492464!2d113.06943527118403!3d-7.05853964941809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9d3445c8704d1%3A0x5a2751be1dfcce84!2sPulau%20Madura!5e0!3m2!1sid!2sid!4v1715374364821!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/Tsmh115SF8g?si=AcOpmWCmdsQRGKfm', 'image_url' => '/public/images/upload/pakaian-adat/6668d6a74ddae_1718146727.jpeg'],
        ['name' => 'Kebaya Jawa Timur', 'description' => 'Kebaya Jawa Timur memiliki desain yang elegan dengan bordiran dan payet yang indah. Kebaya ini biasanya dipadukan dengan kain batik khas Jawa Timur, seperti batik tulis dengan motif lokal.', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1640672.6503511865!2d111.73898314283504!3d-7.848617451933611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da393f79feeb5c5%3A0x1030bfbca7cb850!2sJawa%20Timur!5e0!3m2!1sid!2sid!4v1716128853328!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/xFVNkXc4yso?si=L82OR5BDRxR_12ZB', 'image_url' => '/public/images/upload/pakaian-adat/6668d68ad1f7c_1718146698.jpg'],
        ['name' => 'Lurik Jawa Timur', 'description' => 'Pakaian adat lurik adalah salah satu pakaian tradisional khas dari Jawa, termasuk Jawa Timur. Lurik merupakan kain tenun dengan motif garis-garis yang sederhana namun elegan, dan biasanya terbuat dari bahan katun. Pakaian ini memiliki makna filosofis yang mendalam, menggambarkan kesederhanaan, ketekunan, dan kerendahan hati.', 'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1640672.6503511865!2d111.73898314283504!3d-7.848617451933611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da393f79feeb5c5%3A0x1030bfbca7cb850!2sJawa%20Timur!5e0!3m2!1sid!2sid!4v1716128853328!5m2!1sid!2sid', 'youtube_url' => 'https://www.youtube.com/embed/12AuGEE--h8?si=PzHIUpRBH0G-Y6Wf', 'image_url' => '/public/images/upload/pakaian-adat/6668d59f8c003_1718146463.jpeg'],
    ];

    $sql = "INSERT INTO pakaian_adat (name, description, maps, youtube_url, image_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach ($pakaian_adat as $item) {
        $stmt->bind_param('sssss', $item['name'], $item['email'], $item['maps'], $item['youtube_url'], $item['image_url']);
        $stmt->execute();
    }

    $stmt->close();
    echo "Pakaian Adat table seeded successfully.\n";
}

seedUsers($conn);
seedTariDaerah($conn);
seedPakaianDaerah($conn);
seedMakananDaerah($conn);

$conn->close();
?>