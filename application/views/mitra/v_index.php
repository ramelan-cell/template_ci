
<!DOCTYPE>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" type="text/css" href="../asset/datepicker/css/bootstrap-datepicker.min.css"> -->

        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
        <script type="text/javascript" language="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
      	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script src="<?php echo base_url().'assets/fusioncharts/js/fusioncharts.js'?>" crossorigin="anonymous"></script>
        <script src="<?php echo base_url().'assets/fusioncharts/js/themes/fusioncharts.theme.fusion.js'?>"></script>
        <!-- <script src="<?php echo base_url().'assets/js/index.js'?>" crossorigin="anonymous"></script> -->
        <script src="<?php echo base_url().'assets/js/gauge.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/sweetalert.min.js' ?>"></script>
        <script src="<?php echo base_url()?>assets/js/axios.min.js"></script>

        <link href="<?php echo base_url().'assets/css/coreui-icons.min.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/css/flag-icon.min.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/css/font-awesome.min.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/css/simple-line-icons.css'?>" rel="stylesheet">
        <!-- <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet"> -->
        <link href="<?php echo base_url().'assets/css/pace.min.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/css/animate.min.css'?>" rel="stylesheet">
        
        <script src="<?php echo base_url().'assets/js/popper.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/pace.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/perfect-scrollbar.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/coreui.min.js'?>"></script>
        

        <title>Micro System</title>
        <link rel="icon" type="image/jpg" href="<?php echo base_url().'assets/images/kami-sistem.png'?>" sizes="32x32" ></link>
    </head>
    <body >
        <font face="Titillium Web">
            <?php 
              $this->load->view('mitra/v_template');
            ?>
        </font>
        <script src="<?php echo base_url().'assets/jscolor.js'?>"></script>

        <style>
          .row{
            padding : 3px;
          }

          button{
              height : 34px;
          }

          table {
              font-size : small;
          }

          body{
            font-family:monospace;
            font-family:monospace !important;
            font-size: 12px;
            background-image: url(data:image/gif;base64,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);
          }
        </style>
    </body>

</html>
