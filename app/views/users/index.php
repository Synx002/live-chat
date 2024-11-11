<div class="container mt-5">
    <div class="content" width="100%" height="100vh">
        <div class="img-container d-flex justify-content-center">
            <img src="https://saweria.co/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fhomepage_characters.a1cf6cc4.svg&w=3840&q=75" alt="hero-image" width="300px">
        </div>
        <h1 class="text-white text-center py-3">"Ayo, sapa kami dan mulai interaksi!"</h1>
        <div class="row">
            <div class="col-lg-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <hr style="color: white;">
        <div class="row text-center">
            <div class="col-lg-6 col-sm-6 mb-3 mb-lg-0">
                <div id="sendImage" class="btn btn-block btn-standby">
                    <span>
                        <i class="fa fa-camera"></i>
                        <br>
                        Send Image
                    </span>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 mb-3 mb-lg-0">
                <div id="sendComment" class="btn btn-block btn-standby">
                    <span>
                        <i class="fa fa-comment"></i>
                        <br>
                        Send Comment
                    </span>
                </div>
            </div>
        </div>
        <hr style="color: white;">
        <form action="<?= BASEURL; ?>/chat/tambah/" method="post">
        <input type="hidden" name="user_id" value="<?= $id ?>">
            <div class="row text-center my-3">
                <div class="col-lg-12">
                    <div id="uploadImage" class="hidden">
                        <div class="button-container">
                            <button type="button" class="btn btn-block" data-bs-toggle="modal" data-bs-target="#modalsendpict">
                                <span>
                                    <i class="fa fa-camera"></i>    
                                    &nbsp;Select Image
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="commentSection" class="hidden">
                        <textarea type="text" id="chat" name="chat" class="form-control" rows="4" placeholder="Type your comment..."></textarea>
                        <button type="submit" id="sendMessage" class="btn btn-block btn-act mt-3">
                            <span>
                                <i class="fa-solid fa-paper-plane"></i> 
                                &nbsp;Send Message
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
    </div>
</div>

<!-- Modal untuk Upload Image (Sudah Ada) -->
<div class="modal fade" id="modalsendpict" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Image</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row p-4">
                <div class="col-lg-6 col-sm-6 d-flex justify-content-center align-items-center">
                    <div id="cameraModalButton" class="btn btn-block btn-modal" data-bs-toggle="modal" data-bs-target="#cameraModal">
                        <span>
                            <i class="fa-solid fa-camera"></i>
                            &nbsp;Camera
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 d-flex justify-content-center align-items-center">
                    <div id="galleryModalButton" class="btn btn-block btn-modal" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <span>
                            <i class="fa-solid fa-image"></i>
                            &nbsp;Gallery
                        </span>
                    </label>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal Baru untuk Kamera -->
<div class="modal fade" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= BASEURL; ?>/chat/tambahGambar/" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cameraModalLabel">Take a Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <video id="cameraStream" autoplay></video>
                <canvas id="cameraCanvas" class="hidden"></canvas>
                <button type="button" id="takePictureButton" class="btn btn-primary mt-3">Take Picture</button>
            </div>
            <div class="modal-footer">
                <!-- Elemen input file untuk gambar -->
                <input type="hidden" name="user_id" value="<?= $id ?>">
                <input type="file" id="foto" name="gambar" class="hidden">
                <label for="foto" id="selectedFileName2" class="btn btn-success hidden">No file chosen</label>
                <button type="submit" class="btn btn-success hidden" id="savePictureButton">Send</button>
            </div>
        </div>
    </form>
  </div>
</div>



<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= BASEURL; ?>/chat/tambahGambar/" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">    
                <h5 class="modal-title" id="galleryModalLabel">Choose File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <input type="hidden" name="user_id" value="<?= $id ?>">
                <input type="file" id="gambar" name="gambar" onchange="updateFileName(this)">
                <label for="gambar" class="btn btn-modal" id="selectedFileName">
                    <span>
                        <i class="fa-solid fa-image"></i>
                        &nbsp;Choose File
                    </span>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Send</button>
            </div>
        </div>
    </form>
  </div>
</div>
