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
          background-image: url("image/texture-background.jpg");
          background-size: cover;
        }


        .header {
          background-color: #007bff;
          color: #fff;
          padding: 20px 0;
          text-align: center;
        }

        .header a {
          color: #fff;
          text-decoration: none;
          margin: 0 15px;
          font-weight: bold;
        }

        .logo {
          width: 200px;
          height: auto;
          position: absolute;
          top: -20px; /* 画像を上に10px移動 */
          left: 10px;
        }
        
        
        main {
          color:rgb(0, 0, 0);
          background-color: #ffffff;
          font-family:'broadway';
          text-align: center;
          margin-right: auto;
          margin-left: auto;
          border:solid;
          padding: 30px 40px 50px;
          width:1000px;
          margin-top :10px;
          border-radius: 20px;
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
        th#todoLabel { width: 500px;}
        th#dateLabel { width: 200px; }
        td { text-align: center; 
          color:#000000;}
        td input[type='checkbox'] { 
          margin: 0; 
          transform: scale(1.5);
          }
        
        
          
          
    </style>
</head>
<body>
  <div class="header">
    <h1>就職活動支援サイト JOB SUPPORT</h1>
    <a href="toppage.php">
    <img src="image/jobsupport2.png" alt="Job Support" class="logo">
  </a>
    <a href="#">履歴書作成</a> |
    <a href="#">資格登録</a> |
    <a href="#">メール</a> |
    <a href="#">To do</a> |
    <a href="#">カレンダー</a>
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
