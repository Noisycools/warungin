const swal = $('.swal').data('swal');
if(swal) {
    Swal.fire('Berhasil', swal , 'success')
}

$(document).on('click', '.btn-hapus', function(e) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang telah dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
             swal,
            'success'
          )
        }
      })
}) 