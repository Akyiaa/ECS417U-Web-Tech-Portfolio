<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog</title>
    <link rel="stylesheet" href="reset.css" type="text/css"/>
    <link rel="stylesheet" href="viewBlog_style.css" type="text/css"/>
</head>
<body>

    <header>
        <div class="dropdown">
            <a href="#" class="menu-btn"><span>≡</span></a>
            <!--dropdown list-->
            <nav class="menu-content">
                <ul>
                    <li><a href="index.php">Home Page</a></li>
                    <li><a href="addPost.html">Add a Post</a></li>
                    <li><a href="#contact">Contact me!</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                </ul>
            </nav>
        </div>

        <figure>
            <img src="logo.png" alt="Fiona Ampofo Logo" width="100px">
        </figure>
        <h1 id="blog">Blog</h1>
    </header>

    <?php
    
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "miniproject";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $query = "SELECT * FROM posts";
        $postings = array();
        $multi = array();
        $idSort = array();

        $result = mysqli_query($conn, $query) or die("Unable to verify user because : " . mysqli_error());

        while ($row = $result->fetch_assoc()) {
            $id = $row['ID'];
            $date_time = $row['DATETIME'];
            $t = $row['title'];
            $b = $row['body'];

            //most recent would be largest id
            $postings = array("i" => "$id", "d" => "$date_time", "t" => "$t", "b" => "$b");
            //$postings = array("$id", "$date_time", "$t", "$b");
            $multi[] = $postings;

            //sort id - SORT IT FROM LARGEST TO SMALLERST
            $idSort[] = $id;
        }

        $conn->close();

        //order array to display most recent entry
        rsort($idSort);//sort ids from largest to smallest value
        $newMulti = array();
        for($num = 0; $num < count($idSort); $num++){
            foreach($multi as $postings)
            {           
                if($idSort[$num] == $postings['i'])
                {
                    $newMulti[] = $postings;
                }
            }
        }

        //print out contents of newly ordered array
        for($x = 0; $x < count($newMulti); $x++)
        {
            $id_num = $newMulti[$x]['i'];

            echo "<div class ='post'>
                    <time>" . $newMulti[$x]['d'] . "   BST </time>
                    <h3>" . $newMulti[$x]['t'] . "</h3>
                    <br>
                    <p>" . $newMulti[$x]['b'] . "</p>
                </div>
                <nav class='entry_nav'>
                    <a id= '" . $id_num ." ' href='commentLogin.php?idNum=" . $id_num ."'>ADD/VIEW COMMENTS</a>
                    <a href='deleteEntry.php?idNum=" . $id_num ."'>DELETE ENTRY (Admin ONLY)</a>
                </nav>
                "; 
        }

        //print_r($newMulti);
    ?>        

</body>
</html>