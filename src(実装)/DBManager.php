<?php
    class DBManager{

        private function dbConnect(){
            /* パスワード設定
            xampp mysqlを起動
            Shell >> mysql -u root -p を入力
            パスワードが設定されていない場合　何も入力せずenter
            SET PASSWORD FOR root@localhost=password('root'); でパスワードを設定

            xampp >> config.inc.php
            >>
            $cfg['Servers'][$i]['password'] = 'root';　ここに同じパスワードを入力
            */

            // $pdo = new PDO('mysql:host=mysql215.phy.lolipop.lan;dbname=LAA1418719-23dev3early;charset=utf8mb4','LAA1418719','teamd');
            $pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8mb4','root','root');
            return $pdo;
        }

        function create($loginID,$password,$nickname,$course,$major,$grade,$classname,$Fsubject){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO users (user_loginID,user_password,user_name,user_course,
                                        user_major,user_grade,user_classname,user_Fsubject)
                                VALUES(?,?,?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
            $ps->bindValue(3,$nickname,PDO::PARAM_STR);
            $ps->bindValue(4,$course,PDO::PARAM_STR);
            $ps->bindValue(5,$major,PDO::PARAM_STR);
            $ps->bindValue(6,$grade,PDO::PARAM_STR_CHAR);
            $ps->bindValue(7,$classname,PDO::PARAM_STR);
            $ps->bindValue(8,$Fsubject,PDO::PARAM_STR);
            $ps->execute();

            $sql = "INSERT INTO `evaluation` (`user_id`,`evaluation_trp`,`evaluation_receivednum`,
                                `evaluation_receivedvalue`,`evaluation_sentnum`,`evaluation_sentvalue`)
                                VALUES((SELECT MAX(user_id) FROM users),0,0,0,0,0)";
            $ps = $pdo->prepare($sql)->execute();
        }

        function login($loginID,$password){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM users WHERE user_loginID = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            if(!empty($search)){
                foreach($search as $row){
                    if(password_verify($password,$row["user_password"]) == true){
                        return $search;
                    }
                }
            }
            return $search=[];
        }

    }

?>