<html>
<head>
  <title>Admin Page</title>
</head>
<body>
  Welcome to Admin Page! <br>
  <table border="1" style="width: 300px">
      <tbody>
        <tr>
          <td> &nbsp;Title (Thai)</td>
          <td>{{$Book->Title1}}</td>
        </tr>

        <tr>
          <td> &nbsp;Title (English)</td>
          <td>{{$Book->Title2}}</td>
        </tr>

        <tr>
          <td>&nbsp;Subject</td>
          <td>{{$Book->Subject}}</td>
        </tr>
        <tr>

          <tr>
            <td>&nbsp;Author</td>
            <td>{{$Book->Author}}</td>
          </tr>
          <tr>

            <tr>
              <td>&nbsp;Publishing</td>
              <td>{{$Book->Publishing}}</td>
            </tr>
            <tr>

              <tr>
                <td>&nbsp;Edition</td>
                <td>{{$Book->Edition}}</td>
              </tr>
              <tr>

                <tr>
                  <td>&nbsp;Year</td>
                  <td>{{$Book->Year}}</td>
                </tr>

                <tr>
                  <td>&nbsp;Detail</td>
                  <td>{{$Book->Detail}}</td>
                </tr>

                <tr>
                  <td>&nbsp;ISBN/ISSN</td>
                  <td>{{$Book->ISBN}}</td>
                </tr>

                <tr>
                  <td>&nbsp;Call Number</td>
                  <td>{{$Book->CallNum}}</td>
                </tr>

                <tr>
                  <td>&nbsp;Type</td>
                  <td>{{$Book->Type}}</td>
                </tr>

                <tr>
                  <td>&nbsp;SubType</td>
                  <td>{{$Book->SubType}}</td>
                </tr>

                <tr>
                  <td> &nbsp;Status</td>
                  <td>{{$Book->Status}}</td>
                </tr>
              </tbody>
            </table>
        </body>
        </html>