<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body style="margin: 7% 10%; border: 3px solid #795548; padding: 10px;">
    <div>
        <a href="{{$urlPage}}" style="transition: opacity 0.2s ease-in;color: #5c91ad;" target="_blank">
        	<img alt="VoialApp" src='http://localhost/VoialApp/public/siteStyle/images/logo-white-209x19.png' style="border: 0;-ms-interpolation-mode: bicubic;display: block;  margin: 0 auto; width: 18%;">
        </a>
    </div>
    <p style="color: #031944; font-weight: bold;  text-decoration: underline; text-align: justify;">
        {!! $title !!}
    </p>
    <p style="text-align: justify;">
        {!! $body !!}
    </p>
    <p>
        {!! $linkPD !!}
        <br>
        <img alt="VoialApp" src='http://localhost/VoialApp/public/siteStyle/images/email/1.png' style="border: 0;-ms-interpolation-mode: bicubic;width: 25%;padding-left: 25px; padding-top: 30px;">
        <img alt="VoialApp" src='http://localhost/VoialApp/public/siteStyle/images/email/2.png' style="border: 0;-ms-interpolation-mode: bicubic;width: 25%;padding-left: 25px; padding-top: 30px;">
        <img alt="VoialApp" src='http://localhost/VoialApp/public/siteStyle/images/email/3.png' style="border: 0;-ms-interpolation-mode: bicubic;width: 25%;padding-left: 25px; padding-top: 30px;">
    </p>
    <br>
    <p style="text-align: justify;">
        {!! $footer !!}
    </p>
    <p>
        <span>{!! link_to('/confirm/' . $confirmation_code, $link) !!}</span> | <span>{!! link_to('/confirm/' . $confirmation_code, $linkUnsuscribe) !!}</span>
    </p>
    </div>
</body>

</html>