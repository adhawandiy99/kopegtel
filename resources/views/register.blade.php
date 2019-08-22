<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  
  <title>REGISTER PAGE</title>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!-- Core stylesheets -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/css/pixeladmin.min.css" rel="stylesheet" type="text/css">
  <link href="/css/widgets.min.css" rel="stylesheet" type="text/css">

  <!-- Theme -->
  <link href="/css/themes/clean.min.css" rel="stylesheet" type="text/css">

  <!-- Pace.js -->
  <script src="/pace/pace.min.js"></script>

  <!-- Custom styling -->
  <style>
    .page-signin-header {
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    .page-signin-header .btn {
      position: absolute;
      top: 12px;
      right: 15px;
    }

    html[dir="rtl"] .page-signin-header .btn {
      right: auto;
      left: 15px;
    }

    .page-signin-container {
      width: auto;
      margin: 30px 10px;
    }

    .page-signin-container form {
      border: 0;
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    @media (min-width: 544px) {
      .page-signin-container {
        width: 350px;
        margin: 60px auto;
      }
    }

    .page-signin-social-btn {
      width: 40px;
      padding: 0;
      line-height: 40px;
      text-align: center;
      border: none !important;
    }

    #page-signin-forgot-form { display: none; }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  

  <!-- Sign In form -->

  <div class="page-signin-container" id="page-signin-form">
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Register Account</h2>

    <form id="reg" method="post" class="panel p-a-4">
      <fieldset class=" form-group form-group-lg">
        <input type="text" name="nik" class="form-control" placeholder="NIK">
      </fieldset>
      <fieldset class=" form-group form-group-lg">
        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
      </fieldset>
      <fieldset class=" form-group form-group-lg">
        <label>Level</label>
        <select name="level" class="form-control" placeholder="Level">
          <!--1:admin;2:sdi;3:warroom;4:sales:5:optima;6:HD PROV;7:HS;0:view;-->
          <option value="0">View</option>
          <option value="2">SDI</option>
          <option value="3">Warroom</option>
          <option value="4">Sales</option>
          <option value="5">Optima</option>
          <option value="7">HomeService</option>
        </select>
      </fieldset>
      <fieldset class=" form-group form-group-lg">
        <input type="text" name="user" class="form-control" placeholder="Username">
      </fieldset>
      <fieldset class=" form-group form-group-lg">
        <input type="password" name="pass" class="form-control" placeholder="Password">
      </fieldset>
      <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Daftar</button>
    </form>
  </div>

  <!-- / Sign In form -->

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- Load jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Core scripts -->
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/pixeladmin.min.js"></script>

  <!-- Your scripts -->
  <script src="/js/app.js"></script>
  <script>
    $(function() {
      $("#reg").submit(function(e){
        var a = $("input[name=nik]").val();
        var b = $("input[name=nama]").val();
        var c = $("input[name=user]").val();
        var d = $("input[name=pass]").val();
        if(a=="" || b=="" || c=="" || d==""){
          alert("Isi Lengkap Form Register!");
          e.preventDefault();
        }
      });
    });
  </script>
 
</body>
</html>
