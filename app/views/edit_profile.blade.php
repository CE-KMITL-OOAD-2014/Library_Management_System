<html>
<head>
  <title>Edit Profile</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
  <form name="form1" method="post" action="{{ url('/person/save_edit')}}">
    Edit Profile! <br>
    <table width="400" border="1" style="width: 400px">
      <tbody>
        <tr>
          <td width="125"> &nbsp;UserID</td>
          <td width="180"><input name="txtUserID" id="txtUserID" type="text" value="{{$User->id}}"></td>
        </tr>

        <tr>
          <td> &nbsp;Username</td>
          <td><input name="txtUsername" id="txtUsername" type="text" value="{{$User->Username}}"></td>
        </tr>

        <tr>
          <td> &nbsp;Password</td>
          <td><input name="txtPassword" type="password" id="txtPassword" value="{{$User->Password}}"></td>
        </tr>

        <tr>
          <td> &nbsp;Confirm Password</td>
          <td><input name="txtConPassword" type="password" id="txtConPassword" value="{{$User->Password}}">
          </td>
        </tr>

        <tr>
          <td>&nbsp;Name</td>
          <td><input name="txtName" type="text" id="txtName" value="{{$User->Name}}"></td>
        </tr>
        <tr>

          <tr>
            <td>&nbsp;Surname</td>
            <td><input name="txtSurName" type="text" id="txtSurName" value="{{$User->Surname}}"></td>
          </tr>
          <tr>

            <tr>
              <td>&nbsp;Address</td>
              <td><input name="txtAddress" type="text" id="txtAddress" value="{{$User->Address}}"></td>
            </tr>
            <tr>

              <tr>
                <td>&nbsp;E-mail</td>
                <td><input name="txtEmail" type="text" id="txtEmail" value="{{$User->Email}}"></td>
              </tr>
              <tr>

                <tr>
                  <td>&nbsp;TelPhone</td>
                  <td><input name="txtPhone" type="text" id="txtPhone" value="{{$User->Phone}}"></td>
                </tr>

                <tr>
                  <td> &nbsp;Status</td>
                  <td>{{$User->Status}}</td>
                </tr>

              </tbody>
            </table>
            <br>
            <input type="submit" name="Submit" value="Save">
          </form>
        </body>
        </html>