<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>UMS - @yield("title")</title>
  <!-- Compiled and minified CSS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script>
    $(document).ready(function () {
      $('select').formSelect();
      $('.datepicker').datepicker();
    });
    function prompt_alert_delete(id, title, subtitle, success, nosuccess, url) {
      swal({
        title: title,
        text: subtitle,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            swal(success, {
              icon: "success",
            });
            window.location.href = url;
          }
        });
    }

    function prompt_alert_update(id, title, subtitle, success, nosuccess, url) {
      swal({
        title: title,
        text: subtitle,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            swal(success, {
              icon: "success",
            });
            document.forms["update_form"].submit();
          }else {
            window.location.href = url;
          }
        });
    }

    function pick_image(input) {
      var profile = document.querySelector('img');
      var reader = new FileReader();
      reader.onloadend = function () {
        profile.src = reader.result;
      }
      if (input.files[0]) {
        reader.readAsDataURL(input.files[0]);
      } else {
        profile.src = "";
      }
    }

  </script>
  @yield("script")
</head>

<body>
  <header>
    <div class="row">
      <nav class="col m10 offset-m1">
        <div class="nav-wrapper">
          <a href="/" class="brand-logo" id="logo-text">User Management System</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Home</a></li>
            <li><a href="badges.html">Contact Us</a></li>
            <li><a href="collapsible.html">About Us</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <main>
    <div class="row">
        @yield("content")
    </div>
  </main>
  <footer class="page-footer">
    <div class="row">
      <div class="col m10 offset-m1" id="footer-div">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">User Management System</h5>
              <p class="grey-text text-lighten-4">This is the simple User Management System that was built using
                laravel framework and using blade as a template engine in the process of developing this website.
                Thanks!</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Some Useful Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">About Us</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Contact Us</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">FAQ</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            © 2019 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>