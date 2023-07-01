const flashDataSucces = $('.flash-data').data('flashdatasucces');
const flashDataInfo = $('.flash-data').data('flashdatainfo');
const flashDataDelete = $('.flash-data').data('flashdatadelete');
const flashDataError = $('.flash-data').data('flashdataerror');

if (flashDataSucces) {
				Swal.fire({
								icon: 'success',
								position: 'top-end',
								timer: 2500,
								hideClass: {
												popup: 'animate__animated animate__slideOutRight'
								},
								text: flashDataSucces
				});
}

if (flashDataInfo) {
				Swal.fire({
								icon: 'info',
								text: flashDataInfo
				});
}

if (flashDataDelete) {
				Swal.fire({
								icon: 'success',
								text: flashDataDelete

				});
}

if (flashDataError) {
				Swal.fire({
								icon: 'error',
								text: flashDataError

				});
}

//Delete
$('body').on('click', 'td .tombol-verifikasi', function(e) {

				e.preventDefault();
				const href = $(this).attr('href');
				const verificationMessage = $('.tombol-verifikasi').data('verificationmessage');

				Swal.fire({
								title: 'Yakin ingin hapus Data?',
								text: "Aksi ini tidak dapat dibatalkan!",
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#d33',
								cancelButtonColor: '#3085d6',
								confirmButtonText: 'Hapus Data!',
								cancelButtonText: 'Batal',
								showClass: {
												popup: 'animate__animated animate__bounce'
								},
								hideClass: {
												popup: 'animate__animated animate__flipOutY'
								}
				}).then((result) => {
								if (result.value) {
												document.location.href = href;
								}
				})

});