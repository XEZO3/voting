<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        header {
  background-color: transparent;
  color: #fff;
  text-align: center;
  height: 60px;
}
footer {
  z-index: 11;
  background-color:transparent;
  color: #fff;
  text-align: center;
  padding: 10px 0;
  position:static;
  bottom: 0;
  width: 100%;
}
body{
  background-image: url("{{asset('images/theme.png')}}");
  height: 100vh;
  background-repeat: no-repeat;
  object-fit: cover;
  background-size: cover;
}
    </style>
</head>
<body>
  <script>
    // Function to check localStorage when the page loads
    // window.onload = function() {        
    //         if(localStorage.getItem('csrt')){
    //           disable();
    //         }        
    // };
</script>
    <header>
       <img src="{{asset('images/logo.png')}}" style="width: 70px;height:70px;float:right;margin-right:8px">
      </header>         
@yield('content')

<footer style="color: #5C385A" class="mt-5">
    <p>&copy; 2024 مقرئ الاردنية</p>
    {{-- <p>developed By: ezaldeen.alayed@gmail.com</p> --}}
  </footer>

</body>
</html>