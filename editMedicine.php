<?php
session_start();
if(!isset($_SESSION['logged'])) header("location: login.html");
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pj";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>MyProject</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
      // $.ajax({
      //   url: '../PHP/getLastID_med.php',
      //   dataType: 'json',
      //   success: function(data) {
      //     if(data.status == true) {
      //       $("#medicine_id").val(data.last_ID);
      //     }
      //   }
      // });

    $("form").submit(function(e){
      e.preventDefault();
      // if($("#nurse_username").val().length < 3 || $("#nurse_password").val().length < 3 || $("#first_name").val().length < 3 || $("#last_name").val().length < 3)
      // {
      //   alert("คุณกรอกข้อมูลไม่ครบถ้วน กรุณากรอกให้ครบ");
      //   return;
      // }
      $.ajax({
          url: 'PHP/manage_medicine.php',
          data: {
            medicine_name: $("#medicine_name").val(),
            unit_id: $("#unit_id").val(),
            hdnCmd: $("#hdnCmd").val()
          },
          dataType: 'json',
          success: function(data) {
            if(data.status == true) {
              $("#result").html(data.msg);
              //location.reload();
            }
          },
          type: 'POST'
      });
    });
    });
</script> -->
</head>
<style>
  #tbb {
    color: black;
  }
</style>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear">
    <div class="fl_left">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-sign-in"></i> <a href="Logout.php">Logout</a></li>
        <li><a href="update.php"><?php echo $_SESSION['fullname'];?></a></li>
      </ul>
    </div>
    <!-- <div class="fl_right">
      <form class="clear" method="post" action="#">
        <fieldset>
          <legend>Search:</legend>
          <input type="search" value="" placeholder="Search Here&hellip;">
          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>
    </div> -->
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
      <h2><a href="index.php">Tobercolosis Patients</a></h2>
      <h2>Management System</h2>
    </div>
    <nav id="mainav" class="fl_right">
      <?php require_once './components/header.php'; ?>
    </nav>
  </header>
</div>
<div class="">
  <center><h2><br>แก้ไขข้อมูลยา</h2>
    <table style="width:90%">
    <tr>
      <th>รหัสยา</th>
      <th>ชื่อยาสามัญ</th>
      <th>แก้ไขข้อมูล</th>
    </tr>
    <?php
    $Query = mysqli_query($conn, "select * from medicine");
    while ($arr = mysqli_fetch_array($Query)) {
        $autoid = $arr['medicine_id'];
    ?>
    <tr id="tbb">
      <td><?php echo $arr["medicine_id"]; ?></td>
      <td><?php echo $arr["medicine_name"]; ?></td>
      <td><a href="showEditmdn.php?medicine_id=<?=$arr["medicine_id"]; ?>">แก้ไข</a></td>
    </tr>
      <?php } ?>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- <script type="text/javascript">
  $(document).ready(function() {
  $("#add").click(function(e){
    e.preventDefault();
      });

      $('#medicine_id').on('change', function() {
        //alert( $(this).text());
        $('#medicine_name').val($(this).text());
        //$(this).text("");
      })


      $(".js-example-basic-single").select2({
                  ajax: {
                      dataType: 'json',
                      url: 'PHP/getMedicine.php',
                      delay: 250,
                      data: function (params) {
                          return {
                              //alert(params.term);
                              q: params.term,
                              page: params.page
                          };
                      },
                      processResults: function (data, params) {
                          //alert(data);
                          params.page = params.page || 1;
                          return {
                              results: data,
                              pagination: {
                                  more: (params.page * 30) < data.total_count
                              }
                          };
                      }
                  }
              });
      });
  </script> -->
</body>
</html>
