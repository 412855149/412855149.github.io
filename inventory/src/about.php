<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="about.css" />

    <title>About responsive card</title>
  </head>
  <body>
    <div class="container">
      <div class="btnContainer">
        <button class="backBtn" onclick="back()">Back</button>
      </div>
      <script>
        function back() {
          window.location.href = 'index.php'
        }
      </script>
      <div class="title">
        <h1>Meet the team</h1>
      </div>
      <div class="card_container">
        <article class="card_article">
          <img
            src="image/ber.png"
            alt="image"
            class="card_img"
          />

          <div class="card_data">
            <span class="card_description">Backend Developer</span>
            <h2 class="card_title">Bertrand Leonard</h2>
            <a href="https://www.linkedin.com/in/BertrandLeonard/" class="card_button" target="_blank" rel="noopener noreferrer">LinkedIn</a>
          </div>
        </article>

        <article class="card_article">
          <img
            src="image/jep.png"
            alt="image"
            class="card_img"
          />

          <div class="card_data">
            <span class="card_description">UI/UX Designer</span>
            <h2 class="card_title">Jeffta Matthew</h2>
            <a href="https://www.linkedin.com/in/jefftamatthew/" class="card_button" target="_blank" rel="noopener noreferrer">LinkedIn</a>
          </div>
        </article>

        <article class="card_article">
          <img
            src="image/tin.png"
            alt="image"
            class="card_img"
          />

          <div class="card_data">
            <span class="card_description">Backend Developer</span>
            <h2 class="card_title">Justin Wangsa</h2>
            <a href="https://www.linkedin.com/in/justinwangsa/" class="card_button" target="_blank" rel="noopener noreferrer">LinkedIn</a>
          </div>
        </article>

        <article class="card_article">
          <img
            src="image/se.png"
            alt="image"
            class="card_img"
          />

          <div class="card_data">
            <span class="card_description">Front-End Developer</span>
            <h2 class="card_title">Seann Bryan</h2>
            <a href="https://www.linkedin.com/in/seann-bryan-timotius/" class="card_button" target="_blank" rel="noopener noreferrer">LinkedIn</a>
          </div>
        </article>

        <article class="card_article">
          <img
            src="image/ye.png"
            alt="image"
            class="card_img"
          />

          <div class="card_data">
            <span class="card_description">Graphic Designer</span>
            <h2 class="card_title">Yehuda Kristiawan</h2>
            <a href="https://www.linkedin.com/in/yehuda-kristiawan-putra/" class="card_button" target="_blank" rel="noopener noreferrer">LinkedIn</a>
          </div>
        </article>
      </div>
    </div>
  </body>
</html>
