<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/favicon.png">

        <title>{{config('app.name')}}</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @if(config('app.ga_id'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167948538-5"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', "{{config('app.ga_id')}}");
        </script>
        @endif
    </head>
    <body>

            <ins class="bookingaff" data-aid="2060572" data-target_aid="2060572" data-prod="dfl2" data-width="100%" data-height="auto" data-lang="en" data-currency="USD" data-dest_id="4862" data-dest_type="region" data-df_num_properties="9">
                <!-- Anything inside will go away once widget is loaded. -->
                    <a href="//www.booking.com?aid=2060572">Booking.com</a>
            </ins>
            <script type="text/javascript">
                (function(d, sc, u) {
                  var s = d.createElement(sc), p = d.getElementsByTagName(sc)[0];
                  s.type = 'text/javascript';
                  s.async = true;
                  s.src = u + '?v=' + (+new Date());
                  p.parentNode.insertBefore(s,p);
                  })(document, 'script', '//aff.bstatic.com/static/affiliate_base/js/flexiproduct.js');
            </script>
    </body>
</html>
