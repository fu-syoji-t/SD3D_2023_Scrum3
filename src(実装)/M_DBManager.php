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

        function create_post($user_id,$title,$region_id,$place,$link,$text){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO posts (user_id,title,region_id,place,link_path,text)
                                VALUES(?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$user_id,PDO::PARAM_INT);
            $ps->bindValue(2,$title,PDO::PARAM_STR);
            $ps->bindValue(3,$region_id,PDO::PARAM_INT);
            $ps->bindValue(4,$place,PDO::PARAM_STR);
            $ps->bindValue(5,$link,PDO::PARAM_STR);
            $ps->bindValue(6,$text,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_post_images($image_order,$path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO post_images (post_id,image_order,path)
                                VALUES((SELECT MAX(post_id) FROM posts),?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$image_order,PDO::PARAM_INT);
            $ps->bindValue(2,$path,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_post_sentence($sentence_order,$sentence){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO post_sentences (post_id,sentence_order,sentence)
                                VALUES((SELECT MAX(post_id) FROM posts),?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$sentence_order,PDO::PARAM_INT);
            $ps->bindValue(2,$sentence,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_post($post_id){
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM posts
                    WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$post_id,PDO::PARAM_INT);
            $ps->execute();
            $post = $ps->fetch();

            $sql = "SELECT name
                    FROM regions
                    WHERE region_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$post["region_id"],PDO::PARAM_INT);
            $ps->execute();
            $post["region"] = $ps->fetch();

            $sql = "SELECT *
                    FROM post_images
                    WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$post_id,PDO::PARAM_INT);
            $ps->execute();
            $post["images"] = $ps->fetchAll();

            $sql = "SELECT *
                    FROM post_sentences
                    WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$post_id,PDO::PARAM_INT);
            $ps->execute();
            $post["sentences"] = $ps->fetchAll();
            
            /*if(count($post["sentences"]) < count($post["sentences"])){
                $post["max_spot"] = count($post["sentences"]);
            }else{
                $post["max_spot"] = count($post["images"]);
            }*/

            return $post;
        }

        function max_post_id(){
            $pdo = $this->dbConnect();
            $sql = "SELECT MAX(post_id)
                    FROM posts";
            $ps = $pdo->query($sql);
            $ps->execute();
            $post_id = $ps->fetchAll();
            return $post_id[0];
        }

    }

?>