<?php
// データベース接続用のファイルを読み込み
require("./dbconnect.php");

// セッションの開始
session_start();

// エラーがセットされていない場合
if (!isset($error)){

    // POSTリクエストから各種データを取得
    $id = $_POST['id'];
    $name = $_POST['name'];
    $name_kana = $_POST['name_kana'];
    $b_year = $_POST['b_year'];
    $b_month = $_POST['b_month'];
    $b_day = $_POST['b_day'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $tel3 = $_POST['tel3'];
    $postalcode1 = $_POST['postalcode1'];
    $prefecture1 = $_POST['prefecture1'];
    $prefecture_kana1 = $_POST['prefecture_kana1'];
    $muncipalities1 = $_POST['municipalities1'];
    $municipalities_kana1 = $_POST['municipalities_kana1'];
    $housenumber1 = $_POST['housenumber1'];
    $housenumber_kana1 = $_POST['housenumber_kana1'];
    $mansion1 = $_POST['mansion1'];
    $mansion_kana1 = $_POST['mansion_kana1'];
    $postalcode2 = $_POST['postalcode2'];
    $prefecture2 = $_POST['prefecture2'];
    $prefecture_kana2 = $_POST['prefecture_kana2'];
    $municipalities2 = $_POST['municipalities2'];
    $municipalities_kana2 = $_POST['municipalities_kana2'];
    $housenumber2 = $_POST['housenumber2'];
    $housenumber_kana2 = $_POST['housenumber_kana2'];
    $mansion2 = $_POST['mansion2'];
    $mansion_kana2 = $_POST['mansion_kana2'];
    $p_name = $_POST['p_name'];
    $p_year = $_POST['p_year'];
    $j_name = $_POST['j_name'];
    $j_year = $_POST['j_year'];
    $h_name = $_POST['h_name'];
    $h_year = $_POST['h_year'];
    $u_name = $_POST['u_name'];
    $u_year = $_POST['u_year'];
    $pic = $_POST['pic'];

    // SQL文を作成
    $sql = 'INSERT INTO rirekisho (id, name, name_kana, b_year, b_month, b_day, age, gender, email, tel1, tel2, tel3, postalcode1, prefecture1, prefecture_kana1, municipalities1, municipalities_kana1, housenumber1, housenumber_kana1, mansion1, mansion_kana1, postalcode2, prefecture2, prefecture_kana2, municipalities2, municipalities_kana2, housenumber2, housenumber_kana2, mansion2, mansion_kana2, p_name, p_year, j_name, j_year, h_name, h_year, u_name, u_year, pic) 
            VALUES(:id, :name, :name_kana, :b_year, :b_month, :b_day, :age, :gender, :email, :tel1, :tel2, :tel3, :postalcode1, :prefecture1, :prefecture_kana1, :municipalities1, :municipalities_kana1, :housenumber1, :housenumber_kana1, :mansion1, :mansion_kana1, :postalcode2, :prefecture2, :prefecture_kana2, :municipalities2, :municipalities_kana2, :housenumber2, :housenumber_kana2, :mansion2, :mansion_kana2, :p_name, :p_year, :j_name, :j_year, :h_name, :h_year, :u_name, :u_year, :pic)';

    // プリペアドステートメントを作成
    $stmt = $db->prepare($sql);

    // 各パラメータに値をバインド
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':name_kana', $name_kana);
    $stmt->bindParam(':b_year', $b_year);
    $stmt->bindParam(':b_month', $b_month);
    $stmt->bindParam(':b_day', $b_day);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel1', $tel1);
    $stmt->bindParam(':tel2', $tel2);
    $stmt->bindParam(':tel3', $tel3);
    $stmt->bindParam(':postalcode1', $postalcode1);
    $stmt->bindParam(':prefecture1', $prefecture1);
    $stmt->bindParam(':prefecture_kana1', $prefecture_kana1);
    $stmt->bindParam(':municipalities1', $municipalities1);
    $stmt->bindParam(':municipalities_kana1', $municipalities_kana1);
    $stmt->bindParam(':housenumber1', $housenumber1);
    $stmt->bindParam(':housenumber_kana1', $housenumber_kana1);
    $stmt->bindParam(':mansion1', $mansion1);
    $stmt->bindParam(':mansion_kana1', $mansion_kana1);
    $stmt->bindParam(':postalcode2', $postalcode2);
    $stmt->bindParam(':prefecture2', $prefecture2);
    $stmt->bindParam(':prefecture_kana2',$prefecture_kana2);
    $stmt->bindParam(':municipalities2',$municipalities2);
    $stmt->bindParam(':municipalities_kana2',$municipalities_kana2);
    $stmt->bindParam(':housenumber2',$housenumber2);
    $stmt->bindParam(':housenumber_kana2',$housenumber_kana2);
    $stmt->bindParam(':mansion2',$mansion2);
    $stmt->bindParam(':mansion_kana2',$mansion_kana2);
    $stmt->bindParam(':p_name',$p_name);
    $stmt->bindParam(':p_year',$p_year);
    $stmt->bindParam(':j_name',$j_name);
    $stmt->bindParam(':j_year',$j_year);
    $stmt->bindParam(':h_name',$h_name);
    $stmt->bindParam(':u_name',$u_name);
    $stmt->bindParam(':u_year',$u_year);
    $stmt->bindParam(':pic',$pic);

    // SQLを実行
    $stmt->execute();

    // セッション変数を破棄
    unset($_SESSION['join']);

    // 別のページにリダイレクト
    header('location: thank.php');
    exit();
}

