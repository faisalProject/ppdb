    <footer>
      <div class="footer-contents">
        <div class="container">
          <div class="box">
            <img src="images/smanda.png" alt="">
            <p>Jl. Manunggal  VII Palumbonsari Karawang Timur Kode Pos: 41351</p>
            <div class="med-soc">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-twitter"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
            </div>
          </div>
          <div class="box">
            <h5>Hubungi Kami</h5>
            <p>Phone: (+62) 555 1212</p>
            <p>Mobile: (+62) 555 0100</p>
            <p>Fax: (+62) 555 0100</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="main.js"></script>
    <script type="text/javascript">
      var deleteFile = (id) => {
        Swal.fire({
            title: 'Apakah kamu yakin?',
            html: '<p>Ingin menghapus file ini!</p>',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then(( result ) => {
            if ( result.isConfirmed ) {
                window.location.href = 'delete_file.php?id=' + id;
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    html: '<p>File behasil dihapus!</p>',
                    showConfirmButton: false,
                    timer: 2000
                })
            } else {
                Swal.fire('Batal', 'Tidak jadi menghapus file', 'info');
            }
        })
      }
    </script>
  </body>
</html>