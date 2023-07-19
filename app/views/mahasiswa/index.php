<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php
            Flasher::flash();
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-outline-primary" type="submit" id="cari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php
                foreach ($data['mhs'] as $v) {
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                    echo $v['nama'];
                    echo "<div>";
                    echo "<a href='" . BASEURL . "/mahasiswa/detail/" . $v['id'] . "' class='text-decoration-none badge text-bg-primary me-2'>detail</a>";
                    echo "<a href='" . BASEURL . "/mahasiswa/edit/" . $v['id'] . "' class='text-decoration-none badge text-bg-warning me-2 tampilModalUbah' data-bs-toggle='modal' data-bs-target='#formModal' data-id='" . $v['id'] . "'>edit</a>";
                    echo "<a href='" . BASEURL . "/mahasiswa/hapus/" . $v['id'] . "' class='text-decoration-none badge text-bg-danger del'>hapus</a>";
                    echo "</div>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="forModalLabel">Tambah Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column gap-3">
                        <div>
                            <label for="npm" class="form-label">NPM</label>
                            <input type="number" name="npm" id="npm" class="form-control">
                        </div>
                        <div>
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div>
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" name="prodi" id="prodi" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>