// POSTデータが空でない場合
if(!empty($_POST)){
    // 各項目が空かどうかをチェックし、空であればエラーメッセージをセット
    if($_POST['id'] === ""){
        $error['id'] = "blank";
    }
    if($_POST['name'] === ""){
        $error['name'] = "blank";
    }
    if($_POST['name_kana'] === ""){
        $error['name_kana'] = "blank";
    }
    if($_POST['b_year'] === ""){
        $error['b_year'] = "blank";
    }
    if($_POST['b_month'] === ""){
        $error['b_month'] = "blank";
    }
    if($_POST['b_day'] === ""){
        $error['b_day'] = "blank";
    }
    if($_POST['age'] === ""){
        $error['age'] = "blank";
    }

    if($_POST['email'] === ""){
        $error['email'] = "blank";
    }
    if($_POST['tel1'] === ""){
        $error['tel1'] = "blank";
    }
    if($_POST['postalcode1'] === ""){
        $error['postalcode'] = "blank";
    }
    if($_POST['prefecture1'] === ""){
        $error['prefecture1'] = "blank";
    }
    if($_POST['prefecture_kana1'] === ""){
        $error['prefecture_kana1'] = "blank";
    }
    if($_POST['municipalities1'] === ""){
        $error['municipalities1'] = "blank";
    }
    if($_POST['municipalities_kana1'] === ""){
        $error['municipalities_kana1'] = "blank";
    }
    if($_POST['housenumber1'] === ""){
        $error['housenumber1'] = "blank";
    }
    if($_POST['housenumber_kana1'] === ""){
        $error['housenumber_kana1'] = "blank";
    }
    if($_POST['mansion1'] === ""){
        $error['mansion1'] = "blank";
    }
    if($_POST['mansion_kana1'] === ""){
        $error['mansion_kana1'] = "blank";
    }
    if($_POST['postalcode2'] === ""){
        $error['postalcode2'] = "blank";
    }
    if($_POST['prefecture2'] === ""){
        $error['prefecture2'] = "blank";
    }
    if($_POST['prefecture_kana2'] === ""){
        $error['prefecture_kana2'] = "blank";
    }
    if($_POST['municipalities2'] === ""){
        $error['municipalities2'] = "blank";
    }
    if($_POST['municipalities_kana2'] === ""){
        $error[''] = "blank";
    }







    // エラーがない場合、入力されたIDがすでに存在するかどうかを確認
    if(!isset($error)){
        $member = $db->prepare('SELECT COUNT(*) as cnt FROM gakureki WHERE id=?');
        $member->execute(array(
            $_POST['id']
        ));
        $record = $member->fetch();

        // IDが既に存在する場合、エラーをセット
        if($record['cnt']>0){
            $error['id'] = 'duplicate';
        }
    }

    // エラーがない場合、セッションに入力データを保存し、別のページにリダイレクト
    if(!isset($error)){
        $_SESSION['join'] =$_POST;
        header('Location:gakurekikeisan.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<html>
<head>
    <meta charset="UTF-8">
    <title>情報入力フォーム及び学歴計算</title>
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
  <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
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
            margin-bottom: 20px;
            color: #fff;
            }

            label {
            font-weight: bold;
            color: #333;
            }

            input, textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            }

            button {
            background-color: #007bff;
            color: #000000;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            }

            button:hover {
            background-color: #0056b3;
            }
            .required {
            margin-left: .3em;
            color: #f33;
            font-size: .9em;
            padding: 3px;
            background-color: #fee;
            font-weight: bold;
            }
        </style>
    <body>
        <div class = "content">
            <form action="" method="POST">
                <h2>プロフィール登録</h2>
                <p>履歴書作成のため、下記フォームに必要事項をご記入ください。</p>
                <br>
                <div class="control">
                    <label for="id">学籍番号<span class="required">必須</span></label>
                    <input id="id" type="text" name="id">
                    <?php if (!empty($error["id"]) && $error['id'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php elseif (!empty($error["id"]) && $error['id'] === 'duplicate'): ?>
                    <p class="error">＊この学籍番号はすでに登録済みです</p>
                <?php endif ?>
                    <label for="name">名前<span class="required">必須</span></label>
                    <input type="text" id="name" name="name">
                    <?php if(!empty($error["name"]) && $error['name'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                    <label for="name_kana1">ふりがな<span class="required">必須</span></label>
                    <input type="text" id="name_kana1" name="name_kana1">
                    <?php if(!empty($error["name_kana1"]) && $error['name_kana1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                    <label for="b_year,b_month,b_day">生年月日<span class="required">必須</span></label><br>
                    <select id="b_year" name="b_year">
                        <option value="1900">1900</option>
                        <option value="1901">1901</option>
                        <option value="1902">1902</option>
                        <option value="1903">1903</option>
                        <option value="1904">1904</option>
                        <option value="1905">1905</option>
                        <option value="1906">1906</option>
                        <option value="1907">1907</option>
                        <option value="1908">1908</option>
                        <option value="1909">1909</option>
                        <option value="1910">1910</option>
                        <option value="1911">1911</option>
                        <option value="1912">1912</option>
                        <option value="1913">1913</option>
                        <option value="1914">1914</option>
                        <option value="1915">1915</option>
                        <option value="1916">1916</option>
                        <option value="1917">1917</option>
                        <option value="1918">1918</option>
                        <option value="1919">1919</option>
                        <option value="1920">1920</option>
                        <option value="1921">1921</option>
                        <option value="1922">1922</option>
                        <option value="1923">1923</option>
                        <option value="1924">1924</option>
                        <option value="1925">1925</option>
                        <option value="1926">1926</option>
                        <option value="1927">1927</option>
                        <option value="1928">1928</option>
                        <option value="1929">1929</option>
                        <option value="1930">1930</option>
                        <option value="1931">1931</option>
                        <option value="1932">1932</option>
                        <option value="1933">1933</option>
                        <option value="1934">1934</option>
                        <option value="1935">1935</option>
                        <option value="1936">1936</option>
                        <option value="1937">1937</option>
                        <option value="1938">1938</option>
                        <option value="1939">1939</option>
                        <option value="1940">1940</option>
                        <option value="1941">1941</option>
                        <option value="1942">1942</option>
                        <option value="1943">1943</option>
                        <option value="1944">1944</option>
                        <option value="1945">1945</option>
                        <option value="1946">1946</option>
                        <option value="1947">1947</option>
                        <option value="1948">1948</option>
                        <option value="1949">1949</option>
                        <option value="1950">1950</option>
                        <option value="1951">1951</option>
                        <option value="1952">1952</option>
                        <option value="1953">1953</option>
                        <option value="1954">1954</option>
                        <option value="1955">1955</option>
                        <option value="1956">1956</option>
                        <option value="1957">1957</option>
                        <option value="1958">1958</option>
                        <option value="1959">1959</option>
                        <option value="1960">1960</option>
                        <option value="1961">1961</option>
                        <option value="1962">1962</option>
                        <option value="1963">1963</option>
                        <option value="1964">1964</option>
                        <option value="1965">1965</option>
                        <option value="1966">1966</option>
                        <option value="1967">1967</option>
                        <option value="1968">1968</option>
                        <option value="1969">1969</option>
                        <option value="1970">1970</option>
                        <option value="1971">1971</option>
                        <option value="1972">1972</option>
                        <option value="1973">1973</option>
                        <option value="1974">1974</option>
                        <option value="1975">1975</option>
                        <option value="1976">1976</option>
                        <option value="1977">1977</option>
                        <option value="1978">1978</option>
                        <option value="1979">1979</option>
                        <option value="1980">1980</option>
                        <option value="1981">1981</option>
                        <option value="1982">1982</option>
                        <option value="1983">1983</option>
                        <option value="1984">1984</option>
                        <option value="1985">1985</option>
                        <option value="1986">1986</option>
                        <option value="1987">1987</option>
                        <option value="1988">1988</option>
                        <option value="1989">1989</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select><label>年</label>
                    <select id="b_month" name="b_month">
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select><label>月</label>
                    <select id="b_day" name="b_day">
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select><label>日</label>
                    <label for="age">年齢<span class="required">必須</span></label><br>
                    <select id="age" name="age">
                        <option value="00">0</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                        <option value="71">71</option>
                        <option value="72">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                        <option value="76">76</option>
                        <option value="77">77</option>
                        <option value="78">78</option>
                        <option value="79">79</option>
                        <option value="80">80</option>
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                        <option value="84">84</option>
                        <option value="85">85</option>
                        <option value="86">86</option>
                        <option value="87">87</option>
                        <option value="88">88</option>
                        <option value="89">89</option>
                        <option value="90">90</option>
                        <option value="91">91</option>
                        <option value="92">92</option>
                        <option value="93">93</option>
                        <option value="94">94</option>
                        <option value="95">95</option>
                        <option value="96">96</option>
                        <option value="97">97</option>
                        <option value="98">98</option>
                        <option value="99">99</option>
                        <option value="100">100</option>
                        <option value="101">101</option>
                        <option value="102">102</option>
                        <option value="103">103</option>
                        <option value="104">104</option>
                        <option value="105">105</option>
                        <option value="106">106</option>
                        <option value="107">107</option>
                        <option value="108">108</option>
                        <option value="109">109</option>
                        <option value="110">110</option>
                        <option value="111">111</option>
                        <option value="112">112</option>
                        <option value="113">113</option>
                        <option value="114">114</option>
                        <option value="115">115</option>
                        <option value="116">116</option>
                        <option value="117">117</option>
                        <option value="118">118</option>
                        <option value="119">119</option>
                        <option value="120">120</option>
                        <option value="121">121</option>
                        <option value="122">122</option>
                        <option value="123">123</option>
                        <option value="124">124</option>
                    </select><label>歳</label><br>

                    <label for="gender">性別<span class="required">必須</span></label><br>
                    <select id="gender" name="gender">
                        <option value="男">男</option>
                        <option value="女">女</option>
                        <option value="">表記しない</option>
                    </select>
                    <br>

                    <label for="email">メールアドレス<span class="required">必須</span></label>
                    <input type="email" id="email" name="email">
                    <?php if (!empty($error["email"]) && $error['email'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                    <label for="tel1">電話番号(現住所等)<span class="required">必須</span></label>
                    <input type="varchar" id="tel1" name="tel1">
                    <?php if (!empty($error["tel1"]) && $error['tel1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                    <label for="tel2">電話番号2(携帯電話等)</label>
                    <input type="varchar" id="tel2" name="tel2">

                    <label for="tel3">電話番号3(実家等)</label>
                    <input type="varchar" id="tel3" name="tel3">

                <br>

                <label for="postalcode1"> 現住所 郵便番号<span class="required">必須</span></label>
                <input type="text" id="postalcode1" name="postalcode1">
                <?php if (!empty($error["postalcode1"]) && $error['postalcode1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>
                <label for="prefecture1"> 現住所 都道府県名<span class="required">必須</span></label><br>
                <select id="prefecture1" name="prefecture1">
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select><br>
                <?php if (!empty($error["prefecture1"]) && $error['prefecture'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>
                <label for="prefecture_kana1">都道府県 ふりがな<span class="required">必須</span></label>
                    <?php
                        $prefectureData =[
                            "---"=>"",
                            "北海道"=>"ほっかいどう",
                            "青森県"=>"あおもりけん",
                            "岩手県"=>"いわてけん",
                            "宮城県"=>"みやぎけん",
                            "秋田県"=>"あきたけん",
                            "山形県"=>"やまがたけん",
                            "福島県"=>"ふくしまけん",
                            "茨城県"=>"いばらきけん",
                            "栃木県"=>"とちぎけん",
                            "群馬県"=>"ぐんまけん",
                            "埼玉県"=>"さいたまけん",
                            "千葉県"=>"ちばけん",
                            "東京都"=>"とうきょうと",
                            "神奈川県"=>"かながわけん",
                            "新潟県"=>"にいがたけん",
                            "富山県"=>"とやまけん",
                            "石川県"=>"いしかわけん",
                            "福井県"=>"ふくいけん",
                            "山梨県"=>"やまなしけん",
                            "長野県"=>"ながのけん",
                            "岐阜県"=>"ぎふけん",
                            "静岡県"=>"しずおかけん",
                            "愛知県"=>"あいちけん",
                            "三重県"=>"みえけん",
                            "滋賀県"=>"しがけん",
                            "京都府"=>"きょうとふ",
                            "大阪府"=>"おおさかふ",
                            "兵庫県"=>"ひょうごけん",
                            "奈良県"=>"ならけん",
                            "和歌山県"=>"わかやまけん",
                            "鳥取県"=>"とっとりけん",
                            "島根県"=>"しまねけん",
                            "岡山県"=>"おかやまけん",
                            "広島県"=>"ひろしまけん",
                            "山口県"=>"やまぐちけん",
                            "徳島県"=>"とくしまけん",
                            "香川県"=>"かがわけん",
                            "愛媛県"=>"えひめけん",
                            "高知県"=>"こうちけん",
                            "福岡県"=>"ふくおかけん",
                            "佐賀県"=>"さがけん",
                            "長崎県"=>"ながさきけん",
                            "熊本県"=>"くまもとけん",
                            "大分県"=>"おおいたけん",
                            "宮崎県"=>"みやざきけん",
                            "鹿児島県"=>"かごしまけん",
                            "沖縄県"=>"おきなわけん"
                        ];
                    ?>
                    <input type="text" id="prefecture_kana1" name="prefecture_kana1" readonly><br>
                <label for="municipalities1">市区町村<span class="required">必須</span></label>
                    <input type="text" id="municipalities1" name ="municipalities1">
                    <?php if (!empty($error["municipalities1"]) && $error['municipalities1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>

                <label for="municipalities_kana1">市区町村 ふりがな<span class="required">必須</span></label>
                    <input type="text" id="municipalities_kana1" name="municipalities_kana1"><br>
                    <?php if (!empty($error["municipalities_kana1"]) && $error['municipalities_kana1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>
                <label for="housenumber1">番地<span class="required">必須</span></label>
                    <input type="text" id="housenumber1" name="housenumber1"><br>
                    <?php if (!empty($error["housenumber1"]) && $error['housenumber1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>
                <label for="housenumber_kana1">番地 ふりがな<span class="required">必須</span></label>
                    <input type="text" id="housenumber_kana1" name="housenumber_kana1"><br>
                    <?php if (!empty($error["housenumber_kana1"]) && $error['housenumber_kana1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>
                <label for="mansion1">建物名 部屋番号</label>
                    <input type="text" id="mansion1" name="mansion1"><br>
                    <?php if (!empty($error["mansion1"]) && $error['mansion1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>
                <label for="mansion_kana1">建物名 部屋番号 ふりがな</label>
                    <input type="text" id="mansion_kana1" name="mansion_kana1"><br>
                    <?php if (!empty($error["mansion_kana1"]) && $error['mansion_kana1'] === 'blank'): ?>
                    <p class="error">＊入力してください</p>
                    <?php endif ?>
                    <br>
                    <label>実家等の情報を入力してください</label>
                    <br>
                <label for="postalcode2">郵便番号</label>
                    <input type="text" id="postalcode2" name="postalcode2"><br>
                <label for="prefecture2">都道府県</label>
                    <select id="prefecture2" name="prefecture2">
                        <option value="">---</option>
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="千葉県">千葉県</option>
                        <option value="東京都">東京都</option>
                        <option value="神奈川県">神奈川県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="愛知県">愛知県</option>
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="大分県">大分県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
                    </select><br>

                <label for="prefecture_kana2">都道府県 ふりがな</label>
                    <input type="text" id="prefecture_kana2" name="prefecture_kana2"><br>
                    <?php
                        $prefectureData =[
                            "---"=>"",
                            "北海道"=>"ほっかいどう",
                            "青森県"=>"あおもりけん",
                            "岩手県"=>"いわてけん",
                            "宮城県"=>"みやぎけん",
                            "秋田県"=>"あきたけん",
                            "山形県"=>"やまがたけん",
                            "福島県"=>"ふくしまけん",
                            "茨城県"=>"いばらきけん",
                            "栃木県"=>"とちぎけん",
                            "群馬県"=>"ぐんまけん",
                            "埼玉県"=>"さいたまけん",
                            "千葉県"=>"ちばけん",
                            "東京都"=>"とうきょうと",
                            "神奈川県"=>"かながわけん",
                            "新潟県"=>"にいがたけん",
                            "富山県"=>"とやまけん",
                            "石川県"=>"いしかわけん",
                            "福井県"=>"ふくいけん",
                            "山梨県"=>"やまなしけん",
                            "長野県"=>"ながのけん",
                            "岐阜県"=>"ぎふけん",
                            "静岡県"=>"しずおかけん",
                            "愛知県"=>"あいちけん",
                            "三重県"=>"みえけん",
                            "滋賀県"=>"しがけん",
                            "京都府"=>"きょうとふ",
                            "大阪府"=>"おおさかふ",
                            "兵庫県"=>"ひょうごけん",
                            "奈良県"=>"ならけん",
                            "和歌山県"=>"わかやまけん",
                            "鳥取県"=>"とっとりけん",
                            "島根県"=>"しまねけん",
                            "岡山県"=>"おかやまけん",
                            "広島県"=>"ひろしまけん",
                            "山口県"=>"やまぐちけん",
                            "徳島県"=>"とくしまけん",
                            "香川県"=>"かがわけん",
                            "愛媛県"=>"えひめけん",
                            "高知県"=>"こうちけん",
                            "福岡県"=>"ふくおかけん",
                            "佐賀県"=>"さがけん",
                            "長崎県"=>"ながさきけん",
                            "熊本県"=>"くまもとけん",
                            "大分県"=>"おおいたけん",
                            "宮崎県"=>"みやざきけん",
                            "鹿児島県"=>"かごしまけん",
                            "沖縄県"=>"おきなわけん"
                        ];
                    ?>
                    <script>
                        var prefectureSelect1 = document.getElementById("prefecture1");
                        var prefectureKanaInput1 = document.getElementById("prefecture_kana1");
                        
                        var prefectureSelect2 = document.getElementById("prefecture2");
                        var prefectureKanaInput2 = document.getElementById("prefecture_kana2");

                        // 選択が変更されたときのJavaScriptのイベントリスナーを設定
                        prefectureSelect1.addEventListener("change", function() {
                            var selectedPrefecture = prefectureSelect1.value;
                            var furigana = <?php echo json_encode($prefectureData); ?>[selectedPrefecture];
                            prefectureKanaInput1.value = furigana;
                        });

                        prefectureSelect2.addEventListener("change", function() {
                            var selectedPrefecture = prefectureSelect2.value;
                            var furigana = <?php echo json_encode($prefectureData); ?>[selectedPrefecture];
                            prefectureKanaInput2.value = furigana;
                        });

                        // ふりがな入力フィールドを読み取り専用から通常のフィールドに変更
                        prefectureKanaInput1.readOnly = false;
                        prefectureKanaInput2.readOnly = false;
                    </script>
                    <label for="municipalities2">市区町村</label>
                        <input type="text" id="municipalities2" name="municipalities2"><br>
                    <label for="municipalities_kana2">市区町村 ふりがな</label>
                        <input type="text" id="municipalities_kana2" name="municipalities_kana2"><br>
                    <label for="housenumber2">番地:</label>
                        <input type="text" id="housenumber2" name="housenumber2"><br>
                    <label for="housenumber_kana2">番地 ふりがな</label>
                        <input type="text" id="housenumber_kana2" name="housenumber_kana2"><br>
                    <label for="mansion1">建物名 部屋番号</label>
                        <input type="text" id="mansion2" name="mansion2"><br>
                    <label for="mansion_kana2">建物名 部屋番号 ふりがな</label>
                        <input type="text" id="mansion_kana2" name="mansion_kana2"><br>
                        <br>
                    <label for="p_name">小学校名<span class="required">必須</span></label>
                        <input type="text" name="p_name"><br>
                        <?php if (!empty($error["p_name"]) && $error['p_name'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif ?>
                    <label for="j_name">中学校名<span class="required">必須</span></label>
                        <input type="text" name="j_name"><br>
                        <?php if (!empty($error["j_name"]) && $error['j_name'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif ?>
                    <label for="h_name">高等学校名<span class="required">必須</span></label>
                        <input type="text" name="h_name"><br>
                        <?php if (!empty($error["h_name"]) && $error['h_name'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif ?>
                    <label for="u_name">大学名<span class="required">必須</span></label>
                        <input type="text" name="u_name"><br>
                        <?php if (!empty($error["u_name"]) && $error['u_name'] === 'blank'): ?>
                        <p class="error">＊入力してください</p>
                        <?php endif ?>
                        <label for="educationYears">大学・専門学校の年数</label><br>
                            <select id="educationYears" name="educationYears">
                                <option value="2">2年制</option>
                                <option value="3">3年制</option>
                                <option value="4">4年制</option>
                            </select><br>
                        <br>
                    <label for="pic">プロフィール写真:</label>
                        <input type="file" name="pic"><br>
                </div>
                <div class="control">
                    <button type="submit" class="button">確認する</button>
                </div>
            </form>
        </div>
    </body>
</html>