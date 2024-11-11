<div class="container">
    <h1 class="text-white text-center mb-5">Data Chat</h1>
    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <table class="table table-dark table-bordered align-items-center justify-content-center text-center w-100" id="example">
        <thead class="thead-dark">
            <tr>
                <th style="vertical-align: middle; text-align: center;">No</th>
                <th style="vertical-align: middle; text-align: center;">Chat Id</th>
                <th style="vertical-align: middle; text-align: center;">Chat</th>
                <th style="vertical-align: middle; text-align: center;">User Id</th>
                <th style="vertical-align: middle; text-align: center;">Nama</th>
                <th style="vertical-align: middle; text-align: center;">Hapus</th> <!-- Tambahkan rowspan untuk kolom hapus -->
            </tr>
        </thead>
        <tbody class="text-center">
        <?php 
        $no = 0;
            foreach($data['chat'] as $chat):
                $no++;
        ?>
        <tr>
            <td style="text-align: center;"><?= $no; ?></td>
            <td style="vertical-align: middle; text-align: center;"><?= $chat['id']; ?></td>
            <td style="vertical-align: middle; text-align: center;"><?= $chat['chat']; ?></td>
            <td style="vertical-align: middle; text-align: center;"><?= $chat['user_id']; ?></td>
            <td style="vertical-align: middle; text-align: center;"><?= $chat['nama']; ?></td>
            <td style="vertical-align: middle; text-align: center;"><a href="<?= BASEURL; ?>/chat/hapus/<?= $chat['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" style="color: #D2042D;"></i></a></td>
        </tr>
        <?php endforeach?>
        </tbody>
    </table>


</div>
