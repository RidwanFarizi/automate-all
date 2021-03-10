<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Section Blog -->
<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Search</h1>
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan Keyword Pencarian.." name="cari" value="<?= $search; ?>">

                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </div>
                    <input type="hidden" name="bulan" value="<?= $bulan; ?>">
                    <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                </form>

                <form action="" method="get">
                    <input type="hidden" name="search" value="<?= $search; ?>">
                    <div class="input-group mb-3">
                        <select name="bulan">
                            <option value="" <?= $bulan == '' ? 'selected' : ''; ?>>Bulan</option>
                            <option value="01" <?= $bulan == '01' ? 'selected' : ''; ?>>Januari</option>
                            <option value="02" <?= $bulan == '02' ? 'selected' : ''; ?>>Februari</option>
                            <option value="03" <?= $bulan == '03' ? 'selected' : ''; ?>>Maret</option>
                            <option value="04" <?= $bulan == '04' ? 'selected' : ''; ?>>April</option>
                            <option value="05" <?= $bulan == '05' ? 'selected' : ''; ?>>Mei</option>
                            <option value="06" <?= $bulan == '06' ? 'selected' : ''; ?>>Juni</option>
                            <option value="07" <?= $bulan == '07' ? 'selected' : ''; ?>>Juli</option>
                            <option value="08" <?= $bulan == '08' ? 'selected' : ''; ?>>Agustus</option>
                            <option value="09" <?= $bulan == '09' ? 'selected' : ''; ?>>September</option>
                            <option value="10" <?= $bulan == '10' ? 'selected' : ''; ?>>Oktober</option>
                            <option value="11" <?= $bulan == '11' ? 'selected' : ''; ?>>November</option>
                            <option value="12" <?= $bulan == '12' ? 'selected' : ''; ?>>Desember</option>
                        </select>

                        <select name="tahun">
                            <option value="" <?= $tahun == '' ? 'selected' : ''; ?>>Tahun</option>
                            <option value="2015" <?= $tahun == '2015' ? 'selected' : ''; ?>>2015</option>
                            <option value="2016" <?= $tahun == '2016' ? 'selected' : ''; ?>>2016</option>
                            <option value="2017" <?= $tahun == '2017' ? 'selected' : ''; ?>>2017</option>
                            <option value="2018" <?= $tahun == '2018' ? 'selected' : ''; ?>>2018</option>
                            <option value="2019" <?= $tahun == '2019' ? 'selected' : ''; ?>>2019</option>
                            <option value="2020" <?= $tahun == '2020' ? 'selected' : ''; ?>>2020</option>
                            <option value="2021" <?= $tahun == '2021' ? 'selected' : ''; ?>>2021</option>
                            <option value="2022" <?= $tahun == '2022' ? 'selected' : ''; ?>>2022</option>
                            <option value="2023" <?= $tahun == '2023' ? 'selected' : ''; ?>>2023</option>
                            <option value="2024" <?= $tahun == '2024' ? 'selected' : ''; ?>>2024</option>
                            <option value="2025" <?= $tahun == '2025' ? 'selected' : ''; ?>>2025</option>
                            <option value="2026" <?= $tahun == '2026' ? 'selected' : ''; ?>>2026</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Filter</button>
                        </div>
                    </div>
                </form>

            </div>

            <?php if ($data) : ?>
                <div class="row justify-content-around">
                    <div class="col-10 col-sm-12 col-md-11 col-lg-5 col-xl-6">
                        <img src="<?= $data[0]['img'] ?>" class="img-fluid" alt="webinar" data-sal="slide-right" data-sal-easing="ease-in-sine" data-sal-duration="1000">
                        <h1 data-sal="slide-right" data-sal-easing="ease-in-sine" data-sal-duration="1000"><?= $data[0]['judul'] ?></h1>
                        <p class="text-justify" data-sal="slide-right" data-sal-duration="1000">
                            <?php if (strlen($data[0]['isi']) > 700) echo (substr_replace($data[0]['isi'], '...', 700));
                            else echo ($data[0]['isi']) ?>
                            <br>
                            <a class="small-link" style="font-size:18px;" href="<?= base_url('/blog/detail?id=' . $data[0]['id']); ?>">
                                View in detail.
                            </a>
                            <span class="date text-right"><?= $data[0]['tanggalUpload'] ?></span>
                        </p>
                    </div>
                    <div class="col-10 col-sm-12 col-md-11 col-lg-7 col-xl-6">
                        <div class="row text-left">
                            <?php if (count($data) > 4) {
                                $max = 5;
                            } else {
                                $max = count($data);
                            } ?>
                            <?php for ($i = 1; $i < $max; $i++) : ?>
                                <div class="col-md-6" data-sal="slide-left" data-sal-easing="ease-in-sine" data-sal-duration="1000">
                                    <img src="<?= $data[$i]['img'] ?>" class="img-fluid" alt="event">
                                    <h4><?= $data[$i]['judul'] ?></h4>
                                    <p class="smaller-p text-justify">
                                        <?php if (strlen($data[$i]['isi']) > 200) echo (substr_replace($data[$i]['isi'], '...', 200));
                                        else echo ($data[0]['isi']) ?>
                                        <br>
                                        <a class="small-link" href="<?= base_url('/blog/detail?id=' . $data[$i]['id']); ?>">View in detail.</a>
                                        <span class="date text-right"><?= $data[$i]['tanggalUpload'] ?></span>
                                    </p>
                                </div>
                            <?php endfor ?>
                        </div>
                        <?php if ($max > 4) : ?>
                            <div class="row" style="margin-top: 1.5rem;">
                                <div class="col text-center">
                                    <a class="big-link" href="<?= base_url('/blog/all'); ?>">View all Articles</a>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="row justify-content-around">
                    <div>Gaada</div>
                </div>
            <?php endif; ?>
        </div>
</section>
<!-- Akhir Section Blog -->


<?= $this->endSection(); ?>