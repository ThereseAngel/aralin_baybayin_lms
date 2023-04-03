<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lessons</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <!--PHP to fetch student data-->
    <?php
      require "dbcon.php"; 
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from learner_data where learner_id = '".$_SESSION['userid']."'"); 
      while($data = mysqli_fetch_array($userData)){
    ?>

    <!--Navbar-->
    <nav>
      <div class="navbar">
        <i class="bx bx-menu"></i>
        <div class="logo">
          <a href="homepageLearner.php">AralinBaybayin</a>
        </div>
        <div class="nav-links">
          <div class="sidebar-logo">
            <span class="logo-name"></span>
            <i class="bx bx-x"></i>
          </div>
          <ul class="links">
            <li><a href="homepageLearner.php">HOME</a></li>
            <li><a href="gradesLearner.php">GRADES</a></li>
            <li>
            <a href="#"><?php echo $data['learner_name']; ?></a>
              <i class="bx bxs-chevron-down js-arrow arrow"></i>
              <ul class="js-sub-menu sub-menu">
                <li><a href="profileLearner.php">Profile</a></li>
                <li><a href="settingLearner.php">Settings</a></li>
                <li><a href="login.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br/>

    <!--Lessons All -->
    <!--Sidebar Lesson Buttons-->
    <div class="sidebar">
      <button id="lesson1" class="lessonButton">Lesson 1</button>
      <button id="lesson2" class="lessonButton" disabled>Lesson 2</button>
      <button id="lesson3" class="lessonButton" disabled>Lesson 3</button>
      <button id="quiz1" class="lessonButton" disabled>Quiz 1</button>
      <button id="lesson4" class="lessonButton" disabled>Lesson 4</button>
      <button id="lesson5" class="lessonButton" disabled>Lesson 5</button>
      <button id="quiz2" class="lessonButton" disabled>Quiz 2</button>
      <button id="lesson6" class="lessonButton" disabled>Lesson 6</button>
      <button id="lesson7" class="lessonButton" disabled>Lesson 7</button>
      <button id="lesson8" class="lessonButton" disabled>Lesson 8</button>
      <button id="quiz3" class="lessonButton" disabled>Quiz 3</button>
      <button id="lesson9" class="lessonButton" disabled>Lesson 9</button>
      <button id="lesson10" class="lessonButton" disabled>Lesson 10</button>
      <button id="finalExam" class="lessonButton" disabled>Final Exam</button>
    </div>

    <!--PHP to fetch student progress-->
    <?php
      require "dbcon.php"; 
      @session_start();
      $userID = $_SESSION['userid'];
      $userData = mysqli_query($db,"SELECT * from learner_progress where learner_id = '".$_SESSION['userid']."'");
      while($data = mysqli_fetch_array($userData)){
        $stats = $data['learner_status'];
        if($stats == "10"){
          echo "<script> window.onload = function() {lesson1();}; </script>";
        }
        elseif($stats == "20"){
          echo "<script> window.onload = function() {lesson2();}; </script>";
        }
        elseif($stats == "30"){
          echo "<script> window.onload = function() {lesson3();}; </script>";
        }
        elseif($stats == "40"){
          echo "<script> window.onload = function() {lesson4();}; </script>";
        }
        elseif($stats == "50"){
          echo "<script> window.onload = function() {lesson5();}; </script>";
        }
        elseif($stats == "60"){
          echo "<script> window.onload = function() {lesson6();}; </script>";
        }
        elseif($stats == "70"){
          echo "<script> window.onload = function() {lesson7();}; </script>";
        }
        elseif($stats == "80"){
          echo "<script> window.onload = function() {lesson8();}; </script>";
        }
        elseif($stats == "90"){
          echo "<script> window.onload = function() {lesson9();}; </script>";
        }
        elseif($stats == "95"){
          echo "<script> window.onload = function() {lesson10();}; </script>";
        }
        else{
          echo "<script> window.onload = function() {completed();}; </script>";
        }
    ?>

    <!--Lessons Container-->
    <div class="allLessons" id="allLessonscontainer">
      <!--Lesson 1-->
      <div class="lesson-content" id="lesson1Content" name="lesson1Content">
        <h1 style="text-align: center">Lesson 1</h1>
        <h1 style="text-align: center">A Brief History of the Filipino Language</h1>
        <h3>Pre-Colonial Era: Theories About Filipino Ancestors</h3>
        <p>
          According to various theories, the Philippines' ancestors were
          Malayo-Polynesians and Austronesians from the Eurasian continents who
          regularly traveled to the country to build homes, trade, and live when
          the archipelago was still connected to the archipelago by "land
          bridges." They also brought with them their Austronesian languages,
          beliefs, and traditions. According to theories, the inhabitants of the
          islands stayed in the archipelago for tens of thousands of years after
          the "land bridges" were cut or melted, and developed their own
          communities with leaders, beliefs, religions, and their own languages
          and writing systems. The melting of these land bridges didn't stop
          pre-colonial people from developing sailing and boats in order to
          migrate and travel to other islands. There are several ideas
          concerning Filipino ancestors' origins, but this one concentrates on
          their journey and the language they brought with them.
        </p>
        <br />
        <h3>Pre-Colonial Era: Foreign Trading</h3>
        <p>
          Then followed the pre-colonial era of foreign trade, when Chinese,
          Arabs, Indonesians, Malaysians, Indians, and other Asian countries
          traded goods and commodities with the Philippines, as well as their
          languages, beliefs, faiths, and way of life. Foreign trade with
          Borneo, Japan, and Thailand also contributed to the development of the
          language that most Filipinos speak today. They've taken words from all
          of these languages and adapted them to fit within the Filipino
          language. They have, however, maintained their languages and the
          differences amongst them.
        </p>
        <br />
        <h3>Colonial Era: Religion and Language</h3>
        <p>
          Spain claimed the Philippines as its own in the 16th century. The
          Spaniards who were successful in invading and establishing the country
          came from Mexico and North America, where they had previously invaded.
          <br /><br />
          The monarch dispatched a large number of friars and priests to teach
          the natives Christian Catholicism. The friars were first urged to
          acquire the local languages and dialects in addition to the Spanish
          language as a means of communication. The majority of the inhabitants
          absorbed Spanish colonial influences, like as food, names, religion,
          and, most notably, language. The Filipinos already had their own
          languages throughout the Spanish Era (1521-1898), but they took and
          adapted many words, phrases, and frequent sentences from the Spanish
          language that are still used today. Even though it changed around the
          use of English during the American era (1898-1946) and the Japanese
          era (1941-1945), Filipinos maintained the integrity of the Filipino
          language by distinguishing it from the two.The Americans were eager to
          teach English during their era (and its effectiveness is still
          prevalent today), yet they also imposed rules of not speaking or using
          native languages. When the During their time, the Americans were
          anxious to teach English, but they also set restrictions prohibiting
          the use of national languages. During the Japanese occupation of the
          country, they attempted to eliminate and outlaw English. Instead, they
          wanted the Japanese language to be taught, and the inhabitants to
          return to their own tongues.
        </p>
        <br />
        <h3>Post-Colonial Era: Shaping a National Identity</h3>
        <p>
          The wounds of hundreds of years of colonial and wartime consequences
          affected the entire nation, causing general amnesia of their roots, a
          lack of memory of who they once were, and a loss of knowledge of their
          past to aid them in the future. It was a difficult period, especially
          because the country is still split not only by its languages, but also
          by the principles that have evolved over time. Despite the rough path,
          many hoped to use reforms and resolutions to bring a fractured,
          bruised, and bleeding country together. The establishment of a
          national, standardized, and official language was one of these
          actions.
          <br /><br />
          The Philippines' national language is defined as Filipino. The
          Commission on the Filipino Language defines it as an official language
          of the country, alongside English, and as a standardized form of
          Tagalog, an Austronesian regional language widely spoken in the
          Philippines. The Commission is the official government entity
          entrusted with creating, conserving, and promoting the numerous native
          Philippine languages, as well as the official governing authority for
          the Filipino language.
          <br /><br />
          One common misunderstanding regarding Filipino is that it is the same
          as Tagalog. The national language of the Philippines is Filipino,
          which is derived from Tagalog. Filipino, on the other hand, is formed
          from a variety of languages spoken in the Philippines, particularly
          the major regional, indigenous, and ethnic languages. Almost everyone
          in the Philippines can communicate in Filipino, but they all speak a
          second, third, or even fourth language.
        </p>
        <br />
        <p>
          According to a 2015 consensus, there are 120 to 187 known languages
          where:
        </p>

        <table class="tablelesson">
          <tr class="tdborder">
            <td>75 are indigenous</td>
            <td>41 are institutional</td>
            <td>13 are in trouble</td>
          </tr>
          <tr class="tdborder">
            <td>8 are non-indigenous</td>
            <td>73 are developing</td>
            <td>11 are dying</td>
          </tr>
          <tr class="tdborder">
            <td>8 are major dialects</td>
            <td>43 are vigorous</td>
            <td>4 are extinct</td>
          </tr>
        </table>
        <p>
          More of its works feature languages from the Luzon, Visayas, and
          Mindanao Island groupings. It may appear confusing, but individuals in
          the past made care to do so in order to avoid possible future
          insurgencies, insurrections, and outcries that could result in areas
          of regional, and, in the worst-case scenario, nationwide civil war. To
          ensure that everyone in the Philippines contributes to the development
          of the national language, the commission is established, and the term
          Filipino is created to describe both the language and the people of
          the Philippines.
        </p>
        <img src="Images\Lesson1.png" width="500px" height="500px" />

        <div id="nextButton">
          <button class="button" id="nextButton1" type="submit" onclick="location.href='addprogressLearner.php'">Next</button>
        </div>
      </div>
      <!--End of Lesson 1-->
       
       

      <!--Lesson 2-->
      <div class="lesson-content" id="lesson2Content" name="lesson2Content">
        <h1 style="text-align: center">Lesson 2</h1>
        <h1 style="text-align: center">Baybayin or Alibata?</h1>
        <p>
          The first distinction between the two is the script family from which
          they are descended. Baybayin is a member of the brahmic writing
          family, whereas alibata, also known as alifbata, is a member of the
          abjad script family.
        </p>
        <br />
        <b>Brahmic</b>
        <p>
          Abugida writing systems make up a brahmic script. They are used in the
          form of Siddha throughout the Indian subcontinent, Southeast Asia, and
          parts of East Asia, including Japan.(Sanskrit text used in Japanese
          Buddhism).
        </p>
        <p>
          This is due to the pre-colonial Philippines' foreign trade and
          influence when Indians and Arabians were among the first to deal with
          native Filipinos.
        </p>
        <br />
        <b>Abjad</b>
        <br />
        <p>
          An abjad is a form of writing system in which each sign or glyph
          represents a consonant, leaving it up to the reader to infer or supply
          a suitable vowel. Arabic, Phoenician, Aramaic, and Hebrew are examples
          of abjad scripts or writing systems
        </p>
        <p>
          The older and more accurate term "baybayin" has been mentioned in
          several publications dating back to just after the Spanish
          colonization began and throughout the 17th and 18th centuries as the
          word used by the native population to refer to their writing system,
          which was dominant in most of northern Luzon.
        </p>

        <div id="nextButton">
          <button class="button" id="nextButton2" onclick="location.href='addprogressLearner.php'">Next</button>
        </div>
      </div>
      <!--End of lesson 2-->
  

      <!--Lesson3-->
      <div class="lesson-content" id="lesson3Content">
        <h1 style="text-align: center">Lesson 3</h1>
        <h1 style="text-align: center">What is Baybayin?</h1>
        <p>
          In verb form, the word Baybayin means "to spell" or "to write." It is
          one of the Philippines' old and systematic systems of writing employed
          by the Tagalog — a word derived from "taga-ilog," which implies
          individuals and/or communities who live near bodies of water. It also
          translates to "coast," "seaside," "syllables" in literal form and
          "alphabet" in noun form.
        </p>
        <p>
          The Spanish had a lot of information about Baybayin. It has been given
          the name Alibata by some, however this is inaccurate. Versoza's logic
          was flawed because no evidence of the baybayin has ever been
          discovered in that section of the Philippines, and it has no
          resemblance to the Arabic language. Furthermore, no ancient Southeast
          Asian alphabet matched the Arabic letter arrangement, and despite
          Versoza's connection to the word alibata, its absence from all
          historical sources suggests that it is a completely innovation. This
          word is not used by the author to allude to any old Philippine script.
        </p>
        <p>
          Hanunó'o, Buhid, Tagbanwa, the Kapampangan script, and the Bisaya
          script are modern Filipino scripts descended from Baybayin. Baybayin
          is one of a dozen or more Southeast Asian writing systems, nearly all
          of which are abugidas, in which any consonant is spoken with the
          inherent vowel a following it, with diacritical markings employed to
          denote additional vowels.
        </p>
        <br />
        <b>Origins</b>
        <p>
          Most people knew Baybayin, according to Spanish priest Pedro Chirino
          in 1604 and Antonio de Morga in 1609, and it was commonly used for
          personal letters, poetry, and other literary works. According to
          William Henry Scott, some datus from the 1590s were unable to sign
          affidavits or oaths, while witnesses in the 1620s were unable to sign
          land deeds. There is no information on when this level of literacy was
          originally achieved, nor is there any information on the history of
          the writing system. The origins of Baybayin are the subject of at
          least six theories.
        </p>
        <br />
        <b>Kawi</b>
        <p>
          Kawi is a Javanese word that was widely used throughout Maritime
          Southeast Asia. Laguna Copperplate Inscription.
        </p>
        <p>
          The Laguna Copperplate Inscription is the Philippines' oldest known
          written record. Butuan Ivory Seal
        </p>
        <p>
          It's a legal document with a date of Saka era 822 engraved on it,
          which corresponds to April 21, 900 AD Laguna Copperplate
          Inscription#cite note-bibingka-1. It was written in the Kawi script in
          a variety of Old Malay dialects, with several Sanskrit loanwords and a
          few non-Malay vocabulary parts whose origins are uncertain between Old
          Javanese and Old Tagalog. Since Kawi is the first attestation of
          writing on the Philippines, one idea suggests that Baybayin is
          descended from Kawi.
        </p>
        <p>
          The Butuan Ivory Seal features a second specimen of Kawi script,
          albeit it has not been dated.
        </p>
        <p>
          The "Calatagan Pot," a ceramic burial jar discovered in Batangas, is
          written with characters that are extremely similar to Baybayin and is
          thought to have been inscribed around the year 1500. 1300 years ago.
          Its validity, however, has yet to be established.
        </p>
        <br />
        <b>Old Sumatran “Malay” scripts</b>
        <p>
          Another theory proposes that Baybayin was derived from a script or
          script used to write one of the Malay languages. The Pallava script
          from Sumatra, in particular, dates from the 7th century.
        </p>
        <br />
        <b>Sulawesi</b>
        <p>
          Sulawese scripts such as Liboginese and/or Makassarese could have been
          adopted or borrowed and transformed into Baybayin.
        </p>
        <br />
        <b>Old Assamese</b>
        <p>
          Assamese is a dialect of the Eastern Nagari script, which is a
          forerunner of Devanagari. According to this theory, a variant of this
          script was brought to the Philippines via Bengal and evolved into
          Baybayin.
        </p>
        <br />
        <b>Cham</b>
        <p>
          Finally, an early Cham script from Champa—now in southern Vietnam and
          southeastern Cambodia—could have been adopted and transformed into
          Baybayin.
        </p>

        <div id="nextButton">
          <button class="button" id="nextButton3" onclick="location.href='learnerquiz1.php'">Next</button>
        </div>
      </div>
      <!--End of lesson 3-->
      
      <!-- Start of Quiz 1-->
      <div class="lesson-content" id="quiz1Content">
        <h1 >Quiz 1</h1>
        <div>
          <form method="POST" action="learnerquiz1.php">
            <input class="button" type="submit" value="Take Quiz 1" />
          </form>
        </div>
        <div id="nextButton">
          <button class="button">Next</button>
        </div>
      </div>
      
      <!--Lesson 4-->
      <div class="lesson-content" id="lesson4Content">
        <h1 style="text-align: center">Lesson 4</h1>
        <h1 style="text-align: center">The death of the script</h1>
        <p>
          The Spanish, according to one common theory, are to responsible for
          the script's extinction. While it's simple to blame them for
          everything, the Spanish are likely the source of the majority of the
          script's content. They helped keep the script alive by placing it in
          books and sending it overseas for safekeeping, using the double-edged
          sword of knowledge preservation and cultural elimination. Baybayin was
          included in the first book printed in the Philippines (debatable). In
          1593, the Doctrina Christiana was written as a tool for converting the
          indigenous people to Christianity. It was successful.There weren’t any
          mass burnings of any Baybayin manuscripts. The fact that we wrote on
          organic material such as bamboo, severely shortened the lifespan of
          writings.
        </p>

        <div id="nextButton">
          <button class="button" id="nextButton4" onclick="location.href='addprogressLearner.php'">Next</button>
        </div>
      </div>
      <!--End of lesson 4-->

      <!--Lesson 5-->
      <div class="lesson-content" id="lesson5Content">
        <h1 style="text-align: center">Lesson 5</h1>
        <h1 style="text-align: center">
          The Baybayin Movement: An Ancient Scripture’s History and Revival
        </h1>
        <p>
          With the passage of time, Baybayin and the modifications that came
          with it had become more of a memory that people had forgotten. With
          the new form of writing brought about because of colonization, people
          practiced it less. However, with the support of various artists and
          groups, Baybayin has begun to revive in the hearts of Filipinos.
          <br /><br />
          Because it is one of the purest forms of the Filipino language – which
          now includes roughly 131 government-recognized languages – baybayin
          plays a significant role in shaping the Filipino people's identity.
        </p>
        <p>
          In the year 2018, the House of Representatives of the Philippines
          recognized Baybayin to be the country's official writing system. The
          proposed "National Writing System Act" aims to increase public
          awareness and appreciation of the country's writing system. Its goal
          is to conserve and preserve Baybayin as a tool of Philippine culture
          that contributes to the nation's legacy and identity.
        </p>
        <br />
        <h4>
          A few of the significant people who have made great contributions to
          the revival of Baybayin are listed as follows:
        </h4>
        <br />
        <h2>Paul Morrow</h2>
        <p>
          Paul Morrow is a Canadian who is fascinated by Philippine culture. He
          created a collection of publications about Philippine history, the
          majority of which are written in the Filipino language. He'd published
          a few on Baybayin and uses his blog to give more in-depth knowledge of
          the Filipino language and culture.
        </p>
        <img
          src="Images\PMorrow.jpg"
          alt="Baybayin presentation, University of Wisconsin, April 2, 2011"
          width="500px"
          height="250px"
        />
        <p>
          He learned how to speak, interpret, and write the Filipino language
          while learning more about Filipino culture. After four years of
          gradual progress, Morrow took the initiative to stay in the
          Philippines for a five-month vacation. He learned far more about
          Filipino culture by engaging himself in the language than he could
          have learned in the four years he spent self-teaching.
        </p>
        <br />
        <h2>Bayani Art</h2>
        <p>
          The Bayani Art team, which comes from Tondo, Manila, and was raised in
          Oakland, California, uses their creativity and talent to create
          one-of-a-kind crafts to promote the ancient script, Baybayin, via
          their works of art.
        </p>
        <img
          src="Images\BayaniArt.jpg"
          alt="Photo by: bayaniart.com Jacob Ira of Bayani Art at Stanford University"
          width="500px"
          height="250px"
        />
        <p>
          Their purpose is to improve their community by presenting them with
          historical artifacts from their homeland. Despite transferring to a
          new place, Bayani Art brings their culture with them and uses their
          ability to express their respect and admiration for it.
        </p>
        <p>
          They provide a portion of their profits to non-profit organizations
          that assist Filipino youth.
        </p>
        <br />
        <h2>Kristian Kabuay</h2>
        <p>
          Kristian Kabuay, a Filipino artist located in San Francisco,
          California, uses his talent to promote Baybayin as a method of
          expressing his love and respect for his heritage. Baybayin is more
          than old scripture to Kabuay. He is able to enhance his ties with his
          Filipino identity through his work.
        </p>
        <img src="Images\KKabuay.jpg" width="500px" height="250px" />
        <p>
          He keeps the script alive by combining it into his numerous works on
          an online portfolio, which allows him to relive his Filipino memories
          and remember his roots.
        </p>
        <br />
        <h2>Taipan Lucero</h2>
        <p>
          Taipan Lucaero, a University of the Philippines cum laude graduate in
          Fine Arts, had found his way into the creative business to promote his
          work and abilities. As a result, he began working as a designer for a
          company in Kobe, Japan. From here, he learnt more about calligraphy
          and was inspired to return to the Philippines to form
          CalligraFilipino, an advocacy group for art and traditional writing.
        </p>
        <img src="Images\TLucero.jpg" width="500px" height="250px" />
        <p>
          He pursues his love through making various works of art, both locally
          and internationally, as well as presenting workshops and seminars
          around the world.
        </p>
        <br />
        <h2>Leo Emmanuel Castro</h2>
        <p>
          Leo Emmanuel Castro, the executive director of Sanghabi, a cultural
          organization dedicated to exploring and promoting Filipino culture,
          educates about Baybayin through various mediums and even makes bamboo
          crafts. He would also combine these two items on occasion.
        </p>
        <img src="Images\LeoCastro.jpg" width="500px" height="250px" />
        <p>
          He teaches people about the Baybayin script as a language, not just as
          a historical artifact. The methods he uses to resurrect Baybayin
          originate from his heart, allowing him to connect emotionally with the
          people he meets.
        </p>
        <br />
        <h2>Virgilio Almario</h2>
        <p>
          Virgilio Almario, one of the Philippines' National Artists, uses his
          platform to communicate his thoughts on Baybayin as a component of
          Filipino culture and identity. As chairman of the government
          Commissions on Language and Culture, he emphasizes the importance of
          Baybayin as a part of our language.
        </p>
        <img src="Images\Almario.jpg" width="500px" height="250px" />
        <p>
          Almario feels that a good balance should be struck between the
          script's extinction and its applicability in current times. Instead of
          using Baybayin on a regular basis, he believes Filipinos should be the
          bridge to keep it alive in many ways.
        </p>
        <br />
        <h2>Antoon Postma</h2>
        <p>
          Even after the Baybayin script was abandoned, certain tribes and
          groups continued to use indigenous scripture. Hanunoo and Buhid are
          two examples of turn from this script. Antoon Postma, a Dutch linguist
          and anthropologist, translated a collection of Ambahan, which is
          traditional Mangyan literature written in these characters, into
          English.
        </p>
        <img src="Images\Antoon.jpg" width="500px" height="250px" />
        <p>
          Ambahan literature reflects the Mangyan community's creative value and
          socioeconomic traditions. By translating these, the cultural elements
          as well as the script used are preserved, making a significant
          contribution to the revival of the ancient script.
        </p>
        <br />
        <h3>Where Does Baybayin Sit Now?</h3>
        <p>
          Baybayin has had an impact on Filipinos of all races, from indigenous
          to immigrants and even mixed-race people, thanks to the history
          associated with the ancient alphabet. While the scripture was
          established as a basic style of writing utilized in pre-colonial
          times, it has had a significant impact on Filipino identity.
        </p>
        <p>
          Despite modern advances, we should continue to learn more about this
          writing system as it refers to more than simply Philippine history.
          The revival of Baybayin centers on the script itself, whether as an
          art form or as a sense of self.
        </p>
        <div id="nextButton">
          <button class="button" id="nextButton5" onclick="location.href='learnerquiz2.php'">Next</button>
        </div>
      </div>
      <!--End of lesson 5-->

      <!--Quiz 2 starting-->

      <div class="lesson-content" id="quiz2Content">
        <h1>Quiz 2</h1>
        <div>
          <form method="POST" action="learnerquiz2.php">
            <input class="button" type="submit" value="Take Quiz 2" />
          </form>
        </div>
        <div id="nextButton">
          <button class="button">Next</button>
        </div>
      </div>

      <!--Lesson 6-->
      <div class="lesson-content" id="lesson6Content">
        <h1 style="text-align: center">Lesson 6</h1>
        <h1 style="text-align: center">Characteristics and usage of Baybayin</h1>
        <p>
          The abugida writing system utilizes consonant-vowel combinations. Each
          character is a consonant that ends in the vowel "A" in its simplest
          form. A mark is added above the consonant (to make a "E" or "I" sound)
          or below the consonant (to produce a "O" or "U" sound) to produce
          consonants ending with the other vowel sounds. A kudlit is the name
          for the mark. Stand-alone vowels are exempt from the kudlit. Vowels
          have their own set of glyphs. D or R have only one symbol because they
          were allophones in most Philippine languages, with D occurring in
          initial, final, pre-consonantal, or post-consonantal positions and R
          occurring in intervocalic places. In modern Filipino, a d between two
          vowels becomes a r, as in the terms dangál (honour) and marangál
          (honourable), or dunong (knowledge) and marunong (knowledgeable), and
          even raw for daw (allegedly, apparently, purportedly) and rin for din
          (also, too) following vowels. Ilokano, Pangasinan, Bikolano, and other
          Philippine languages, to name a few, do not utilize this variant of
          the script since they have separate symbols for D and R.
        </p>
        <br />
        <h3>Usage</h3>
        <p>
          Baybayin was formerly spoken in Tagalog-speaking and, to a lesser
          extent, Kapampangan-speaking communities. When the Spanish promoted
          its use with the printing of Bibles, it spread to Ilokanos. Along with
          the Kapampangan script, related scripts such as Hanunóo, Buhid, and
          Tagbanwa are being used today. Currently, Baybayin, which was utilized
          to portray a Pre-Hispanic feeling as well as a symbol of Filipino
          identity, is undergoing an artistic rebirth of sorts. Most activist
          groups utilized Baybayin as part of their logo, using the script for
          acronyms and a latin script influenced by Baybayin. Brush calligraphy
          and baybayin tattoos are becoming increasingly fashionable. It's
          featured on the most recent Philippine banknotes, which were released
          in the final minute of 2010. The term "Pilipino" was included on the
          bills as an artistic design as well as a security mechanism.
        </p>
        <img src="Images\Alfabeto1.jpg" width="600px" height="400px" />
        <img src="Images\Alfabeto2.jpg" width="600px" height="400px" />

        <div id="nextButton">
          <button class="button" id="nextButton6" onclick="location.href='addprogressLearner.php'">Next</button>
        </div>
      </div>
      <!--End of lesson 6-->

      <!--Lesson 7-->
      <div class="lesson-content" id="lesson7Content">
        <h1 style="text-align: center">Lesson 7</h1>
        <h1 style="text-align: center">How to Write and Read Words in Baybayin?</h1>
        <h3>
          Slowly introduce yourself to Baybayin using translators and
          transliteration
        </h3>
        <p>
          Writing the characters isn't that as hard as it seems but reading them
          can be quite tricky. Just type in your words in the Google Translator
          and translate into Filipino. Start by one word at a time, and then two
          words, until you get the hang and joy of it.
        </p>
        <p>
          You can also use physical translators, usually
          your-language-to-Filipino-language-dictionaries, that can also come in
          handy in learnin g the language itself. You can also use other online,
          software, or application translators to help you.
        </p>
        <br />
        <h3>Writing and Reading Baybayin Characters</h3>
        <p>
          In contrast to English, you simply write and read every letter you see
          and/or hear when writing and reading Filipino words. There are no
          hidden or silent letters, and there is no need to indicate
          intonations; simply write and read as is. Although each letter and
          sound must have the appropriate accent or pronunciation, it is still
          what it is when written.
        </p>
        <br />
        <h3>Can I translate into Baybayin using my native language?</h3>
        <p>The answer: Yes!</p>
        <p>
          If originating from any language or writing system, this
          character-based writing system can be translated or transliterated. Of
          course, there are catches and conditions, and most of them are
          borderline burdensome to even attempt. Even though Baybayin is more
          commonly associated with Tagalog and Filipino vocabulary, most foreign
          words can still be utilized.
        </p>
        <p>
          If the previous procedure fails, there is one more requirement to
          follow: have your native language translated into Filipino first. The
          word's Filipino version will subsequently be transliterated into
          Baybayin characters. Just make sure these terms are nearly identical
          to the ones being translated and vice versa.
        </p>
        <br />
        <h3>Ways of Writing Baybayin</h3>
        <p>There are two ways to write Baybayin characters:</p>
        <p>
          1. Writing the words in the traditional style, which is an older but
          still valid and correct way of writing Baybayin characters. This
          usually only comprises the alphabet in its original form, as well as
          independent letters that were used during the pre-colonial period.
        </p>
        <p>
          2. Since Baybayin's reemergence and rebirth in the modern world,
          writing the words Modernly is also appropriate. This covers the
          revisions and reformed alphabets, although it is still a contentious
          issue.
        </p>
        <br />
        <p>
          Because the manner Baybayin is written is non-standardized, unlike the
          Filipino language, which is written in the Latin/Roman alphabet, a
          variety of approaches may be used in contest with one another. In any
          case, the writer must choose which approach to utilize because the
          very old manner of writing is difficult to trace historically, and the
          added later modified letters may or may not have even existed in the
          first place.
        </p>
        <img src="Images\mahaba.jpg" width="500px" height="200px" />
        <div id="nextButton">
          <button class="button" id="nextButton7" onclick="location.href='addprogressLearner.php'">Next</button>
        </div>
      </div>
      <!--End of lesson 7-->

      <!--Lesson 8-->
      <div class="lesson-content" id="lesson8Content">
        <h1 style="text-align: center">Lesson 8</h1>
        <h1 style="text-align: center">The Kudlit of the Characters</h1>
        <h3>
          What happens if each consonant in the Baybayin alphabet keeps its
          default letter /a/, e.g., ma, but the consonant's next vowel changes,
          e.g., me, mi, mo, and mu?
        </h3>
        <p>
          A kudlit (kood-lit), or little cut, incision, or comma above or below
          each character, is positioned according to the vowel alphabet:
          "uppercuts" for consonant + i/e and "lower cuts" for consonant + o/u.
          Dots, commas, or even the tiniest of strokes can be used as cuts or
          incisions.
        </p>
        <br />
        <h3>Single and Repetitive Letters</h3>
        <h5>
          But isn't one syllable equal to one character? How about long words
          that sound like they have just one syllable, like the term long?
        </h5>
        <h5>
          We've looked at words with consonants and vowels, but what about
          consonants and vowels that are lone and/or repetitive?
        </h5>
        <br />
        <p>
          As previously stated, you speak and spell a Filipino word according to
          how it is spoken or spelt; the letters should spell and sound the same
          when said and read. Let say the words maaari for "please" and bundok
          for "mountain."
        </p>
        <p>
          You read the first word as "ma-a-a-ri," while the second word is
          "bun-dok." Repetitive vowels are considered as one syllable per vowel
          sound and can be written with their equivalent character, while lone
          and repetitive consonants, traditionally, have no syllable count since
          the syllable count only counts those with "consonant + vowel"
          characters in them and therefore isn't included when being written
          before, that is why a Spanish kudlit was introduced.
        </p>
        <br />
        <h3>The Spanish Cross</h3>
        <p>
          In 1620, a Spanish Friar called Francisco Lopez devised a new type of
          kudlit to tackle the challenge of printing these sounds. It was
          designed to be placed below a Baybayin consonant letter to cancel the
          vowel sound and leave it as a single consonant character.
        </p>
        <p>
          The Filipinos never embraced this style of writing because it was too
          hard for them, and they preferred reading the old manner. It is,
          nonetheless, popular nowadays among those who have rediscovered the
          Baybayin but are unaware of the Spanish kudlit's origin.
        </p>
        <br />
        <h3>The Usage of Virama</h3>
        <p>
          Some recent Baybayin revivals prefer to use a different sign, such as
          a "X" shape; many modern fonts do so. Others choose to use the
          "pamudpod," a slash-shaped virama that originated in Mangyan
          lettering. Due to its predominantly colonial history, some people
          choose not to use any virama kudlit at all.
        </p>
        <p>
          Mangyan is a Philippine ethnic group that lives primarily on Mindoro
          Island, however some also live on the islands of Tablas and Sibuyan in
          the province of Romblon, as well as the islands of Albay, Negros, and
          Palawan. Mangyan is a generic term that refers to any man, woman, or
          person, regardless of nationality.
        </p>
        <br />
        <h3>Baybayin Punctuations</h3>
        <p>
          Without original and/or reformed/modified punctuations, Baybayin will
          not be a writing system.
        </p>
        <p>
          Baybayin can be used to write not just single words, but entire
          sentences. In truth, there are numerous works written in Baybayin that
          have been recorded and documented. The majority of these written
          documents are poems, epics, and songs. The majority of these records
          have been repaired, researched, and kept in the University of Santo
          Tomas' archives in the Philippines.
        </p>
        <p>
          There are some reformed characters for the exclamation mark and
          question mark to compensate for the other already existing
          punctuations. But the two former characters are the most employed in
          Baybayin writing, and adding a dot, cross, pamudpod, or virama
          transforms it into a reformed punctuation character.
        </p>
        <img src="Images\letters.jpg" width="600px" height="400px" />
        <div id="nextButton">
          <button class="button" id="nextButton8" onclick="location.href='learnerquiz3.php'">Next</button>
        </div>
      </div>
      <!--End of lesson 8-->

      <!-- start of quiz 3-->
      <div class="lesson-content" id="quiz3Content">
        <h1>Quiz 3</h1>
        <div>
          <form method="POST" action="learnerquiz3.php">
            <input class="button" type="submit" value="Take Quiz 3" />
          </form>
        </div>
        <div id="nextButton">
          <button class="button">Next</button>
        </div>
      </div>

      <!--Lesson 9-->
      <div class="lesson-content" id="lesson9Content">
        <h1 style="text-align: center">Lesson 9</h1>
        <h1 style="text-align: center">Baybayin Translations and Transliterations of Names</h1>
        <img src="Images\example1.jpg" width="500px" height="250px" />
        <p>
          Names have their own set of restrictions. When writing names in
          Baybayin, the same principles apply. Naturally, native Filipino names
          are simple to translate as long as the majority of the guidelines are
          followed. However, if the name isn't a pure Filipino name, it can be
          problematic.
        </p>
        <p>
          In the current period, Filipino names are typically a combination of
          English first names and Spanish surnames. There are also some native,
          original Filipino surnames, which have withstood hundreds of years of
          generations, colonialism, and so on. Filipino surnames that are a
          blend of English and Asian (Chinese, Japanese, etc.) surnames might be
          easy or difficult to translate. The Philippines' people, as well as
          their languages and names, are extremely diverse. Maria, Ben, Alex,
          Omar, Jun, Samantha, and others are all easily translatable Filipino
          names. However, some names are textually complicated, making
          translation and transliteration problematic.
        </p>
        <p>
          However, because Baybayin lacks most of the Roman Alphabet letters
          that we use today, such as the sounds /dza/ (diya), /cha/ (tsa), and
          /sha/(siya), not all names and foreign (non-Filipino) words are simply
          convertible.
        </p>
        <p>
          As a result, it is suggested that you utilize Google Translator to
          translate your original language to Filipino first, and then write
          that Filipino word in Baybayin. If you wish to translate a phrase or
          sentence from your original language to Filipino, it's best to get a
          Filipino to do it for you (since Google translate can/may provide
          unnaturally incorrect translations when read aloud by a local
          speaker).
        </p>
        <img src="Images\map.jpg" width="310px" height="401px" />
        <div id="nextButton">
          <button class="button" id="nextButton9" onclick="location.href='addprogressLearner.php'">Next</button>
        </div>
      </div>
      <!--End of Lesson 9-->

      <!--Lesson 10-->
      <div class="lesson-content" id="lesson10Content">
        <h1 style="text-align: center">Lesson 10</h1>
        <h1 style="text-align: center">Summary of the Lesson About Baybayin</h1>
        <img src="Images\memorize.jpg" width="540px" height="250px" />
        <br />
        <h3>10.1: Memorize the characters</h3>
        <p>
          It will be easier to learn Baybayin if you memorize the characters.
          Characters without commas are any consonant Plus the vowel "a." If
          it's a consonant + "e/i" (like "be" and "bi"), add commas above the
          characters; if it's a consonant + "o/u" (like "be" and "bi"), add
          commas below the characters (like "bo" and "bu"). If it's a single
          character, add a Spanish modified cross or a long line below it (like
          "b"). The vowels, on the other hand, have their own personalities.
          Punctuation is extremely significant in Baybayin sentences.
        </p>
        <br />
        <img src="Images\rules.jpg" width="540px" height="250px" />
        <h3>10.2: Stick to the rules</h3>
        <p>
          The old rule of dropping lone consonants is preferred. However, if you
          prefer your words to be easily read, you can follow the modern
          convention of including the Spanish modified characters.
        </p>
        <br />
        <img src="Images\write.jpg" width="540px" height="250px" />
        <h3>10.3: Slowly introduce yourself</h3>
        <p>
          Try writing them in your own language or by translating them into
          Filipino first and then writing them in Baybayin. It should be quite
          simple to write them but reading them may prove difficult.
        </p>
        <br />
        <img src="Images\reformed.jpg" width="540px" height="250px" />
        <h3>10.4: The reforms</h3>
        <p>
          In Baybayin's alphabet, some letters, syllables, and words do not
          exist. Depending on the word, you could try to use the reformed ones
          or make your own.
        </p>
        <br />
        <h3>Learn and Practice</h3>
        <p>
          It's a brand-new, exciting, and joyous writing method that you can
          pick up in just a few hours. Practice some Filipino words. You can
          read them or write them down on a sheet of paper (like the one below):
        </p>
        <p>1. Talon (jump, falls)</p>
        <p>2. Humawak (to hold)</p>
        <p>3. Aanihin (to gather)</p>
        <p>4. Pagmamahal (loving)</p>
        <p>5. Iniipon (saving)</p>
        <img src="Images\read.jpg" width="540px" height="250px" />
        <h5>
          The practice reading material above is translated and transliterated
          into:
        </h5>
        <p>Para as bayan (for the country)</p>
        <p>Ako ay maglilingkod (I will serve)</p>
        <p>Tahanang mahal (beloved home)</p>
        <p>
          When written in an English sentence:
          <i>"I will serve the country, my beloved home."</i>
        </p>
        <div id="nextButton">
          <button class="button" id="nextButton10" onclick="location.href='learnerfinalexam.php'">Next</button>
        </div>
      </div>
      <!-- Start of final exam-->
      <div class="lesson-content" id="finalExamContent">
        <h1>Final Exam</h1>
        <div>
          <form method="POST" action="learnerfinalexam.php">
            <input class="button" type="submit" value="Take the Final Exam" />
          </form>
        </div>
        <div id="nextButton">
          <button class="button">Next</button>
        </div>
      </div>
      <!--End of lesson 10-->
      <!--End of all lessons-->
      <?php
      }
      ?>
      <?php
      }
    ?>
    </div>

    <br/>
    <!--JS for hidden and shown lessons -->
    <script src="script1.js"></script>
  </body>
</html>
