<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alert!! - ระบบจัดการห้องสมุด (Library Management System)</title>
  </head>
  <body>
  	<script>
  		alert("Now number of books is {{$Book}}");
  		location = "{{url('/book/list_book')}}";
  	</script>
  </body>
</html>