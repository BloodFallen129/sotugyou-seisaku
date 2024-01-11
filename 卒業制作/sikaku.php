<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&family=Zen+Kaku+Gothic+New:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <style>
    /* カスタムスタイルの追加 */
    /* フォント、色、レイアウトを更新 */
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      /* background-image: url(image/syukatu2.jpg); */
      /* background-repeat: no-repeat; */
      /* background-size: cover; */
      background-color: aliceblue;
      
    }

.header {
  background-color: #f2f4f5;
  color: #a06969;
  padding: 20px 0;
  padding-top: 0px;
  top: 0;
  text-align: center;
  background-image: url(image/DC4DCA11-4EE7-449A-869F-2D847E657C60.jpg);
  background-size:cover;  
  
  
  /* background-image: url(image/avatar3.jpg); */
  
  
  
  /* align-items: center; */
  font-family: 'Zen Kaku Gothic New', sans-serif;
  /* font-family: 'Mochiy Pop P One', sans-serif; */
  /* font-family: 'Noto Serif JP', serif; */

}

    .header a {
      color: #896363;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
      align-items: center;
      text-align: center;
  
    }

     h1 {
      text-align: center;
      margin-bottom: 0px;
      color: #443a3a;
      margin-top: 0;
      
      
      
    }

    .logo {
     width: 170px;
     height: 60px;
    }


    .anker {
      display: flex;
      justify-content: center;
      align-items: center;
      
      
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .avatar {
      text-align: center;
      margin-bottom: 20px;
    }

    .avatar img {
      max-width: 200px;
      border-radius: 50%;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    /* 以下のスタイルはカスタマイズ可能です */
    #experience {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #4caf50; /* 経験値のテキストカラーを変更 */
    }

    .avatar-text {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #333; /* アバター名のテキストカラーを変更 */
    }

    .sikaku-text {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #333; /* アバター名のテキストカラーを変更 */
    }

    .experience-gauge {
      background-color: #ddd;
      height: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    #experienceBar {
      width: 0;
      height: 100%;
      background-color: #4caf50;
      border-radius: 5px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      margin-right: 10px;
    }

    button:hover {
      background-color: #45a848; /* ホバー時のボタンの色を微調整 */
    }

    .message {
      display: none;
      text-align: center;
      font-size: 20px;
      margin-top: 10px;
      color: #4caf50; /* メッセージのテキストカラーを変更 */
    }
    .center-container {
  text-align: center;
  margin-top: 20px;
}

.center-container input[type="text"] {
  padding: 10px;
  font-size: 18px;
  border-radius: 5px;
}

.center-container button {
  background-color: #4caf50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
  margin-left: 10px; /* Adjust margin to separate input and button */
}

.center-container button:hover {
  background-color: #45a848; /* ホバー時のボタンの色を微調整 */
}
  </style>
</head>
<body>
<div class="header">
    <h1>就職活動支援サイト JOB SUPPORT</h1>
    
    <div class="oya">
      <a href="toppage.php">
      <img src="image/jobsupport-3.png" alt="Job Support" class="logo">
      </a>
    </div>

    

    <div class="anker">
       <a href="gakurekikeisan/entry.php" class="anker"><span class="material-symbols-outlined">
        draw
        </span>履歴書作成</a> |

       <a href="sikaku.php" class="anker"><span class="material-symbols-outlined">
        content_paste_go
        </span>資格登録</a> |

       <a href="mail/index.php" class="anker"><span class="material-symbols-outlined">
        mail
        </span>メール</a> |

       <a href="todolist/todolist.php" class="anker"><span class="material-symbols-outlined">
        check_circle
        </span>To do</a> |
        
       <a href="calendar.php" class="anker"><span class="material-symbols-outlined">
        calendar_month
       </span>カレンダー</a>
    </div>
  </div>
  <audio id="levelUpSound">
  <source src="image/lvup.mp3" type="audio/mpeg">
  </audio>
  <div class="container">
    <div class="avatar">
      <img id="avatarImage" src="image/avatar1.jpg" alt="アバター">
    </div>
    
  
    
    <div class="avatar-text">
    <!-- アバターの初期名前を設定 -->
    <p id="avatarName">Lv1 一般人</p>
  </div>

    <div id="experience">
      経験値: <span id="experienceValue">0</span>
    </div>
    <div id="levelUpMessage" class="message">おめでとうございます！アバターが成長しました！</div>


    <div class="experience-gauge">
      <div id="experienceBar"></div>
    </div>

    <div id="qualificationsList">
    <div class="sikaku-text"><h2>登録した資格</h2>
  <ul id="qualificationItems">
    <!-- ここに登録された資格が表示されます -->
  </ul>
</div>

<div class="center-container">
    <input type="text" id="qualificationInput" placeholder="資格を入力してください">
    <button onclick="registerQualification()">資格を登録</button>



    <script>
let experience = 0;
let avatarName = "Lv1 一般人";
const maxWidth = 1000; // ゲージの最大幅

// gainExperience 関数を定義
function gainExperience(points) {
  experience += points;
  if (experience >= maxWidth) {
    // 経験値に応じてアバターの成長段階を変更
    if (experience >= 1000 && experience < 2000) {
  // レベル2に達した場合の処理
  if (avatarName !== "Lv2 資格修行中") {
    document.getElementById("avatarImage").src = "image/avatar2.jpg";
    avatarName = "Lv2 資格修行中";
    playLevelUpSound();
    showLevelUpMessage();
    document.getElementById("experienceBar").style.width = "0"; // ゲージをリセット
  }
    } else if (experience >= 2000 && experience < 3000) {
      document.getElementById("avatarImage").src = "image/avatar3.jpg";
      avatarName = "Lv3 資格熟達者";
      playLevelUpSound();
      showLevelUpMessage();
      document.getElementById("experienceBar").style.width = "0"; // ゲージをリセット
    } else if (experience >= 3000 && experience < 4000) {
      document.getElementById("avatarImage").src = "image/avatar4.jpg";
      avatarName = "Lv4 資格を武器に闘いし者";
      playLevelUpSound();
      showLevelUpMessage();
      document.getElementById("experienceBar").style.width = "0"; // ゲージをリセット
    } else if (experience >= 5000) {
      document.getElementById("avatarImage").src = "image/avatar5.jpg";
      avatarName = "Lv5 資格王";
      playLevelUpSound();
      showLevelUpMessage();
      document.getElementById("experienceBar").style.width = "0"; // ゲージをリセット
    }
  } else {
    // ゲージがリセットされない場合
    document.getElementById("experienceBar").style.width = (experience / maxWidth) * 100 + "%";
  }
  document.getElementById("experienceValue").textContent = experience;
  document.getElementById("avatarName").textContent = avatarName;
}

function playLevelUpSound() {
  const levelUpSound = document.getElementById("levelUpSound");
  levelUpSound.play();
}

function showLevelUpMessage() {
  const levelUpMessage = document.getElementById("levelUpMessage");
  levelUpMessage.style.display = "block";
  setTimeout(function () {
    levelUpMessage.style.display = "none"; // ここを修正
  }, 2000);
}

function registerQualification() {
  const qualificationInput = document.getElementById("qualificationInput");
  const qualification = qualificationInput.value;

  if (qualification) {
    if (experience === 0) {
      experience = 0; // 初期経験値を設定
    }
    gainExperience(500); // 資格を登録した際に経験値を増やす
    qualificationInput.value = ""; // 入力フィールドをクリア

    // 登録した資格をリストに追加
    const qualificationItems = document.getElementById("qualificationItems");
    const qualificationItem = document.createElement("li");
    qualificationItem.textContent = qualification;
    qualificationItems.appendChild(qualificationItem);
  }
}

</script>
</body>
</html>