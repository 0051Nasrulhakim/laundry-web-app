<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/public.css">

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- animate on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <div class="top-background"></div>
    <div class="section-title">
        <h1>Tracking Order</h1>
        <h3>Orange Laundry <i class="fas fa-cart-shopping"></i></h3>
    </div>
    <div class="form-input">
        <form method="post" id="statusOrder">
            <div class="grup">
                <div class="title">Masukkan Nomor Transaksi</div>
                <div class="input">
                    <input type="text" class="form-control" name="idTransaksi">
                </div>
                <div class="button">
                    <button class="btn btn-sm btn-primary">Lacak Status Order</button>
                </div>
            </div>
        </form>
    </div>
    <div class="detail-tracking">
        <div class="versi-logo">
            <div class="icon-diterima">
                <div class="logo"><i class="fa-solid fa-file-pen fa-4x"></i></div>
                <div class="text">Order Masuk</div>
            </div>
            <div class="icon-proses-cuci">
                <div class="logo"><i class="fa-solid fa-water fa-4x"></i></div>
                <div class="text">Proses Pencucian</div>
            </div>
            <div class="icon-proses-pengeringan">
                <div class="logo"><i class="fa-solid fa-wind fa-4x"></i></div>
                <div class="text">Pengeringan</div>
            </div>
            <div class="icon-proses-setrika">
                <div class="logo"><i class="fa-solid fa-shirt fa-4x"></i></div>
                <div class="text">Strika & Lipat</div>
            </div>
            <div class="icon-proses-selesai">
                <div class="logo"><i class="fa-regular fa-circle-check fa-4x"></i></div>
                <div class="text">Selesai</div>
            </div>
        </div>

        <div class="detail">
            <div class="list logo-diterima">
                <div class="logo"><i class="fa-solid fa-file-pen fa-2x"></i></div>
                <div class="deskripsi">
                    <div class="">Order Diterima</div>
                    <div class="semicolon">-</div>
                    <div class="tanggal1"></div>
                </div>
            </div>
            <div class="list logo-proses-cuci">
                <div class="logo"><i class="fa-solid fa-water fa-2x"></i></div>
                <div class="deskripsi">
                    <div class="">Proses Pencucian</div>
                    <div class="semicolon">-</div>
                    <div class="tanggal2"></div>
                </div>
            </div>
            <div class="list logo-proses-pengeringan">
                <div class="logo"><i class="fa-solid fa-wind fa-2x"></i></div>
                <div class="deskripsi">
                    <div class="">Proses Pengeringan</div>
                    <div class="semicolon">-</div>
                    <div class="tanggal3"></div>
                </div>
            </div>
            <div class="list logo-proses-setrika">
                <div class="logo"><i class="fa-solid fa-shirt fa-2x"></i></div>
                <div class="deskripsi">
                    <div class="">Proses Setrika & Lipat</div>
                    <div class="semicolon">-</div>
                    <div class="tanggal4"></div>
                </div>
            </div>
            <div class="list logo-proses-selesai">
                <div class="logo"><i class="fa-regular fa-circle-check fa-2x"></i></div>
                <div class="deskripsi">
                    <div class="">Proses Pencucian</div>
                    <div class="semicolon">-</div>
                    <div class="tanggal5"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us">
        <div class="title text-center mt-2">
            <h3>Aboute Us</h3>
        </div>
        <div class="section">
            <div class="left" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31686.78547043403!2d109.63517608285012!3d-6.908749985146793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7027bc2d5d1a21%3A0x99b98493a91994c3!2sOrange%20Laundry!5e0!3m2!1sen!2sid!4v1729434685003!5m2!1sen!2sid" width="304" height="298" style="border: 1px solid gray; border-radius: 7px; box-shadow: 0 3px 17px 0 rgba(0, 0, 0, 0.3);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="right">
                <div class="text" data-aos="fade-down">
                    Kami adalah penyedia layanan laundry yang berkomitmen untuk memberikan kebersihan dan
                    kenyamanan bagi pelanggan kami. Orange Laundry
                    telah menjadi pilihan utama bagi masyarakat pekalongan yang mencari layanan laundry berkualitas tinggi.
                </div>
                <div class="title">
                    Mengapa Pilih kami ?
                </div>
                <div class="text">
                    <ol>
                        <li data-aos="fade-left">
                            Kualitas Terjamin: Kami menggunakan deterjen berkualitas dan peralatan modern untuk
                            memastikan kebersihan maksimal.
                        </li>
                        <li data-aos="fade-left">
                            Staf Profesional: Tim kami terdiri dari profesional berpengalaman yang memahami
                            cara merawat berbagai jenis kain dengan baik
                        </li>
                        <li data-aos="fade-left">
                            Pelayanan Pelanggan: Kami percaya bahwa kepuasan pelanggan adalah yang terpenting.
                            Tim layanan pelanggan kami siap membantu Anda dengan segala pertanyaan dan kebutuhan Anda.
                        </li>
                        <li data-aos="fade-left">
                            Ramah Lingkungan: Kami berkomitmen untuk menggunakan produk ramah lingkungan yang aman bagi 
                            Anda dan lingkungan.
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <script>
        AOS.init();

        // $(document).ready(function() {
        //     $('.list').hide();
        // })
        function tampilkanProses(status, logoClass, tanggalClass, waktu) {
            $(logoClass).css('display', 'flex');

            // Memformat waktu menjadi format Indonesia (nama hari, nama bulan, DD, HH:MM:SS)
            const tanggalObjek = new Date(waktu);

            const opsiFormat = {
                weekday: 'long', // Nama hari
                year: 'numeric', // Tahun
                month: 'long', // Nama bulan
                day: '2-digit', // Tanggal
                hour: '2-digit', // Jam
                minute: '2-digit', // Menit
                second: '2-digit', // Detik
                hour12: false // Format 24 jam
            };

            const tanggalIndonesia = tanggalObjek.toLocaleString('id-ID', opsiFormat);

            $(tanggalClass).text(tanggalIndonesia);
        }

        $('#statusOrder').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('crud/cekStatusOrder') ?>',
                type: 'POST',
                data: $('#statusOrder').serialize(),
                success: function(response) {
                    // Respons dari server adalah array objek
                    // const data = JSON.parse(response); // Jika respons JSON, ubah menjadi objek JavaScript

                    // Sembunyikan semua elemen terlebih dahulu
                    $('.list').hide();

                    // Loop melalui data respons untuk menampilkan status yang sesuai
                    response.data.forEach(item => {
                        if (item.status === '1') {
                            tampilkanProses('1', '.logo-diterima', '.tanggal1', item.waktu);
                        }
                        if (item.status === '2') {
                            tampilkanProses('2', '.logo-proses-cuci', '.tanggal2', item.waktu);
                        }
                        if (item.status === '3') {
                            tampilkanProses('3', '.logo-proses-pengeringan', '.tanggal3', item.waktu);
                        }
                        if (item.status === '4') {
                            tampilkanProses('4', '.logo-proses-setrika', '.tanggal4', item.waktu);
                        }
                        if (item.status === '5') {
                            tampilkanProses('5', '.logo-proses-selesai', '.tanggal5', item.waktu);
                        }
                    });

                    if (response.max.status == 1) {
                        $('.icon-diterima').css('color', 'black');
                        // $('.icon-diterima').css('background-color', '2ecc71')
                        $('.icon-diterima').addClass('kedip')
                    } else if (response.max.status == 2) {
                        $('.icon-diterima').css({

                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-cuci').css({
                            'color': 'black',
                        });

                        $('.icon-proses-cuci').addClass('kedip')

                    } else if (response.max.status == 3) {
                        $('.icon-diterima').css({

                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-cuci').css({
                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-pengeringan').css({
                            'color': 'black',
                        });

                        $('.icon-proses-pengeringan').addClass('kedip')
                    } else if (response.max.status == 4) {
                        $('.icon-diterima').css({

                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-cuci').css({
                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-pengeringan').css({
                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-setrika').css({
                            'color': 'black',
                        });

                        $('.icon-proses-setrika').addClass('kedip')
                    } else if (response.max.status >= 5) {
                        $('.icon-diterima').css({

                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-cuci').css({
                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-pengeringan').css({
                            'color': 'black',
                            'background-color': '#2ecc71'
                        });

                        $('.icon-proses-setrika').css({
                            'color': 'black',
                            'background-color': '#2ecc71'
                        });
                        $('.icon-proses-selesai').css({
                            'color': 'black',
                        });
                        $('.icon-proses-selesai').addClass('kedip')
                    }
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>