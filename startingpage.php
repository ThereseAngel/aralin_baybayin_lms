<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aralin Baybayin</title>
    <link rel="stylesheet" href="style.css" />
    <script src="scriptbaybay.js"></script>
  </head>
  <body>
    
    <!--Navbar-->
    <nav>
      <div class="navbar">
        <i class="bx bx-menu"></i>
        <div class="logo">
          <a href="startingpage.php"><img src="images/logo_title.png" height="80" /></a>
        </div>
        <div class="nav-links">
          <div class="sidebar-logo">
            <span class="logo-name"></span>
            <i class="bx bx-x"></i>
          </div>
          <ul class="links">
            <li><a href="login.php">LOGIN</a></li>
            <li>
              <a href="signup.php">SIGN-UP</a>
            </li>
            <li><a href="#about">ABOUT US</a></li>
            <li><a href="#footer">CONTACT US</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!--end of navbar-->

    <!--Header Aralin Baybayin-->
    <div class="title">
      <p id="title">Aralin Baybayin</p>
    </div>

    <!--Graphics Left-->
    <div class="introduction-about">
      <img src="images/circle.png" />
    </div>

    <!-- Graphics Right-->
    <div class="graphics-container">
      <p><img src="images/aralin_baybayin.png" alt="Aralin Baybayin" /></p>
    </div>

    <!--Modernong Baybay-->
    <div class="modern">
      <textarea class="modernWord" placeholder="Baybayin" id="modernSpelling" oninput="modernToBaybayin()"></textarea>
      <!--Alert if letter is not recognized-->
      <div class="alert alert-secondary" id="unsupportedDiv" style="display: none">
        <p align="center">There are few letters that are not supported.</p>
      </div>

      <!-- Baybayin Translate-->
      <div class="translation">
        <textarea class="baybayin-display" placeholder="ᜊᜌ᜔ᜊᜌᜒᜈ᜔" id="baybay" oninput="baybayinToModern()"></textarea>
        <!--Button to copy-->
        <button class="button" id="copyBtn" onclick="copyToClp('baybay')">Copy</button>
      </div>
    </div>

    <!--About-->
    <div id="about">
      <div id="abt-title">About us<img id="book" src="images/book.png" alt="" />
      </div>
      <p id="about-content">
        Aralin Baybayin is a startup learning platform that aims to help
        Filipino teachers, students, and learners to explore and learn about the
        Philippine script called Baybayin. This platform will also have a typing
        converter system to convert desired words into Baybayin script. As
        online learning system has emerged, the proponents seize this
        opportunity to eliminate the inability to learn Baybayin and cultivate
        ancestral writing system alphabets in a way of having lessons and
        quizzes about Baybayin. This project is thriving forward to restore the
        long-forgotten culture and educate people specifically students and
        learners.
      </p>
    </div>

    <!--Footer-->
    <footer id="footer">
      <img id="logo-footer" src="images/logo.png" alt="logo" />
      <h5 id="saavedra-name">Therese Angel G. Saavedra</h5>
      <img id="phone-icon" src="images/phone-icon.png" alt="" height="30px" />
      <p id="saavedra-num">+639667612439</p>
      <br />
      <img id="mail-icon" src="images/mail-icon.png" alt="" height="30px" />
      <p id="saavedra-email">saavedra.srps@gmail.com</p>
      <br />
      <img id="loc-icon" src="images/loc-icon.png" alt="" height="30px" />
      <p id="saavedra-loc">34 Cupang, Bauan, Batangas</p>
      <div id="vertical-line1"></div>
      <div id="footer-karl" float="right">
        <h5 id="karl-name">Karl Marco G. Loristo</h5>
        <img id="phone-icon" src="images/phone-icon.png" alt="" height="30px" />
        <p id="karl-num">+639612648942</p>
        <br />
        <img id="mail-icon" src="images/mail-icon.png" alt="" height="30px" />
        <p id="karl-email">kmloristo@gmail.com</p>
        <br />
        <img id="loc-icon" src="images/loc-icon.png" alt="" height="30px" />
        <p id="karl-loc">1047 Samar st. Sampaloc Manila</p>
        <div id="vertical-line1"></div>
      </div>
      <div id="footer-jan">
        <h5 id="jan-name">Jan Aldrich S. Relox</h5>
        <img id="phone-icon" src="images/phone-icon.png" alt="" height="30px" />
        <p id="jan-num">+639275922198</p>
        <br />
        <img id="mail-icon" src="images/mail-icon.png" alt="" height="30px" />
        <p id="jan-email">janrelox40@gmail.com</p>
        <br />
        <img id="loc-icon" src="images/loc-icon.png" alt="" height="30px" />
        <p id="jan-loc">1004 Atis st., Punta, Sta. Ana, Manila</p>
      </div>
      <hr id="hr-footer" />
      <p id="end-footer">2022 Aralin Baybayin. All rights reserved.<span style="margin-left: 1000px"></span>
      <a href="privacypolicy.php">Privacy Policy</a>|<a href="termsofuse.php">Terms of Policy</a>
      </p>
    </footer>
  </body>
</html>
