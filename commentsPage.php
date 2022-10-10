<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post/View Comments</title>
    <link rel="stylesheet" href="reset.css" type="text/css"/>
    <link rel="stylesheet" href="commentsPage_style.css" type="text/css"/>
</head>
<body>
    
    <header>
        <figure>
            <img src="logo.png" alt="Fiona Ampofo Logo" width="100px">
        </figure>
        <h1>Post and/or View Comments</h1>
    </header>


    <?php 
        session_start();

        if(isset($_SESSION['cmt_name'])){
            echo "<h2>Welcome " . $_SESSION['cmt_name'] . "!</h2>";
        }
        else{echo "<h2 class='wlcm'>not logged in...</h2>";}
        
        //if user attempts to delete a comment and is not admin
        //$adminOnly = 
        
        $_SESSION['Admin'] = $_GET['adminOnly'] ?? "";
        echo '<h3 id="del_msg">' . $_SESSION['Admin'] . '</h3>';
    ?>

    <form id="comt_form" action="insertComment.php" method="post" onsubmit="checkIfEmpty()">
        <div class="data_2">
            <!--USER TEXT-->
            <label for="comment">Comment:</label><br>
            <textarea id="cmt" name="comment" placeholder="Add your comment!"></textarea>
        </div>

        <div id="blog-btn">
            <!--Post & Clear Form Buttons-->
            <button type="submit" value="Submit" id="sub">SUBMIT</button>
            <button type="reset" value="Reset" id="clear">CLEAR</button>
        </div>           
    </form> 


    <script>
        //check if the fields are empty and prevent default
        function checkIfEmpty(){
            var cmt = document.getElementById('cmt').value;

            if(cmt == "")
            {
                document.getElementById('cmt').style.background = "yellow";//highlight blank area yellow
                event.preventDefault();
                window.setTimeout("changeColor('cmt')", 2000);
            }
        }

        //changing back to normal colour after 2 seconds
        function changeColor(id_name){
            document.getElementById(id_name).style.background = "white";
        }
    </script>



    <?php
        //here display comments that match the specific posts' id
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "miniproject";

        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_select_db($conn, $dbname);

        //user's input
        $postID = $_SESSION['post_id'] ?? "";
        //arrays to sort comments
        $commentArray = array();
        $totalComts = array();
        $sortId = array();

        //get the comments which have the same id as the postID
        $query = "SELECT * FROM COMMENTS WHERE postID = '$postID' ";
        $result = mysqli_query($conn, $query) or die("Unable to retrieve comment because : " . mysqli_error());

        //fetch all info to display
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            $dt = $row['DateTime']; 
            $author = $row['author']; 
            $comment = $row['comment'];

            //put in array
            $commentArray = array("i" => "$id", "d" => "$dt", "a" => "$author", "c" => "$comment");
            $totalComts[] = $commentArray;//put all arrays into bigger array

            //add Ids of comments to array
            $sortId[] = $id;
        }

        $conn->close();

        
        //order array to display most recent comment
        rsort($sortId);//sort array from largest to lowest value
        $newTotalCmts = array();
        for($x = 0; $x < count($sortId); $x++){
            foreach($totalComts as $commentArray)
            {           
                if($sortId[$x] == $commentArray['i'])
                {
                    $newTotalCmts[] = $commentArray;
                }
            }
        }


        //display array contents
        if($newTotalCmts != null){
            foreach($newTotalCmts as $commentArray){
                echo "<div class ='cmt_post'>
                        <time>" . $commentArray['d'] . "   BST </time>
                        <h3>" . $commentArray['a'] . "</h3>
                        <br>
                        <p>" . $commentArray['c'] . "</p>
                      </div>
                      <div class='del'><a href='deleteComment.php?uniqueID=" . $commentArray['i'] ."'>DELETE (Admin ONLY)</a></div>
                     ";
            }
        }
        //echo "Id is ";
        //print_r($_SESSION['post_id']);
    ?>

    <!--FOOTER-->
    <footer>
        <nav id="contact">
            <div id="backPages">
                <a id="log-out" href ="logoutBlog.php"> LOG OUT </a><!--Goes back to viewBlog but logs out-->
                <a href="viewBlog.php">BACK TO VIEW BLOG</a><!--Go to viewBlog without logging out-->
            </div>
            <br><br>
            <hr>
            <a href ="mailto://u.f.a.ampofo@se21.qmul.ac.uk" target="_blank"> Email </a> //
            <a href ="https://www.linkedin.com/in/fiona-ampofo/" target="_blank"> LinkedIn </a> 
        </nav>

        <p><i>Copyright Ⓒ 2022 Fiona Akyiaa Ampofo</i></p>
        <hr>
    </footer>

</body>
</html>