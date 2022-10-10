<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiona Ampofo Portfolio</title>
    <link rel="stylesheet" href="reset.css" type="text/css"/>
    <link rel="stylesheet" href="index_style.css" type="text/css"/>

</head>
<body>

    <header>
        <div class="dropdown">
            <a href="#" class="menu-btn"><span>≡</span></a>
            <!--dropdown list-->
            <nav class="menu-content">
                <ul>
                    <li><a href="#abt-me">About</a></li>
                    <li><a href="#exp">Experience</a></li>
                    <li><a href="edu">Education</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#port">Portfolio</a></li>
                    <?php
                        //only give logged in users ability to add Post
                        session_start();

                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                            echo '<li><a href="addPost.html">Add Post to Blog</a></li>';
                        }
                    ?>
                    
                    <li><a href="viewBlog.php">View Blog</a></li>
                    <li><a href="#contact">Contact me!</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                </ul>
            </nav>
        </div>

        <figure>
            <img src="logo.png" alt="Fiona Ampofo Logo" width="100px">
        </figure>
        <h1>Fiona Ampofo</h1>
    </header>

    <!--MAIN BODY SECTION/PAGES-->

    <!--Homepage-->
    <section id="homepage" class="page-size">

        <div class="welcome-msg">
            <?php
                //if the user inputs the incorrect details
                $_SESSION['failed_login'] = $_GET['LogIn'] ?? "";

                if(isset($_SESSION['name'])){
                    echo "<h1>Welcome " . $_SESSION['name'] . "</h1>";
                }
                else{
                    //show the login button and standard message
                    echo   '<h1>Hello World!</h1>
                            <!--login button-->
                            <aside class="form-area">
                                <!---->
                                <input type="checkbox" id ="show">
                                <label for="show" class="show-btn">Login</label>

                                    <!--CREATION OF FORM-->
                                    <div class="form-display">
                                        <!--close button-->
                                        <label for="show" class="close-btn fas fa-times" title="close">x</label>
                                        
                                        <h3>Login Form</h3>
                                        <form action="loginForm.php" method="post">
                                            <div class="data">
                                                <label for="name"><b>Username</b></label>
                                                <input type="text" name="name" required><br>
                                            </div>

                                            <div class="data">
                                                <label for="psw"><b>Password</b></label>
                                                <input type="password" name="psw" minlength="3" required><br>
                                            </div>

                                            <br>
                                            <div id="error_msg">' . $_SESSION['failed_login'] .'</div>
                                            <br>
                                            <button type="submit" id="inner-btn">LOGIN</button>
                                        </form>
                                    </div>  
                                <!--END OF FORM CREATION-->
                            </aside> 
                            ';
                }
            ?> 
        </div>  

         
    </section>


    <!--SECOND PAGE-->
        <!--About myself-->
    <section id="pg-2" class="page-size">
        <div id="abt-me">
            <h2>About Myself</h2><hr>
            <div id="me">
                <p>
                    I am a Computer Science Undergraduate at QMUL. 
                    I am intrigued by Korean culture and enjoy learning more about it and the language. 
                    Being with diverse people and being able to share and discuss a range of topic excites me. 
                    I am also interested by the advancements of technology and the future possibilities with it. 
                    I am currently intrigued by AR and UI/UX Design.                
                </p>
            </div>
            <figure  id="main-pic">
                <img src="my_pic.jpg" alt="Error. Image cannot be displayed." width="200px">
            </figure>
        </div>
    </section>


    <!--THIRD PAGE-->
    <section id="pg-3" class="page-size">
            <!--Education-->
            <div id="edu">
                <h1>Education</h1>

                <div class="content">
                    <h4>2021 - 2025</h4>
                    <p>
                        <br><br>Queen Mary University of London<br><br>
                        <i>BSc Computer Science with Year Abroad.</i>
                    </p>
                </div>
                <div class="content">
                    <h4>2023 - 2024</h4>
                    <p>
                        <br><br>Yonsei University<br><br>
                        <i>Year Abroad in Seoul, South Korea.</i>
                    </p>
                </div>
                <div class="content">
                    <h4>2018 - 2019</h4>
                    <p>
                        <br><br>Enfield County School for Girls<br><br>
                        <i>Completed A Levels: Biology, Mathematics and Chemistry.</i>
                    </p>
                </div>
            </div>
    </section>


    <!--FOURTH PAGE-->
    <!--experience-->
    <section id="pg-4">
        <div id="exp">
            <h2>Experience</h2><hr>
            <div class="inner-txt">
                <p>Tata Consultancy Services Digital Explorers Bursary 2021-2022 - TCS (Jan – June 2022)</p>
                <ul>
                    <li>Awarded a bursary of £3,000 to support the first year of my undergraduate studies as a female Computer Science student.</li>
                    <li>Actively engaged and participated in weekly workshops with TCS professionals.</li>
                </ul>

                <p>Mobile Augmented Reality Story Walk - QMUL (February 2022)</p>
                <ul>
                    <li>Participated in an AR Research Study.</li>
                    <li>Held discussions about the use of AR and technologies used in the study.</li>
                </ul>

                <p>Code in Place 2021 - Stanford University (Apr – May 2021)</p>
                <ul>
                <li>One of the participants out of 50K applicants to be accepted.
                <li>Completed a 5-week introductory online Python programming course based on material from the first half of Stanford’s introductory programming course, CS106A.
                </ul>

                <p>SuaCode 2.0 Introduction to Programming course - Nsesa Foundation (May - July 2020)</p>
                <ul>
                    <li>Learnt the basics of JavaScript and utilized my knowledge in successfully making a ping-pong game
                </ul>

                <p>Summer 2020 Quantum Computing Program – The Coding School (July 2020)</p>
                <ul>
                    <li>Received a scholarship to participate in a Quantum Computer Campus (which utilised Python) supported by Google, IBM and MIT.
                </ul>
            </div>
        </div>
       
        <br>
        <br>

    <!--skills-->
        <div id="skills">
        <h2>Skills</h2><hr>
            <span class="skill-box box1">Java</span>
            <span class="skill-box box1">HTML</span>
            <span class="skill-box box1">JavaScript</span>
            <span class="skill-box box1">Python</span>
            <span class="skill-box box1">CSS</span>
            <span class="skill-box box2">Public Speaking</span>
            <span class="skill-box box2">Self-motivated</span>
            <span class="skill-box box2">Interpersonal Skills</span>
            <span class="skill-box box2">Quick Learner</span>
            <span class="skill-box box2">Creative</span>
            <span class="skill-box box2">Team Player</span>
            <span class="skill-box box3">English - Native</span>
            <span class="skill-box box3">Korean - Intermediate</span>
            <span class="skill-box box3">Twi(Akan) - Intermediate</span>
        </div>     

    </section>


    <!--FIFTH PAGE-->
    <section id="pg-5"  class="page-size">
        <div id="port">
            <h1>Portfolio</h1>
            <ul>
                <li id="mod1"><a href="https://github.com/Akyiaa/ecs417/tree/dependabot/composer/composer/composer-1.10.23/webroot" target="_blank">ECS417U -  Fundamentals of Web Technology</a></li>
                <li id="mod2">ECS414U - Object-Oriented Programming</li>
                <li id="mod3"><a href="Ampofo%20MiniProj7.html" target="_blank">ECS401U - Procedural Programming</a></li>
    
            </ul>
        </div>
    </section>


    <!--FOOTER-->
    <footer>
        <hr>
        <nav id="contact">
            <a href ="mailto://u.f.a.ampofo@se21.qmul.ac.uk" target="_blank">Email</a> //
            <a href ="https://www.linkedin.com/in/fiona-ampofo/" target="_blank">LinkedIn</a> 
        </nav>

        <p><i>Copyright Ⓒ 2022 Fiona Akyiaa Ampofo</i></p>
        <hr>
    </footer>
    
</body>
</html>