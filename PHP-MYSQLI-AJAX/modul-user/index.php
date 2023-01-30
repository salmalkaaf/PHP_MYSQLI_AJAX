<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <title>Login Akun</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <label>LOGIN</label>
              <hr>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>

                <div class="form-group">
                  <label>Photo</label>
                  <input type="file" name="image" class="form-control" id="image" placeholder="Masukkan Foto">
                </div>
               
                <button class="btn btn-login1 btn-block btn-success">LOGIN</button>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Belum punya akun? <a href="register.php">Silahkan Register</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {

        $(".btn-login1").click( function() {
        
          var username = $("#username").val();
          var password = $("#password").val();
          var image = $("#image").val();

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } 
          else if(image.length == "") {

          Swal.fire({
            type: 'warning',
            title: 'Oops...',
            text: 'Foto Wajib Diisi !'
          });

          } else {

            $.ajax({

              url: "cek-login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password,
                  "image": image
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "dashboard.php";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        });

      });
    </script>

  </body>
</html>