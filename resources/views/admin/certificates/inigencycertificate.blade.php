<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Barangay Clearance</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
    #border{
    width: 100%;
    height: 96.5%;
    border: 5px solid blue; /* width, style, colour */
    border-style: solid;
    border-top: 5px double blue;
    border-left: 5px double blue;
    border-right: 5px double blue;
    border-bottom: 5px double blue;
    }

    hr.style2 {
            border-top: 3px double #8c8b8b;
        }
    #main    {
     background-color: #FFFFFF;
     width: 90%;
     margin: 10px auto;
     }

    .content1 {
      text-indent: 50px;
    }

    .brgysec {
        text-indent: 80px;
    }

    .brgytitle {
        text-indent: 120px;
    }

    .approved {
        text-indent: 270px;
    }

    .chairman {
        text-indent: 370px;
    }

    .brgyctitle {
        text-indent: 400px;
    }

    .applicant {
        text-indent: 40px;
    }

    .apptitle {
        text-indent: 70px;
    }

    div.c {
      text-indent: 30%;
    }
    p{
        font-family:'Times New Roman', Times, serif;
    }

    .dryseal{
        font-size: 10px;
        text-align: right;
    }

    .qrcode{
        margin-left : 315px;
        margin-top: 800px;
        position: fixed;

    }
    #mainlogo{
        position: fixed;
    }
    #logobin{
        width: 100px;
        height : 100px;
        margin-top: 20px;
        margin-left : 50px;

    }
    </style>
  <body>
      <div id="border">
      <div id="main">
        <div class="container">
            <div class="row">
                <div id="mainlogo">
                    <img id="logobin" src="{{ $base_url.'/public/images/binalonanlogo.png' }}" alt="logo">
                </div>
                <div class="col-md-12">
                <center>
                    <p>
                        Republic of the Philippines<br>
                        Province of Pangasinan<br>
                        <strong>MUNICIPALITY OF BINALONAN</strong><br>
                        <strong><u>BARANGAY POBLACION</u></strong><br>
                    </p>
                    <h3><u>OFFICE OF THE PUNONG BARANGAY</u></h3>
                    <!-- <br> -->
                    <hr class="style2">
                    <br>
                    <p style="font-size: 25px; font-family: 'Times New Roman', Times, serif;"><strong>BARANGAY CLEARANCE</strong></p>
                </center>
                <br>
                <p>TO WHOM IT MAY CONCERN:</p>

                <p class="content1">This is to certify <strong><i>{{ $data->fname ." ". $data->mname ." ". $data->lname . (isset($data->ename) ? " " .$data->ename : "") }}</i></strong>, 26 years of age, {{ $data->civil_status == 1 ? "single" : "married" }}, is a resident of {{ $data->address}}.</p>

                <p class="content1">This further certifies that based on records kept in this office, he/she has no pending case filed in the Katarungang Pambarangay or no derogatory record whatsoever.</p>

                <p class="content1">This furthermore certifies that he/she is a person of good moral character, peaceful and law-abiding citizen whose reputation in the community is beyond reproach.</p>

                <p class="content1">This certification is issued upon request of <strong>Mr. Ibay</strong>, for whatever legal intent it may serve.</p>

                <p class="content1">Issued {{ $dateissued }} day of {{ date('F, Y')}}.</p>
                <p>Prepared by:</p>

                <p class="brgysec"><strong><i>MICHELLE B. CRECENCIA</i></strong></p>
                <i><p class="brgytitle">Barangay Secretary</p></i>

                <p class="approved">APPROVED:</p>

                <p class="chairman"><strong><i>JUAN Z. DELOS SANTOS</i></strong></p>
                <i><p class="brgyctitle">Punong Barangay</p></i>

                <p class="applicant"><strong><i>{{ $data->fname ." ". $data->mname ." ". $data->lname . (isset($data->ename) ? " " .$data->ename : "") }}</i></strong></p>
                <i><p class="apptitle">Applicant</p></i>

                <br>

                <div class="qrcode">
                    <img src="data:image/png;base64, {!! base64_encode($qrcode) !!}">
                </div>


                <p class="issued">CTC. No: 08472496<br>Issued on: <?php echo date('F d, Y');?><br>Issued at: Binalonan, Pangasinan</p>
                <p class="dryseal">INVALID WITHOUT DRY SEAL <br>VERIFICATION SIGNATURE <br>AND DATE</p>
                </div>
            </div>
        </div>
      </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
