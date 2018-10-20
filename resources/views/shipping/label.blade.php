<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>SHIPPING LABEL | NO LIMITZ MATIC SHOP</title>
        <body onload="window.print();">
            <style type="text/css">
              table {font-family: arial, sans-serif;
                      border-collapse: collapse;width:600px;
                }
                td,th {border: 1px solid #dddddd;}
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
            <img src="{{url('public/images/shipping.png')}}" style='width:600px;' />
            <table>
              <tr>
                <td colspan="2">
                  <div style="padding:20px;text-align:center;font-weight:600;">
                    INVOICE NUMBER : {{$data['no_invoice']}}
                  </div>
                </td>
              </tr>
              <tr>
                <td >
                  <div style="padding:10px;">
                  PENGIRIM : <br/>
                    <span style="font-weight:600">No Limitz Matic Shop</span> <br/>
                    Jalan Cijagra No. 14C <br>
                    Kel. Cijagra, Kec. Lengkong<br>
                    Bandung, Indonesia 40265<br>
                    Telp +622273514926 +6281221001990<br>
                    Email : nolimitz@hotmail.co.id
                  </div>
                </td>
                <td >
                    <div style="padding:10px;">
                  PENERIMA : <br/>
                      <span style="font-weight:600">{{$data['members']['firstname']}} {{$data['members']['latstname']}}</span> <br/>
                      {{$data['memberaddresses']['addresses']['detail']}}<br/>
                      {{$data['memberaddresses']['addresses']['subdistrict']}} - {{$data['memberaddresses']['addresses']['city']}}<br/>
                      {{$data['memberaddresses']['addresses']['province']}}, {{$data['memberaddresses']['addresses']['zip']}}<br/>
                      Phone :  {{$data['members']['phone']}}<br/>
                       </div>
                </td>
              </tr>
            </table>
        </body>
    </head>
</html>