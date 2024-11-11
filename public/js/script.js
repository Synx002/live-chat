// Mendapatkan elemen tombol dan section
const sendImageBtn = document.getElementById('sendImage');
const sendCommentBtn = document.getElementById('sendComment');
const uploadImageSection = document.getElementById('uploadImage');
const commentSection = document.getElementById('commentSection');
const sendMessageBtn = document.getElementById('sendMessage');

// Menyembunyikan kedua section dan tombol "Send Message" saat halaman pertama kali dimuat
uploadImageSection.style.display = 'none';
commentSection.style.display = 'none';
sendMessageBtn.style.display = 'none';

// Function untuk menampilkan tombol "Send Message" saat salah satu tombol diklik
function showSendMessageButton() {
    sendMessageBtn.style.display = 'block';
}

// Event listener untuk tombol "Send Image"
sendImageBtn.addEventListener('click', function() {
    uploadImageSection.style.display = 'block';
    commentSection.style.display = 'none';
    showSendMessageButton();
});

// Event listener untuk tombol "Send Comment"
sendCommentBtn.addEventListener('click', function() {
    commentSection.style.display = 'block';
    uploadImageSection.style.display = 'none';
    showSendMessageButton();
});

// Mendapatkan elemen tombol standby
const standbyButtons = document.querySelectorAll('.btn-standby');

// Event listener untuk tombol standby
standbyButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Ubah semua tombol kembali ke standby
        standbyButtons.forEach(btn => {
            btn.classList.remove('btn-active');
            btn.classList.add('btn-standby');
        });

        // Ubah tombol yang diklik menjadi active
        this.classList.remove('btn-standby');
        this.classList.add('btn-active');
    });
});


const cameraModal = document.getElementById('cameraModal');
const cameraStream = document.getElementById('cameraStream');
const cameraCanvas = document.getElementById('cameraCanvas');
const takePictureButton = document.getElementById('takePictureButton');
const savePictureButton = document.getElementById('savePictureButton');
let stream;

// Mengakses kamera saat modal terbuka
cameraModal.addEventListener('shown.bs.modal', async () => {
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        try {
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            cameraStream.srcObject = stream;
        } catch (error) {
            console.error("Error accessing camera: ", error);
        }
    } else {
        console.error("getUserMedia not supported");
    }
});

// Menangkap gambar dari kamera
takePictureButton.addEventListener('click', () => {
    const context = cameraCanvas.getContext('2d');
    cameraCanvas.width = cameraStream.videoWidth;
    cameraCanvas.height = cameraStream.videoHeight;
    context.drawImage(cameraStream, 0, 0, cameraCanvas.width, cameraCanvas.height);

    // Konversi canvas ke blob dan tambahkan ke input file
    canvasToBlob(cameraCanvas).then(blob => {
        const file = new File([blob], 'picture.png', { type: 'image/png' });
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);

        // Update input file dengan file yang baru
        document.getElementById('foto').files = dataTransfer.files;

        // Tampilkan nama file
        document.getElementById('selectedFileName2').textContent = file.name;
    });

    // Sembunyikan stream video, tampilkan canvas dan tombol simpan
    cameraStream.classList.add('hidden');
    cameraCanvas.classList.remove('hidden');
    takePictureButton.classList.add('hidden');
    savePictureButton.classList.remove('hidden');
});

// Fungsi untuk mengkonversi canvas ke blob
function canvasToBlob(canvas) {
    return new Promise(resolve => {
        canvas.toBlob(resolve, 'image/png');
    });
}


// Menutup kamera saat modal ditutup
cameraModal.addEventListener('hidden.bs.modal', () => {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    cameraStream.classList.remove('hidden');
    cameraCanvas.classList.add('hidden');
    takePictureButton.classList.remove('hidden');
    savePictureButton.classList.add('hidden');
});

function updateFileName(input) {
    var fileName = input.files[0].name;
    var label = document.getElementById('selectedFileName');
    label.innerText = fileName;
}
