<?php session_start(); ?>
<?php include 'header.php'; ?>
<style>
  .login-box,
  .register-box {
    margin: 2% auto;
  }

  main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }

  #reader {
    width: 600px;
    height: 100%;
  }

  #result {
    text-align: center;
    font-size: 1.5rem;
  }

  .login-box {
    width: 600px;
    height: 600px;
  }

  #attendance {
    height: 90%;
  }
</style>

<body class="hold-transition login-page">
  <div class="position-fixed d-flex ">
  <svg style="width: 25px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
      <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
    </svg>
    <a href="admin" class="">Login</a>
  </div>

  <button onclick="goBack()" class="button">
    <div class="button-box">
      <span class="button-elem">
        <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
          <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
        </svg>
      </span>
      <span class="button-elem">
        <svg viewBox="0 0 46 40">
          <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
        </svg>
      </span>
    </div>
  </button>

  <div class="login-box">
    <div class="login-logo">
      <p id="date"></p>
      <p id="time" class="bold"></p>
    </div>

    <div class="login-box-body">
      <h4 class="login-box-msg">Scan Employee Qrcode</h4>

      <form id="attendance">
        <select class="form-control mb-1" name="status">
          <option value="in">Time In</option>
          <option value="out">Time Out</option>
        </select>
        <main>
          <div id="reader"></div>
          <div id="result"></div>
        </main>
      </form>
    </div>

    <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
    <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>

  </div>


  <?php include 'scripts.php' ?>
  <script type="text/javascript">
    const scanner = new Html5QrcodeScanner('reader', {
      // Scanner will be initialized in DOM inside element with id of 'reader'
      qrbox: {
        width: 350,
        height: 350,
      }, // Sets dimensions of scanning box (set relative to reader element width)
      fps: 20, // Frames per second to attempt a scan
    });


    scanner.render(success, error);
    // Starts scanner

    function success(result) {

      document.getElementById('result').innerHTML = `
        <h2>Success!</h2>
        <p><a href="${result}">${result}</a></p>
        `;
      var selectElement = document.querySelector('select[name="status"]');
      var selectedValue = selectElement.value;
      var attendance = `status=${selectedValue}&employee=${result}`
      $.ajax({
        type: 'POST',
        url: 'attendance.php',
        data: attendance,
        dataType: 'json',
        success: function(response) {
          if (response.error) {
            $('.alert').hide();
            $('.alert-danger').show();
            $('.message').html(response.message);
            Notiflix.Notify.failure(response.message);
          } else {
            $('.alert').hide();
            $('.alert-success').show();
            $('.message').html(response.message);
            $('#employee').val('');
            Notiflix.Notify.success(response.message);
          }
        }
      });

      scanner.clear();
      // Clears scanning instance

      document.getElementById('reader').remove();
      // Removes reader element from DOM since no longer needed

    }

    function error(err) {
      // Notiflix.Notify.failure('Something Went Wrong Please try again');

    }


    $(function() {
      var interval = setInterval(function() {
        var momentNow = moment();
        $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
        $('#time').html(momentNow.format('hh:mm:ss A'));
      }, 100);

      $('#attendance').submit(function(e) {
        e.preventDefault();
        var attendance = $(this).serialize();
        console.log(attendance);

      });

    });
  </script>
</body>

</html>