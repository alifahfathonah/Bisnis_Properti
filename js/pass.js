// Proses Validasi Password  
   $(document).ready(function() {
      $('#frm-mhs').validate({
        rules: {
          pass2: {
            equalTo: "#pass1"
          }
        },
        messages: {
          pass2: {
            equalTo: "<p>Password yang Anda Masukan Tidak Sama</p>"
          }
        }
      });
    });

// Proses Show Password
var input = document.getElementById('pswd2'),
    icon = document.getElementById('icon');

   icon.onclick = function () {

     if(input.className == 'active') {
        input.setAttribute('type', 'text');
        icon.className = 'fa fa-eye';
       input.className = '';

     } else {
        input.setAttribute('type', 'password');
        icon.className = 'fa fa-eye-slash';
       input.className = 'active';
    }

   }