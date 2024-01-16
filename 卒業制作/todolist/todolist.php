<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODOリスト</title>
    <style>
        @import url('https://fonts.cdnfonts.com/css/bradley-hand-2');
        @import url('https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap');


        :root { font-size: 16px; 
          white-space: nowrap; /* テキストを折り返さないようにする */
          overflow-x: scroll;    /* 横スクロールを有効にする */
          writing-mode: horizontal-tb; /* テキストを横書きに設定 */
          /*background-image: url("image/texture-background.jpg");*/
          background-size: cover;
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

        .logo {
          width: 170px;
          height: 60px;
        }
        
        .container {
          max-width: 800px;
          margin: 20px auto;
          background-color: #fff;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
          text-align: center;
          margin-bottom: 0px;
          color: #443a3a;
          margin-top: 0;
        }

        label {
          font-weight: bold;
          color: #333;
        }

        body {
          font-family: 'Arial', sans-serif;
          margin: 0;
          padding: 5px;
          /* background-image: url(image/syukatu2.jpg); */
          /* background-repeat: no-repeat; */
          /* background-size: cover; */
          background-color: aliceblue;
          
        }

        main {
          color:rgb(0, 0, 0);
          background-color: #ffffff;
          font-family:'broadway';
          text-align: center;
          margin-right: auto;
          margin-left: auto;
          border:solid;
          padding: 30px 50px 40px;
          width:1350px;
          margin-top :10px;
          border-radius: 20px;
        }

        .header-img {
          width: 130px;
          height: 130px;
          margin-right: 10px;
        }


        .header-img-oya{
          text-align: center;
          margin-bottom: 10px;
          
        }
          
    /* アイコンフォントサイズ調整(グーグルフォント) */
        .material-symbols-outlined {  
          font-size: 23px;
        }

    /* 位置調整(グーグルフォント) */
        .anker {
          display: flex;
          justify-content: center;
          align-items: center;
          /* background-color: #e5eae8; */
          
        }

        label#sentaku{
          margin-top: 1rem;
        }
        input, select { 
          margin: 1rem 1rem 5px 0; font-size:30px;
        }
        select{
          margin-top:0px;
        }
        input[type='number'] { 
          width: 90px; 
        }

        button#submit, button#priority, button#remove,button#clear-filter{
          border:solid #fa0606;
          font-family:'Bradley Hand ITC';
          font-size: 15px;
          padding: 10px 30px 10px;
          margin-top: 0.5rem;
          background-color: rgb(1, 55, 216);
          color: rgb(255, 255, 255);
          border-style: none;
          border-radius:10px;
        }

        button#submit {
          margin-bottom:0.5rem;
        }
        option{ font-size: 30px;}

        button#priority { background-color: rgb(154, 201, 60); }

        button#clear-filter{ 
          background-color:rgb(26, 121, 0);
          margin-left:10px;
        }
        button#remove { 
          background-color: rgb(200, 38, 38);
          margin-top:1rem;
        }

        table {
          font-family: 'Bradley Hand ITC';
          margin-top: 2rem;
          border: solid 2px rgb(0, 0, 0);
          border-collapse: collapse;
          margin:auto;
          
        }
        th, td {
          border:solid #000000;
          color:#ffffff;
          border: solid 1px rgb(0, 0, 0);
          border-collapse: collapse;
        }
        th {
          background-color: rgb(20, 90, 160);
          padding:0px 0.5rem 0px;
          height:40px; 
        }
        th#todoLabel { width: 800px;}
        th#dateLabel { width: 300px; }
        td { text-align: center; 
          color:#000000;}
        td input[type='checkbox'] { 
          margin: 0; 
          transform: scale(1.5);
          }
        
        label#sinki{
          border: solid 1px #ffffff;
          margin-left: 20px;
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
       
        </span>履歴書作成</a> |

       <a href="sikaku.php" class="anker"><span class="material-symbols-outlined">
       
        </span>資格登録</a> |

       <a href="mail/index.php" class="anker"><span class="material-symbols-outlined">
      
        </span>メール</a> |

       <a href="todolist/todolist.php" class="anker"><span class="material-symbols-outlined">
        </span>To do</a> |

       <a href="calendar.php" class="anker"><span class="material-symbols-outlined">
       </span>カレンダー</a>
    </div>

  </div>

  <main>
    <div id="input">
      <label>TODO: <input id="todo"></label><br>

      <label id="sentaku">優先度: </label>
      <select>
        <option>低</option>
        <option selected>普</option>
        <option>高</option>
      </select>

      <label id="sentaku">期日: <input type="date"></label><br>

      <button id="submit">登録</button>

    </div>

    <table>
      <tr>
        <th id="todoLabel">TODO</th>
        <th id="yuusendo">優先度</th>
        <th id="dateLabel">期日</th>
        <th>完了</th>
      </tr>
    </table>
    
  </main>

    <script>
      'use strict';

      const storage = localStorage;

      const table = document.querySelector('table');
      const todo = document.getElementById('todo');
      const priority = document.querySelector('select');
      const deadline = document.querySelector('input[type="date"]');
      const submit = document.getElementById('submit');

      let list = [];

      document.addEventListener('DOMContentLoaded', () => {
        const json = storage.todoList;
        if (json == undefined) {
          return;
        }
        list = JSON.parse(json);
        for (const item of list) {
          addItem(item);
        }
      });

      const addItem = (item) => {
        const tr = document.createElement('tr');

        for (const prop in item) {
          const td = document.createElement('td');
          if (prop == 'done') {
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.checked = item[prop];
            td.appendChild(checkbox);
            checkbox.addEventListener('change', checkBoxListener);
          } else {
            td.textContent = item[prop];
          }
          tr.appendChild(td);
        }

        table.append(tr);
      };

      const checkBoxListener = (ev) => {
        const trList = Array.from(document.getElementsByTagName('tr'));
        const currentTr = ev.currentTarget.parentElement.parentElement;
        const idx = trList.indexOf(currentTr) - 1;
        list[idx].done = ev.currentTarget.checked;
        storage.todoList = JSON.stringify(list);
      };

      submit.addEventListener('click', () => {
        const item = {};

        if (todo.value != '') {
          item.todo = todo.value;
        } else {
          item.todo = '未入力TODO';
        }
        item.priority = priority.value;
        if (deadline.value != '') {
          item.deadline = deadline.value;
        } else {
          const date = new Date();
          item.deadline = date.toLocaleDateString().replace(/\//g, '-');
        }
        item.done = false;

        todo.value = '';
        priority.value = '普';
        deadline.value = '';

        addItem(item);

        list.push(item);
        storage.todoList = JSON.stringify(list);
      });



      
      /*優先度高絞り込み*/
      const filterButton = document.createElement('button');
      filterButton.textContent = '優先度（高）で絞り込み';
      filterButton.id = 'priority';
      const main = document.querySelector('main');
      main.appendChild(filterButton);

      filterButton.addEventListener('click', () => {
        clearTable();
        for (const item of list) {
          if (item.priority == '高') {
            addItem(item);
          }
        }
      });


      /*絞り込み解除*/
      const clearFilterButton = document.createElement('button');
      clearFilterButton.textContent = '絞り込み解除';
      clearFilterButton.id = 'clear-filter'; // ユニークなIDを設定
      main.appendChild(clearFilterButton);

      clearFilterButton.addEventListener('click', () => {
        clearTable();
        for (const item of list) {
          addItem(item);
        }
      });


      const clearTable = () => {
        const trList = Array.from(document.getElementsByTagName('tr'));
        trList.shift();
        for (const tr of trList) {
          tr.remove();
        }
      };


      /*完了削除*/
      const remove = document.createElement('button');
      remove.textContent = '完了したTODOを削除する';
      remove.id = 'remove';
      const br = document.createElement('br');
      main.appendChild(br);
      main.appendChild(remove);

      remove.addEventListener('click', () => {
        clearTable();
        list = list.filter((item) => item.done == false);
        for (const item of list) {
          addItem(item);
        }
        storage.todoList = JSON.stringify(list);
      });
    </script>
</body>
</html>
