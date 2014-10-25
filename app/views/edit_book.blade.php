<html>
<head>
  <title>Edit Profile</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
  <form name="form1" method="post" action="{{ url('/book/save_edit')}}">
    Edit Profile! <br>
    <table width="400" border="1" style="width: 400px">
      <tbody>
        <tr>
          <td width="125"> &nbsp;BookID</td>
          <td width="180"><input name="txtBookID" id="txtBookID" type="text" value="{{$Book->id}}"</td>
        </tr>

        <tr>
          <td> &nbsp;Title (Thai)</td>
          <td><input name="txtNameThai" type="text" id="txtNameThai" value="{{$Book->Title1}}"></td>
        </tr>

        <tr>
          <td> &nbsp;Title (English)</td>
          <td><input name="txtNameEng" type="text" id="txtNameEng" value="{{$Book->Title2}}">
          </td>
        </tr>

        <tr>
          <td>&nbsp;Subject</td>
          <td><input name="txtSubject" type="text" id="txtSubject" value="{{$Book->Subject}}"></td>
        </tr>
        <tr>

          <tr>
            <td>&nbsp;Author</td>
            <td><input name="txtAuthor" type="text" id="txtAuthor" value="{{$Book->Author}}"></td>
          </tr>
          <tr>

            <tr>
              <td>&nbsp;Publishing</td>
              <td><input name="txtPublishing" type="text" id="txtPublishing" value="{{$Book->Publishing}}"></td>
            </tr>
            <tr>

              <tr>
                <td>&nbsp;Edition</td>
                <td><input name="txtEdition" type="text" id="txtEdition" value="{{$Book->Edition}}"></td>
              </tr>
              <tr>

                <tr>
                  <td>&nbsp;Year</td>
                  <td><input name="txtYear" type="text" id="txtYear" value="{{$Book->Year}}"></td>
                </tr>

                <tr>
                  <td>&nbsp;Detail</td>
                  <td><input name="txtDetail" type="text" id="txtDetail" value="{{$Book->Detail}}"></td>
                </tr>

                <tr>
                  <td>&nbsp;ISBN/ISSN</td>
                  <td><input name="txtISBN" type="text" id="txtISBN" value="{{$Book->ISBN}}"></td>
                </tr>

                <tr>
                  <td>&nbsp;Call Number</td>
                  <td><input name="txtCallNum" type="text" id="txtCallNum" value="{{$Book->CallNum}}"></td>
                </tr>

                <tr>
                  <td>&nbsp;Type</td>
                  <td><input name="ddlType" type="text" id="ddlType" value="{{$Book->Type}}"></td>
                </tr>

                <tr>
                  <td>&nbsp;SubType</td>
                  <td><input name="ddlSubType" type="text" id="ddlSubType" value="{{$Book->SubType}}"></td>
                </tr>

                <tr>
                  <td> &nbsp;Status</td>
                  <td>{{$Book->Status}}</td>
                </tr>

              </tbody>
            </table>
            <br>
            <input type="submit" name="Submit" value="Save">
          </form>
        </body>
        </html>