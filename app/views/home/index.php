<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Chat</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/fontawesome/css/all.min.css">
    <style>
        body {
            background-color: #212529;
            color: #fff;
        }

        .chat-container {
            max-width: 600px;
            height: 750px;
            border: 1px solid #444;
            border-radius: 8px;
            overflow-y: auto;
            background-color: #1e1e1e;
            padding: 10px;
            margin: 0 auto;
            scrollbar-width: thin;
            scrollbar-color: #333 #1e1e1e;
        }

        /* Untuk browser berbasis WebKit seperti Chrome dan Safari */
        .chat-container::-webkit-scrollbar {
            width: 8px;
        }

        .chat-container::-webkit-scrollbar-track {
            background: #1e1e1e;
            border-radius: 8px;
        }

        .chat-container::-webkit-scrollbar-thumb {
            background-color: #3ea6ff;
            border-radius: 8px;
        }

        .chat-container::-webkit-scrollbar-thumb:hover {
            background-color: #2b8ccd;
        }
        
        .chat-container {
            scroll-behavior: smooth;
        }

        .chat-bubble {
            padding: 10px;
            margin: 5px 0;
            border-radius: 8px;
            background-color: #333;
            display: flex;
            flex-direction: row;
        }

        .chat-bubble .username {
            font-weight: bold;
            font-size: 14px;
            color: #3ea6ff;
            margin-right: 0.5rem;
        }

        .chat-bubble .message {
            font-size: 13px;
            margin-top: 2px;
        }

        .chat-bubble img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-center align-items-center">  
        <img src="<?= BASEURL; ?>/public/img/qrcode.jpg" alt="" width="150px" height="150px">
    </div>
    <h1 class="text-white text-center">scan me</h1>
    <div class="chat-container" id="chatContainer">
        <!-- Chat akan diisi secara dinamis melalui JavaScript -->
    </div>
</div>

<script src="<?= BASEURL; ?>/public/js/jquery.min.js"></script>
<script>
    function isImage(filename) {
        // Fungsi untuk memeriksa apakah string adalah file gambar
        const validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const fileExtension = filename.split('.').pop().toLowerCase();
        return validExtensions.includes(fileExtension);
    }

    function loadChat() {
        $.ajax({
            url: '<?= BASEURL; ?>/home', // Panggil index di Home controller
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let chatContainer = $('#chatContainer');
                chatContainer.empty(); // Kosongkan chat container sebelum menambahkan data baru

                data.forEach(function (chat) {
                    let messageContent = `<div class="chat-bubble">
                                            <span class="username">${chat.nama}: </span>`;

                    // Cek apakah chat adalah gambar berdasarkan ekstensi file
                    if (isImage(chat.chat)) {
                        messageContent += `<img src="<?= BASEURL; ?>/public/img/${chat.chat}" alt="image" width="200px" height="200px">`;
                    } else {
                        // Jika bukan gambar, tampilkan sebagai teks biasa
                        messageContent += `<span class="message">${chat.chat}</span>`;
                    }

                    messageContent += `</div>`;
                    
                    chatContainer.append(messageContent);
                });

                // Scroll ke bawah otomatis saat chat baru masuk
                chatContainer.scrollTop(chatContainer[0].scrollHeight);
            },
            error: function () {
                console.error('Failed to load chat data.');
            }
        });
    }

    // Set interval untuk refresh chat setiap 3 detik
    setInterval(loadChat, 3000);

    // Load chat pertama kali saat halaman dibuka
    loadChat();
</script>

</body>
</html>
