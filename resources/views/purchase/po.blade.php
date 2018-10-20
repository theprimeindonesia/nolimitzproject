<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <style>
            *{
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            }
            body {
            padding-left:10px;
            padding-right:10px;
            }
            table {
            width:780px;
            }
            .table {
            border-collapse: collapse;
            }
            .table td {
            border: 1px solid black;
            padding: 10px;
            font-size: 13px;
            }
            .table .footer{
                font-weight:600;

            }
            ul {
            list-style-type : none;
            padding:0px;
            }
            .right {
            text-align: right;
            }
            .center {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            }
            .head {
            font-size: 36;
            }
            .no-border{
            border:0px !important;
            }
            .background {
            background:#ddd;
            }
            ttd {
            text-align: left;
            }
            .auth {
            border-top: 1px solid #000;
            padding: 10px;
            }
        </style>
    </head>
    <body onload="window.print()">
        <table  border="0">
            <tr>
                <td width="464" class="center"><img src="{{url('public/images/logo.png')}}" width="200" height="100" /></td>
                <td width="420">
                    <p class="center">Purchase Order</p>
                    <ul>
                        <li>No PO : {{$data['no_po']}} </li>
                        <li>DATE : {{$data['created_at']}}</li>
                    </ul>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table  class="table" >
            <tr class="head">
                <td width="300" class="background"><strong>Supplier</strong></td>
                <td width="300" class="background"><strong>Delivery Address</strong></td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li><strong>{{$data['suppliers']['name']}}</strong></li>
                        <li>{{$data['suppliers']['addresses']['detail']}}   {{$data['suppliers']['addresses']['subdistrict']}}  {{$data['suppliers']['addresses']['city']}}, {{$data['suppliers']['addresses']['province']}} {{$data['suppliers']['addresses']['zip']}} </li>
                        <li>Telp {{$data['suppliers']['contact']}} - {{$data['suppliers']['sales']}}</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><strong>NoLimitz Maticshop</strong></li>
                        <li>Jalan Cijagra No. 14C   Kel. Cijagra, Kec. Lengkong  Bandung, Indonesia 40265      </li>
                        <li>Telp +622273514926 +6281221001990</li>
                        <li>Email : <a href="mailto:%6e%6f%6c%69%6d%69%74%7a@%68%6f%74%6d%61%69%6c.%63%6f.%69%64">nolimitz@hotmail.co.id</a></li>
                    </ul>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table  class="table">
            <tr class="background center">
                <td>PRODUCT</td>
                <td>BARCODE</td>
                <td>QTY.</td>
                <td>PRICE</td>
                <td>TOTAL</td>
            </tr>
            @foreach($data['podetails'] as $x)
            <tr>
                <td>
                {{$x['stock']['products']['name']}} - 
                    @foreach($x['stock']['varians'] as $v)
                        {{$v['value']}}
                    @endforeach
                </td>
                <td>{{$x['stock']['barcode']}}</td>
                <td>{{$x['qty']}}</td>
                <td>Rp. {{number_format($x['price'],0,',','.')}}</td>
                <td>Rp. {{number_format($x['total'],0,',','.')}}</td>
            </tr>
            @endforeach
        </table>
        <p>&nbsp;</p>
        <table  class="table ">
            <tr>
                <td width="746" class="right no-border footer">Total</td>
                <td width="138" class="footer">Rp. {{number_format($data['total'],0,',','.')}}</td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table  class="table">
            <tr>
                <td width="412" class="right no-border">&nbsp;</td>
                <td width="356" class="center  no-border">
                    <p>&nbsp;</p>
                    <p class="auth">Authorized By</p>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
    </body>
</html>