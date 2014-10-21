<!DOCTYPE html">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once('MySqlConnect.php');
        $conn = new MySqlConn;
        $conn->connect();  

        $sql = 'select * from member';
        $results = new MySqlConn;
        $results->getSql($conn, $sql);
        foreach($results as $row){
        echo "<div style='width:400px;margin-left:200px;'>";    
        echo "<h3>".$row['title']."</h3>";
        echo $row['member'];
        echo "</div>"; 
        }     
        ?>
    </body>
</html>