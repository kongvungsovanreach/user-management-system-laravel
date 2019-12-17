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
      $('.datepicker').datepicker({
        "format" :'yyyy-mm-dd',
        "autoClose": true
      });
    });
    function prompt_alert_delete(id, title, subtitle, success, nosuccess, url) {
      swal({
        title: title,
        text: subtitle,
        icon: "warning",
        dangerMode: true,
        buttons: ['@lang('message.cancel')', '@lang('message.yes')'],
      })
        .then((willDelete) => {
          if (willDelete) {
            swal(success, {
              icon: "success",
              buttons: false,
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
        buttons: ['@lang('message.cancel')', '@lang('message.yes')'],
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
      var profile = document.querySelector('#view_profile');
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
          <a href="/" class="brand-logo" id="logo-text">@lang('message.ums')@hasrole(["admin"]) <span id="admin">@lang('message.for_admin')</span> @endhasrole</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/">@lang('message.home')</a></li>
            <li><a href="{{route('user.deleteAll')}}">@lang('message.delete_all')</a></li>
            <li><a href="/contactUs">@lang('message.contact_us')</a></li>
            <li><a href="/aboutUs">@lang('message.about_us')</a></li>
            @if(Auth::check())
              <li><a href="/logout">@lang("message.logout")</a></li>
            @else
            <li><a href="/login">@lang("message.login")</a></li>
            @endif
            <li><a href="/khmer" id="flag-link">
                <img src="/image/cambodia.png" alt="" class="img-flag">
              </a>
            </li>
            <li><a href="/english" id="flag-link">
                <img src="/image/us.png" alt="" class="img-flag">
              </a>
            </li>
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
              <h5 class="white-text">@lang('message.ums')</h5>
              <p class="grey-text text-lighten-4">@lang('message.ums.footer')</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">@lang('message.useful_link')</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">@lang('message.home')</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">@lang('message.about_us')</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">@lang('message.contact_us')</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">FAQ</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            @lang('message.copyright')
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>