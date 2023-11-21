
                <?php
                require("./dbconnect.php");
                session_start();
                $b_year = isset($_SESSION["b_year"]) ? $_SESSION["b_year"] : 0;
                $earlyBirth = isset($_SESSION["earlyBirth"]) ? $_SESSION["earlyBirth"] : "";
                $educationYears = isset($_SESSION["educationYears"]) ? $_SESSION["educationYears"] : 0;


                    if ($_SERVER["REQUEST_METHOD"]=== "POST"){
                        $b_year = intval($_POST["b_year"]);
                        $earlyBirth = $_POST["earlyBirth"];
                        $educationYears = intval($_POST["educationYears"]);
                    }
                    if(strtolower($earlyBirth) === "はい"){
                        $b_year--;
                    }
                    $S = $b_year + 7;
                    $p_year = $b_year + 13;
                    $j_year = $b_year + 16;
                    $h_year = $b_year + 19;
                    $u_year = $b_year + 23;

                    if($educationYears === 2){
                        $u_year = $b_year + 21;
                    }elseif($educationYears === 3){
                        $u_year = $b_year + 22;
                    }elseif($educationYears === 4){
                        $u_year = $b_year + 23;
                    }
                    
                    echo "<h2>学歴情報</h2>";
                    echo "<p>- " . $b_year . "年 - 誕生</p>";
                    echo "<p>- " . $S . "年 4月 - 小学校入学</p>";
                    echo "<p>- " . $p_year . "年 3月 - 小学校卒業</p>";
                    echo "<p>- " . $p_year . "年 4月 - 中学校入学</p>";
                    echo "<p>- " . $j_year . "年 3月 - 中学校卒業</p>";
                    echo "<p>- " . $j_year . "年 4月 - 高校入学</p>";
                    echo "<p>- " . $h_year . "年 3月 - 高校卒業</p>";
                    echo "<p>- " . $h_year . "年 4月 - 大学・専門学校入学</p>";
                    echo "<p>- " . $u_year . "年 3月 - 大学・専門学校卒業</p>";
                    
                ?>