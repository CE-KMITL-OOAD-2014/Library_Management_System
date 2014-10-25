<html>
<head>
  <title>Admin Page</title>
</head>
<body>
  Welcome to Admin Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197">{{$User->Username}}</td>
      </tr>

      <tr>
        <td> &nbsp;Name</td>
        <td>{{$User->Name}}</td>
      </tr>

      <tr>
        <td> &nbsp;Surname</td>
        <td>{{$User->Surname}}</td>
      </tr>

      <tr>
        <td> &nbsp;Address</td>
        <td>{{$User->Address}}</td>
      </tr>

      <tr>
        <td> &nbsp;E-mail</td>
        <td>{{$User->Email}}</td>
      </tr>

      <tr>
        <td> &nbsp;TelPhone</td>
        <td>{{$User->Phone}}</td>
      </tr>
      <tr>
        <td> &nbsp;Status</td>
        <td>{{$User->Status}}</td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="{{ url('/person/edit/') }}">Edit Profile</a><br>
  <br>
  <a href="{{ url('/book/register') }}">Register Book</a><br>
  <br>
  <a href="{{ url('/person/logout') }}">Logout</a>
</body>
</html>