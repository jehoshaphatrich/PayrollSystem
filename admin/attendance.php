<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>
    <style>
      .qrcode {
        cursor: pointer;
      }

      .qrcode img:hover {
        scale: 1.3;
        transition: all ease-in-out 300ms;
      }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Attendance
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Attendance</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" style="font-size: 19px;" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                <a href="#scan" id="scanBtn" style="font-size: 19px;" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><svg fill="#fff"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width:15px" version="1.1" x="0px" y="0px" xml:space="preserve" viewBox="5 5 54 54">
                    <g>
                      <g>
                        <g>
                          <path d="M10.7,12v11.7h11.7V12H10.7z M19.4,20.7h-5.7v-5.7h5.7V20.7z" />
                          <path d="M41.6,12v11.7h11.7V12H41.6z M50.3,20.7h-5.7v-5.7h5.7V20.7z" />
                          <path d="M10.7,40.3V52h11.7V40.3H10.7z M19.4,49.1h-5.7v-5.7h5.7V49.1z" />
                        </g>
                        <g>
                          <path d="M28.5,45.3c0-0.8,0.1-1.6,0-2.4c0-0.7,0.2-0.9,0.9-0.9c0.8,0.1,1.6,0,2.6,0c0-1.3,0-2.6,0-3.8c0-0.9-0.3-2.1,0.2-2.6     c0.5-0.5,1.8-0.2,2.7-0.2c0.2,0,0.4,0,0.6,0l0,0c0,1.1,0,2.2,0,3.4c2.5,0,4.8,0,7.2,0l0,0c0,1.1,0,2.2,0,3.3c1.3,0,2.4,0,3.6,0     l0,0c0,1.1,0,2.1,0,3.3c-1.1,0-2.2,0-3.4,0c0,2.3,0,4.4,0,6.6c-1.2,0-2.3,0-3.5,0c0-1,0-2.1,0-3.3c-2.5,0-4.9,0-7.2,0l0,0     c0-1.1,0-2.1,0-3.4C30.7,45.3,29.6,45.3,28.5,45.3L28.5,45.3z M39.1,45.3c0-1.2,0-2.2,0-3.3c-1,0-1.9,0-2.8,0     c-0.2,0-0.6,0.4-0.6,0.6c-0.1,0.9,0,1.8,0,2.7C36.8,45.3,37.9,45.3,39.1,45.3z" />
                          <path d="M35.6,35.3c0-0.8,0.1-1.5,0-2.3c0-0.8,0.2-1.1,1-1c0.8,0.1,1.6,0,2.5,0c0-1.4,0-2.7,0-4c0-2.6,0-2.6,2.8-2.6     c3.4,0,6.8,0,10.1,0c0.4,0,0.8,0,1.2,0c0,1.1,0,2.1,0,3.3c-0.9,0-1.8,0-2.6,0c-0.6,0-0.9,0.1-0.9,0.7c0,0.8,0,1.6,0,2.6     c1.2,0,2.3,0,3.5,0c0,1.1,0,2.1,0,3.3c-2.3,0-4.7,0-7.1,0l0,0c0-2.2,0-4.4,0-6.6c-1.3,0-2.4,0-3.6,0c0,2.2,0,4.3,0,6.5     C40.2,35.3,37.9,35.3,35.6,35.3L35.6,35.3z" />
                          <path d="M28.4,25.3c0-1.1,0-2.1,0-3.3c-1.2,0-2.3,0-3.3,0C25,21.9,25,21.8,25,21.8c0-0.9-0.3-2.1,0.1-2.7     c0.4-0.5,1.8-0.2,2.7-0.3c0.2,0,0.4,0,0.7-0.1c0-0.8,0-1.6,0-2.4c0-0.7,0.2-0.9,0.9-0.9c2,0,4,0,6.2,0c0-0.9,0-1.7,0-2.5     c0-0.6,0.2-0.9,0.9-0.9c0.8,0,1.6,0,2.5,0c0,2.2,0,4.3,0,6.6c-2.3,0-4.6,0-7,0c0,2.3,0,4.4,0,6.6C30.7,25.3,29.6,25.3,28.4,25.3     C28.4,25.3,28.4,25.3,28.4,25.3z" />
                          <path d="M46.2,42c0-0.9,0-1.7,0.1-2.6c0-0.2,0.4-0.6,0.6-0.6c2.1,0,4.2,0,6.4,0c0,3.3,0,6.5,0,9.9c-1.1,0-2.2,0-3.5,0     c0,1.2,0,2.2,0,3.3c-1.2,0-2.3,0-3.5,0c0-2,0-4,0-5.9c0-0.2,0.4-0.5,0.7-0.5c0.9-0.1,1.8,0,2.8,0c0-1.1,0-2.2,0-3.4     C48.6,41.9,47.4,41.9,46.2,42C46.2,41.9,46.2,42,46.2,42z" />
                          <path d="M21.3,35.3c0.1-1,0.1-2,0.2-3.2c2.3,0,4.6,0,7.1,0c0-0.9,0-1.8,0-2.6c0-0.6,0.2-0.8,0.8-0.8c0.8,0,1.7,0,2.7,0     c0-1.1,0-2.1,0-3.2c1.2-0.1,2.4-0.1,3.5-0.2l0,0c0,2.2,0,4.3,0,6.7c-1.1,0-2.2,0-3.5,0c0,1.2,0,2.2,0,3.3     C28.3,35.3,24.8,35.3,21.3,35.3L21.3,35.3z" />
                          <path d="M14.1,32c0-0.8,0.1-1.5,0.1-2.3c-0.1-0.8,0.3-1,1.1-1c0.8,0.1,1.5,0,2.5,0c0-0.8,0-1.6,0-2.4c-0.1-0.7,0.2-1,1-0.9     c2.8,0,5.7,0,8.5,0c0.4,0,0.7-0.1,1.1-0.1c0,0,0,0,0,0c0,1.1,0,2.2,0,3.4c-2,0-4,0-5.9,0c-0.9,0-1.3,0.2-1.2,1.1     c0.1,0.7,0,1.4,0,2.2C18.9,31.9,16.5,31.9,14.1,32L14.1,32z" />
                          <path d="M32,48.6c0,0.9,0,1.9,0,2.8c0,0.1,0,0.3-0.1,0.5c-2.3,0-4.6,0-7,0c0-2,0-4,0-6.1c0-0.1,0.4-0.4,0.7-0.4     c0.9-0.1,1.8-0.1,2.8-0.1l0,0c0,1.1,0,2.2,0,3.4C29.8,48.6,30.9,48.6,32,48.6L32,48.6z" />
                          <path d="M14.1,31.9c0,2.2,0,4.4,0,6.7c-1.1,0-2.2,0-3.4,0c0-1.4,0-2.9,0-4.3c0-2.2,0-2.2,2.4-2.2C13.4,32.1,13.8,32,14.1,31.9     C14.1,32,14.1,31.9,14.1,31.9z" />
                          <path d="M28.4,12.2c0,1.1,0,2.1,0,3.2c-1.1,0-2.2,0-3.4,0c0-0.9,0-1.8,0-2.6c0-0.2,0.4-0.5,0.6-0.5     C26.5,12.1,27.4,12.2,28.4,12.2z" />
                          <path d="M35.5,25.3c0-0.8,0.1-1.6,0.1-2.5c0-0.6,0.2-0.8,0.8-0.8c0.8,0,1.7,0,2.6,0c0,1.1,0,2.1,0,3.2     C37.9,25.3,36.7,25.3,35.5,25.3C35.5,25.3,35.5,25.3,35.5,25.3z" />
                          <path d="M14.1,28.6c-1.2,0-2.2,0-3.4,0c0-0.9,0-1.8,0-2.6c0-0.2,0.4-0.5,0.6-0.6c0.9-0.1,1.8,0,2.8,0     C14.1,26.5,14.1,27.6,14.1,28.6z" />
                          <path d="M21.2,35.3c0,1.1,0,2.2,0,3.3c-1.1,0-2.2,0-3.4,0c0-0.9-0.1-1.8,0-2.6c0-0.2,0.5-0.5,0.8-0.5     C19.5,35.3,20.4,35.3,21.2,35.3C21.3,35.3,21.2,35.3,21.2,35.3z" />
                          <path d="M46.2,35.3c0,1.1,0,2.1,0,3.3c-1.2,0-2.4,0-3.6,0l0,0c0-0.9,0.1-1.7,0-2.6c0-0.5,0.2-0.7,0.8-0.7     C44.4,35.4,45.4,35.4,46.2,35.3L46.2,35.3z" />
                          <path d="M28.3,41.9c-1.1,0-2.2,0-3.4,0c0-0.9,0-1.8,0-2.7c0-0.2,0.4-0.5,0.6-0.5c0.9-0.1,1.8,0,2.8,0     C28.3,39.8,28.3,40.8,28.3,41.9z" />
                        </g>
                      </g>
                      <g>
                        <polygon points="59,39.2 59,59 41.7,59 41.7,55.7 55.7,55.7 55.7,39.2   " />
                        <polygon points="23.3,55.7 23.3,59 5,59 5,39.3 8.3,39.3 8.3,55.7   " />
                        <polygon points="23.4,5 23.4,8.3 8.3,8.3 8.3,24.7 5,24.7 5,5   " />
                        <polygon points="59,5 59,24.8 55.7,24.8 55.7,8.3 40.6,8.3 40.6,5   " />
                      </g>
                    </g>
                  </svg> Scan</a>
                <a href="#timein" style="font-size: 19px;" data-toggle="modal" class="btn btn-primary btn-sm btn-flat flex justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" fill="#fff" style="width: 15px;" version="1.1" viewBox="4.63 5.55 90.63 88.89">
                    <path d="m55.125 40.875h-10.25c-2.5312 0-4.5938 2.0625-4.5938 4.5938v10.25c0 2.5312 2.0625 4.5938 4.5938 4.5938h10.25c2.5312 0 4.5938-2.0625 4.5938-4.5938v-10.25c0-2.5312-2.0625-4.5938-4.5938-4.5938zm1.4688 14.844c0 0.8125-0.65625 1.4688-1.4688 1.4688h-10.25c-0.8125 0-1.4688-0.65625-1.4688-1.4688v-10.25c0-0.8125 0.65625-1.4688 1.4688-1.4688h10.25c0.8125 0 1.4688 0.65625 1.4688 1.4688zm-26.156-14.844h-10.25c-2.5312 0-4.5938 2.0625-4.5938 4.5938v10.25c0 2.5312 2.0625 4.5938 4.5938 4.5938h10.25c2.5312 0 4.5938-2.0625 4.5938-4.5938v-10.25c0-2.5312-2.0625-4.5938-4.5938-4.5938zm1.4688 14.844c0 0.8125-0.65625 1.4688-1.4688 1.4688h-10.25c-0.8125 0-1.4688-0.65625-1.4688-1.4688v-10.25c0-0.8125 0.65625-1.4688 1.4688-1.4688h10.25c0.8125 0 1.4688 0.65625 1.4688 1.4688zm47.906-14.844h-10.25c-2.5312 0-4.5938 2.0625-4.5938 4.5938v10.25c0 2.5312 2.0625 4.5938 4.5938 4.5938h10.25c2.5312 0 4.5938-2.0625 4.5938-4.5938v-10.25c0-2.5312-2.0625-4.5938-4.5938-4.5938zm1.4688 14.844c0 0.8125-0.65625 1.4688-1.4688 1.4688h-10.25c-0.8125 0-1.4688-0.65625-1.4688-1.4688v-10.25c0-0.8125 0.65625-1.4688 1.4688-1.4688h10.25c0.8125 0 1.4688 0.65625 1.4688 1.4688zm-26.156 9.5156h-10.25c-2.5312 0-4.5938 2.0625-4.5938 4.5938v10.25c0 2.5312 2.0625 4.5938 4.5938 4.5938h10.25c2.5312 0 4.5938-2.0625 4.5938-4.5938v-10.25c0-2.5312-2.0625-4.5938-4.5938-4.5938zm1.4688 14.844c0 0.8125-0.65625 1.4688-1.4688 1.4688h-10.25c-0.8125 0-1.4688-0.65625-1.4688-1.4688v-10.25c0-0.8125 0.65625-1.4688 1.4688-1.4688h10.25c0.8125 0 1.4688 0.65625 1.4688 1.4688zm-26.156-14.844h-10.25c-2.5312 0-4.5938 2.0625-4.5938 4.5938v10.25c0 2.5312 2.0625 4.5938 4.5938 4.5938h10.25c2.5312 0 4.5938-2.0625 4.5938-4.5938v-10.25c0-2.5312-2.0625-4.5938-4.5938-4.5938zm1.4688 14.844c0 0.8125-0.65625 1.4688-1.4688 1.4688h-10.25c-0.8125 0-1.4688-0.65625-1.4688-1.4688v-10.25c0-0.8125 0.65625-1.4688 1.4688-1.4688h10.25c0.8125 0 1.4688 0.65625 1.4688 1.4688zm47.906-14.844h-10.25c-2.5312 0-4.5938 2.0625-4.5938 4.5938v10.25c0 2.5312 2.0625 4.5938 4.5938 4.5938h10.25c2.5312 0 4.5938-2.0625 4.5938-4.5938v-10.25c0-2.5312-2.0625-4.5938-4.5938-4.5938zm1.4688 14.844c0 0.8125-0.65625 1.4688-1.4688 1.4688h-10.25c-0.8125 0-1.4688-0.65625-1.4688-1.4688v-10.25c0-0.8125 0.65625-1.4688 1.4688-1.4688h10.25c0.8125 0 1.4688 0.65625 1.4688 1.4688zm-52.062-32.438c0.64062 0.57812 0.70312 1.5625 0.125 2.2031l-3.75 4.2188c-0.28125 0.32812-0.70312 0.51562-1.125 0.53125h-0.03125c-0.42188 0-0.82812-0.17188-1.1094-0.46875l-2-2.0469c-0.60938-0.60938-0.59375-1.6094 0.015625-2.2031 0.60938-0.60938 1.6094-0.59375 2.2031 0.015625l0.82812 0.84375 2.6406-2.9688c0.57812-0.64062 1.5625-0.70312 2.2031-0.125zm24.484 25.969-1.5 1.5 1.5 1.5c0.60938 0.60938 0.60938 1.5938 0 2.2031-0.3125 0.3125-0.70312 0.45312-1.1094 0.45312s-0.79688-0.15625-1.1094-0.45312l-1.5-1.5-1.5 1.5c-0.3125 0.3125-0.70312 0.45312-1.1094 0.45312s-0.79688-0.15625-1.1094-0.45312c-0.60938-0.60938-0.60938-1.5938 0-2.2031l1.5-1.5-1.5-1.5c-0.60938-0.60938-0.60938-1.5938 0-2.2031s1.5938-0.60938 2.2031 0l1.5 1.5 1.5-1.5c0.60938-0.60938 1.5938-0.60938 2.2031 0s0.60938 1.5938 0 2.2031zm0.1875-25.969c0.64062 0.57812 0.70312 1.5625 0.125 2.2031l-3.75 4.2188c-0.28125 0.32812-0.70312 0.51562-1.125 0.53125h-0.03125c-0.42188 0-0.82812-0.17188-1.1094-0.46875l-2-2.0469c-0.60938-0.60938-0.59375-1.6094 0.03125-2.2031 0.60938-0.60938 1.6094-0.59375 2.2031 0.03125l0.82812 0.84375 2.6406-2.9688c0.57812-0.64062 1.5625-0.70312 2.2031-0.125zm24.688 24.359c0.64062 0.57812 0.70312 1.5625 0.125 2.2031l-3.75 4.2188c-0.28125 0.32812-0.70312 0.51562-1.125 0.53125h-0.03125c-0.42188 0-0.82812-0.17188-1.1094-0.46875l-2-2.0469c-0.60938-0.60938-0.59375-1.6094 0.015625-2.2031 0.60938-0.60938 1.6094-0.59375 2.2031 0.015625l0.82812 0.84375 2.6406-2.9688c0.57812-0.64062 1.5625-0.70312 2.2031-0.125zm-49.375 0c0.64062 0.57812 0.70312 1.5625 0.125 2.2031l-3.75 4.2188c-0.28125 0.32812-0.70312 0.51562-1.125 0.53125h-0.03125c-0.42188 0-0.82812-0.17188-1.1094-0.46875l-2-2.0469c-0.60938-0.60938-0.59375-1.6094 0.015625-2.2031 0.60938-0.60938 1.6094-0.59375 2.2031 0.015625l0.82812 0.84375 2.6406-2.9688c0.57812-0.64062 1.5625-0.70312 2.2031-0.125zm49.172-22.75-1.5 1.5 1.5 1.5c0.60938 0.60938 0.60938 1.5938 0 2.2031-0.3125 0.3125-0.70312 0.45312-1.1094 0.45312s-0.79688-0.15625-1.1094-0.45312l-1.5-1.5-1.5 1.5c-0.3125 0.3125-0.70312 0.45312-1.1094 0.45312s-0.79688-0.15625-1.1094-0.45312c-0.60938-0.60938-0.60938-1.5938 0-2.2031l1.5-1.5-1.5-1.5c-0.60938-0.60938-0.60938-1.5938 0-2.2031s1.5938-0.60938 2.2031 0l1.5 1.5 1.5-1.5c0.60938-0.60938 1.5938-0.60938 2.2031 0s0.60938 1.5938 0 2.2031zm9.4375-33.953h-7.1562v-4.5469c0-2.8594-2.3281-5.2031-5.2031-5.2031h-2.4375c-2.8594 0-5.2031 2.3281-5.2031 5.2031v4.5469h-11.438v-4.5469c0-2.8594-2.3281-5.2031-5.2031-5.2031h-2.4375c-2.8594 0-5.2031 2.3281-5.2031 5.2031v4.5469h-11.438v-4.5469c0-2.8594-2.3281-5.2031-5.2031-5.2031h-2.4375c-2.8594 0-5.2031 2.3281-5.2031 5.2031v4.5469h-7.1562c-4.125 0-7.4688 3.3594-7.4688 7.4688v64.203c0 4.125 3.3594 7.4688 7.4688 7.4688h75.688c4.125 0 7.4688-3.3594 7.4688-7.4688v-64.203c0-4.125-3.3594-7.4688-7.4688-7.4688zm-16.859-4.5469c0-1.1406 0.9375-2.0781 2.0781-2.0781h2.4375c1.1406 0 2.0781 0.9375 2.0781 2.0781v12.125c0 1.1406-0.9375 2.0781-2.0781 2.0781h-2.4375c-1.1406 0-2.0781-0.9375-2.0781-2.0781zm-24.266 0c0-1.1406 0.9375-2.0781 2.0781-2.0781h2.4375c1.1406 0 2.0781 0.9375 2.0781 2.0781v12.125c0 1.1406-0.9375 2.0781-2.0781 2.0781h-2.4375c-1.1406 0-2.0781-0.9375-2.0781-2.0781zm-24.266 0c0-1.1406 0.9375-2.0781 2.0781-2.0781h2.4375c1.1406 0 2.0781 0.9375 2.0781 2.0781v12.125c0 1.1406-0.9375 2.0781-2.0781 2.0781h-2.4375c-1.1406 0-2.0781-0.9375-2.0781-2.0781zm-10.281 7.6719h7.1562v4.4531c0 2.8594 2.3281 5.2031 5.2031 5.2031h2.4375c2.8594 0 5.2031-2.3281 5.2031-5.2031v-4.4531h11.438v4.4531c0 2.8594 2.3281 5.2031 5.2031 5.2031h2.4375c2.8594 0 5.2031-2.3281 5.2031-5.2031v-4.4531h11.438v4.4531c0 2.8594 2.3281 5.2031 5.2031 5.2031h2.4375c2.8594 0 5.2031-2.3281 5.2031-5.2031v-4.4531h7.1562c2.3906 0 4.3438 1.9531 4.3438 4.3438v9.5156h-84.391v-9.5156c0-2.3906 1.9531-4.3438 4.3438-4.3438zm75.688 72.891h-75.672c-2.3906 0-4.3438-1.9531-4.3438-4.3438v-51.562h84.375v51.562c0 2.3906-1.9531 4.3438-4.3438 4.3438z"></path>
                  </svg> Timein</a>
              </div>

              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th class="hidden"></th>
                    <th>Date</th>
                    <th>Employee ID</th>
                    <th>QR</th>
                    <th>Name</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Tools</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT *, employees.employee_id AS empid, attendance.id AS attid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id ORDER BY attendance.date DESC, attendance.time_in DESC";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      $status = ($row['status']) ? '<span class="label label-warning pull-right">ontime</span>' : '<span class="label label-danger pull-right">late</span>';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>" . date('M d, Y', strtotime($row['date'])) . "</td>
                          <td>" . $row['empid'] . " </td>
                          <td><div class='qrcode' data-qrcode='" . $row['empid'] . "'></div></td>
                          <td>" . $row['firstname'] . ' ' . $row['lastname'] . " </td>
                          <td>" . date('h:i A', strtotime($row['time_in'])) . $status . "</td>
                          <td>" . date('h:i A', strtotime($row['time_out'])) . "</td>
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='" . $row['attid'] . "'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='" . $row['attid'] . "'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>


    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/attendance_modal.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>


  <script>
    $(document).ready(function() {

      const qrcode = document.querySelectorAll('.qrcode');
      const qrClick = document.querySelector('tbody');
      console.log(qrcode);
      qrcode.forEach(function(item) {
        var dataValue = item.getAttribute('data-qrcode');

        var options = {
          text: dataValue,
          width: 50,
          height: 50,
          colorDark: "#000000",
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.L
        };
        var qrCode = new QRCode(item, options);

        console.log(qrCode);

      });
      qrClick.addEventListener('click', (e) => {
        console.log(e.target);
        if (e.target.tagName === 'IMG') {
          var parentDiv = e.target.closest('.qrcode');
          // Retrieve the data-qrcode attribute from the parent div
          var parentQRcode = parentDiv.getAttribute('data-qrcode');
          var options = {
            text: parentQRcode,
            width: 500,
            height: 500,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.L
          };

          const instance = basicLightbox.create(`
   <a id='qrdownload' style="color:white; font-size:16px"  href=""download>
   ClICK THE QR TO DOWNLOAD
   <div id="qr"></div></a>
`)
          instance.show()
          if (document.getElementById('qr')) {
            var qr = new QRCode(document.getElementById('qr'), options);
            var qrDownloadA = document.getElementById('qrdownload');
            var canvas = document.getElementById('qr').getElementsByTagName('canvas')[0];

            // Get the data URL of the QR code image from the canvas
            var qrDataUrl = canvas.toDataURL();
            // Set the href attribute of the parent anchor tag to the image source
            qrDownloadA.setAttribute("href", qrDataUrl);
          }
        }
      });

      $('#example1').DataTable({
        responsive: true
      })
      const scanner = new Html5QrcodeScanner('reader', {
        // Scanner will be initialized in DOM inside element with id of 'reader'
        qrbox: {
          width: 500,
          height: 500,
        }, // Sets dimensions of scanning box (set relative to reader element width)
        fps: 20, // Frames per second to attempt a scan
      });

      $('#scanBtn').click(function(e) {
        scanner.render(success, error);
      });

      // Starts scanner

      function success(result) {


        var selectElement = document.querySelector('select[name="status"]');
        var selectedValue = selectElement.value;
        var attendance = `status=${selectedValue}&employee=${result}`
        $.ajax({
          type: 'POST',
          url: '../attendance.php',
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
              $('#scan').modal('hide');
            }
          }
        });

        scanner.clear();

        // Clears scanning instance

        // document.getElementById('reader').remove();
        // Removes reader element from DOM since no longer needed

      }

      function error(err) {
        // Notiflix.Notify.failure('Something Went Wrong Please try again');

      }

    });

    $(function() {
      $('.edit').click(function(e) {
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $('.delete').click(function(e) {
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });
    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'attendance_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('#datepicker_edit').val(response.date);
          $('#attendance_date').html(response.date);
          $('#edit_time_in').val(response.time_in);
          $('#edit_time_out').val(response.time_out);
          $('#attid').val(response.attid);
          $('#employee_name').html(response.firstname + ' ' + response.lastname);
          $('#del_attid').val(response.attid);
          $('#del_employee_name').html(response.firstname + ' ' + response.lastname);
        }
      });
    }

    $('#attendance').submit(function(e) {
      e.preventDefault();
      var attendance = $(this).serialize();
      console.log(attendance);
      $.ajax({
        type: 'POST',
        url: '../attendance.php',
        data: attendance,
        dataType: 'json',
        success: function(response) {
          if (response.error) {
            $('.alert').hide();
            $('.alert-danger').show();
            $('.message').html(response.message);
            Notiflix.Notify.failure(response.message);

          } else {
            console.log(response);
            $('.alert').hide();
            $('.alert-success').show();
            $('.message').html(response.message);
            $('#employee').val('');
            Notiflix.Notify.success(response.message);
            $('#timein').modal('hide');

          }
        }
      });
    });
  </script>
</body>

</html>