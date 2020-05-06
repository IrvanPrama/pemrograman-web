<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ketahui Usia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div style="border-radius: 12px; border: solid 2px grey;" class="card-body pt-1 mx-auto mt-4 col-lg-6">
                <div class="body-header h4 text-center my-4">FORM INPUT</div>
                <div class="mx-auto">
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <label for="ndepan">Nama Depan</label>
                            <input type="text" class="form-control" name="ndepan" id="ndepan" aria-describedby="ndepan" placeholder="Masukan nama depan ">
                        </div>
                        <div class="form-group">
                            <label for="nbelakang">Nama Belakang</label>
                            <input type="text" class="form-control" name="nbelakang" id="nbelakang" placeholder="Nama belakang">
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="number" class="form-control" name="nim" id="nim" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="tlahir">Tanggal Lahir</label>
                            <input value="" type="date" class="form-control" name="tlahir" id="tlahir" placeholder="Tanggal lahir">
                        </div>
                        <div class="form-group">
                            <label for="tmptlahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmptlahir" id="tmptlahir" placeholder="Tempat lahir">
                        </div>
                        <div class="form-group">
                            <label for="tmptlahir">Umur</label>
                            <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur">
                        </div>
                        <div class="form-group">
                            <label for="hobi">Hobby</label>
                            <input type="text" class="form-control" name="hobi" id="hobi" placeholder="Hobby">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan">
                        </div>
                        <button type="submit" name="submit" class="btn-success btn mx-auto my-1 font-weight-bold">Proses</button>
                    </form>
                </div>
            </div>

            <?php if (isset($_POST["submit"])) : ?>
                <div style="border-radius: 12px; border: solid 2px grey; height: 500px;" class="col-lg-6 col-lg-6 card-body px-4 mx-auto mt-4">
                    <div class="body-header h4 text-center my-4">FORM INPUT</div>
                    <div class="row">
                        <div class="col-md-6 mx-auto ml-0 my-2">
                            <div class="col-md-6">
                                <div class="row pb-0 mb-2">
                                    <div for="nbelakang">Nama Lengkap</div>
                                </div>
                                <div class="row pb-0 mb-2">
                                    <div for="nbelakang">NIM</div>
                                </div>
                                <div class="row pb-0 mb-2">
                                    <div for="nbelakang">Tanggal Lahir</div>
                                </div>
                                <div class="row pb-0 mb-2">
                                    <div for="nbelakang">Umur</div>
                                </div>
                                <div class="row pb-0 mb-2">
                                    <div for="nbelakang">Usia Tergolong</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row pb-0 mb-2">
                                <div class="border-bottom mx-2">: <?= $_POST["ndepan"] . " " . $_POST["nbelakang"]; ?></div>
                            </div>
                            <div class="row pb-0 mb-2">
                                <div class="border-bottom mx-2">: <?= $_POST["nim"]; ?></div>
                            </div>
                            <div class="row pb-0 mb-2">
                                <div class="border-bottom mx-2">: <?= $_POST["tlahir"]; ?></div>
                            </div>
                            <div class="row pb-0 mb-2">
                                <div class="border-bottom mx-2">: <?= $_POST["umur"]; ?></div>
                            </div>
                            <div class="row pb-0 mb-2">
                                <div class="border-bottom mx-2">:
                                    <?php if ($_POST["umur"] == "") {
                                        echo " ";
                                    } elseif ($_POST["umur"] <= 10) {
                                        echo "Anak-anak";
                                    } elseif ($_POST["umur"] <= 20) {
                                        echo "Remaja";
                                    } elseif ($_POST["umur"] <= 30) {
                                        echo "Dewasa";
                                    } else {
                                        echo "Tua";
                                    }
                                    ?></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    </div>
</body>

</html>