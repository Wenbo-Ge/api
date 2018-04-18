<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rest API Client Side Demo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Rest API Client Side Demo</h2>
  <!-- <form class="form-inline" action="" method="POST"> -->
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" id="input_name" placeholder="Enter Product Name" required/>
    </div>
    <button type="submit" name="submit" class="btn btn-default" id="submit" onclick="search()">Submit</button>
  <!-- </form> -->
  <div class="content"></div>
  <script type="text/javascript">

    // $(document).ready(function(){

    //   $('#submit').click(function(){
    //     var search=$('#input_name').val();
    //     console.log(search);
    //   })
    // })
    // function search(){
    //     var search=$('#input_name').val();
    //     console.log(search);
    //     $.get(
    //         'http://devvm.com/api/api.php?name='+search, function(data){
    //           $('.content').html(data.database);
    //           // 要用data.来调用json数据，所以要在另一个php中生成json
    //         }
    //       )
        function search(){
        var search=$('#input_name').val();
        console.log(search);
        $.get(
            'http://devvm.com/api/product.php?name='+search, function(data){
              $('.content').html(data.database);
              // 要用data.来调用json数据，所以要在另一个php中生成json
            }
          )
        // $.post(
        //     'http://devvm.com/api/api.php',
        //     {name:search},
        //     function(data){
        //       $('.content').html(data.data);
        //     }
        //   )


    }
  </script>
  <p>&nbsp;</p>

</div>
</body>
</html>