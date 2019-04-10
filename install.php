<?php

$message = "Click <a href=\"install.php?install=yes\">here</a> to install Daily_Report_Interns.";
$db = 0;

if(isset($_REQUEST["install"]) && $_REQUEST["install"] == "yes")
{

    // Connection settings
    include("config.inc.php");

    // Connects to the server
    $link = new mysqli($server, $username, $password);

    // Checks the connection
    if($link->connect_error)
    {

        die("Connection failed: " . $link->connect_error);

    }

    // Checks if the database 'Daily_Report_interns' already exists
    if(!mysqli_select_db($link,"Daily_Report_Interns"))
    {

        // Creates the database 'Daily_Report_interns'
        $sql = "CREATE DATABASE IF NOT EXISTS Daily_Report_Interns";

        $recordset = $link->query($sql);

        if(!$recordset)
        {

            die("Error: " . $link->error);

        }

        // Selects the database 'Daily_Report_interns'
         mysqli_select_db($link,"Daily_Report_Interns");

           

        $sql = "CREATE TABLE IF NOT EXISTS admin (name varchar(100) DEFAULT NULL,password varchar(100) DEFAULT NULL)";
        #$sql.= "PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

        $recordset = $link->query($sql);             

        if(!$recordset)
        {

                die("Error: " . $link->error);

        }

        // Populates the table 'heroes' with the default users
        $sql = "INSERT INTO admin (name, password) VALUES ('admin', 'admin'),";
       // $sql.= "";
        $sql.= "('Ak', 'ak@321')";
       
        $recordset = $link->query($sql);

        if(!$recordset)
        {

                die("Error: " . $link->error);

        }
        $sql = "CREATE TABLE IF NOT EXISTS studup (name varchar(100) DEFAULT NULL,dt date DEFAULT NULL,CTime time DEFAULT NULL,message varchar(100) DEFAULT NULL)";
        #$sql.= "PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

        $recordset = $link->query($sql);             

        if(!$recordset)
        {

                die("Error: " . $link->error);

        }

        
        $recordset = $link->query($sql);

        if(!$recordset)
        {

                die("Error: " . $link->error);

        }


        $sql = "CREATE TABLE IF NOT EXISTS userregdata (name varchar(100) DEFAULT NULL,dt date DEFAULT NULL,address varchar(100) DEFAULT NULL)";
        #$sql.= "PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

        $recordset = $link->query($sql);             

        if(!$recordset)
        {

                die("Error: " . $link->error);

        }

      $recordset = $link->query($sql);

        if(!$recordset)
        {

                die("Error: " . $link->error);

        }

        
        
        $message = "Daily_Report_Interns has been installed Successfully!";

    }

    else
    {

        $message = "The Daily_Report_Interns Database already exists...";

    }

    $db = 1;

    $link->close();

}

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter">-->
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />


<script src="js/html5.js"></script>

<title>Installation</title>

</head>

<body>



<div id="menu">

    <table>

        <tr>
        <?php

        if($db == 1)

        {

        ?>
           <?php

        }
        else
        {

        ?>
 
           
        <?php

        }
  
        ?>
        </tr>

    </table>

</div> 

<div id="main">

    <h1>Installation</h1>

    <p><?php echo $message?></p>

</div>
    


</body>

</html>