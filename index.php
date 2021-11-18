<?php include('functions.php'); include('functions1.php');?>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" href="realtime.jpg" />
    <title>GA Realtime</title>
    <style type="text/css">
      *{
        margin: 0;
        padding: 0;
      }
      body{
        margin-bottom: 20px;
        background: aliceblue;
      }
      .section{
        background: #fff;
      }
      .count{
        font-size: 36px;
      }
      .progress-label {
          text-transform: uppercase;
          font-size: 0.8em;
          font-weight: bold;
          margin: 5px 0 8px;
      }
      .label-success, .label-warning, .label-danger {
          background: transparent;
          color: #444;
          display: inline-block;
          font-size: 1em;
          line-height: 1.1em;
          font-weight: bold;
          font-family: arial;
          padding: 0px 10px;
      }
      .progress-bar-success, .label-success:before {
        background-color: #50b432;
      }
      .progress-bar-warning, .label-warning:before {
        background-color: #ed561b;
      }
      .progress-bar-danger, .label-danger:before {
        background-color: #058dc7;
      }
      .progress-label .label:before{
        content:'';
        width:10px; 
        height:10px;
        float:left; 
        margin-right:3px;
      }
      .progress-label{
        text-transform:uppercase;
        font-size:0.8em; 
        font-weight:bold;
        margin:5px 0 8px;
      }
      .no-pad{
        padding: 0px;
      }
      .open-link:hover{
        cursor: pointer;
        background: #ddd;
      }
      .table{
        margin-bottom: 0px;
      }
      .r {
        text-align: center;
        font-size: 20px;
        padding: 10px;
      }
      body h1{
        text-align: center;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
    "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      }

    </style>
  </head>
  <body>
    <h1>GA Live</h1>
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-8">
          <table class="section table table-striped table-bordered">
            <thead>
              <tr>
                <th>Active Pages</th>
                <th>Active Users</th>
              </tr>
            </thead>
            <tbody class="pages-content">
            </tbody>
          </table>
        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-header">
                Right Now
              </div>
              <div class="card-body">
                <div class="text-center">
                  <h1>
                                  <div class="users-content count" id="active-users">0</div>
                        </h1>
                        <small>Active Users on Site</small>
                      </div>
                      <div id="devices" class="devices-content mt-4">
                      </div>
              </div>
          </div>
          <div class="card mt-3">
              <div class="card-body no-pad">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Source</th>
                      <th>Users</th>
                    </tr>
                  </thead>
                  <tbody class="sources-content">
                  </tbody>
                </table>
              </div>
          </div>
          <div class="card mt-3">
              <div class="card-body no-pad">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Country</th>
                      <th>Users</th>
                    </tr>
                  </thead>
                  <tbody class="countries-content">
                  </tbody>
                </table>
              </div>
          </div>
          <div class="card mt-3">
              <div class="card-body no-pad">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Browsers</th>
                      <th>Users</th>
                    </tr>
                  </thead>
                  <tbody class="browsers-content">
                  </tbody>
                </table>
              </div>
          </div>
          <div class="card mt-3">
              <div class="card-body no-pad">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>OS</th>
                      <th>Users</th>
                    </tr>
                  </thead>
                  <tbody class="os-content">
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function refreshData(){
        getData('pages');
        getData('users');
        getData('devices');
        getData('sources');
        getData('countries');
        getData('os');
        getData('browsers');
      }
      refreshData();
      //fetch live data every 3 seconds
      setInterval(function(){
        refreshData();
      },3000);
      function getData(action){
        $.ajax({
          url:'ajax.php?action='+action,
          type:'get',
          success:function(res){
            $("."+action+"-content").html(res);
          }
        });
      }
      $(document).on('click','.open-link',function(){
        link = '<?php echo DOMAIN;?>'+$(this).attr('data-link');
        window.open(link, '_blank');
      });
    </script>
     <div class="container">
       <h1>GA report</h1>
      <iframe
        width="600"
        height="371"
        seamless
        frameborder="0"
        scrolling="no"
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=1935231280&amp;format=interactive"
      ></iframe>

      <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=1223245171&amp;format=interactive"></iframe>
        

      <iframe
        width="600"
        height="371"
        seamless
        frameborder="0"
        scrolling="no"
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=885257089&amp;format=interactive"
      ></iframe>

      <iframe
        width="600"
        height="371"
        seamless
        frameborder="0"
        scrolling="no"
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=52852018&amp;format=interactive"
      ></iframe>

      <iframe
        width="600"
        height="371"
        seamless
        frameborder="0"
        scrolling="no"
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=801906656&amp;format=interactive"
      ></iframe>

      <iframe
        width="600"
        height="371"
        seamless
        frameborder="0"
        scrolling="no"
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=691615503&amp;format=interactive"
      ></iframe>

      <iframe
        width="600"
        height="371"
        seamless
        frameborder="0"
        scrolling="no"
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=1965466398&amp;format=interactive"
      ></iframe>

      <iframe
        width="600"
        height="371"
        seamless
        frameborder="0"
        scrolling="no"
        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDaprZLIZujfaoxAMwviWjxGBVRs0eNp8GaePtYETc1XubmT-Z_3d44EY9jB_Es8x3NPCCz-XlZGq9/pubchart?oid=1986469875&amp;format=interactive"
      ></iframe>
    </div>
    <div class="r">
      Google Analytics Report On
      <a href="https://e-commerce-jay.herokuapp.com/index.html" target="_blank"
        >link.</a
      >
    </div>
  </body>
</html>
