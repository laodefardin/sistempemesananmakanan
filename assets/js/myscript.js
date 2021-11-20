const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {
    Swal.fire(
        'Selamat Data...',
        'Berhasil di ' + flashData,
        'success'
    );
}

// tombol-hapus
$('.tombol-hapus').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

// tombol-hapus
$('.tombol-kembali').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Apakah benar buku ini sudah dikembalikan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, sudah dikembalikan!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

$('.tombol-perpanjang').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Apakah batas waktu peminjaman akan diperpanjang?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, perpanjang!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });

$('.tombol-hilang').on('click',
    function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Apakah benar buku telah hilang?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hilang!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });