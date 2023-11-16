<?php
    class DBManager{

        /* 関数一覧
            
            dbConnect

            create_post
            create_post_images
            create_post_sentences
            get_post
            delete_post
            updatePost
            get_post_for_edit
            max_post_id
            max_sentence_id1
            get_regions
            get_all_post
            get_user_info
        */
        

        /* 投稿画面のスポット数の上限 */
        public $spot_limit = 10;

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

        function create_post_images($order,$path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO post_images (post_id,image_order,path)
                                VALUES((SELECT MAX(post_id) FROM posts),?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$order,PDO::PARAM_INT);
            $ps->bindValue(2,$path,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_post_sentence($order,$sentence){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO post_sentences (post_id,sentence_order,sentence)
                                VALUES((SELECT MAX(post_id) FROM posts),?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$order,PDO::PARAM_INT);
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
            
            return $post;
        }
        function delete_post($post_id) {
            $pdo = $this->dbConnect();
            $sql = "DELETE FROM posts WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $post_id, PDO::PARAM_INT);
            $success = $ps->execute();
    
            // 画像と文章も削除する場合
            // $this->delete_post_images($post_id);
            // $this->delete_post_sentences($post_id);
    
            return $success;
        }
        public function delete_post_ignore_constraints($post_id) {
            try {
                $this->connect(); // データベースへの接続
        
                // 強制的に削除するために外部キー制約を無視する
                $sql = "SET foreign_key_checks = 0";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
        
                // 投稿を削除
                $sql = "DELETE FROM posts WHERE post_id = :post_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
                $stmt->execute();
        
                // 外部キー制約を元に戻す
                $sql = "SET foreign_key_checks = 1";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
        
                return true; // 削除成功
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false; // 削除失敗
            }
        }
        //$pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8mb4','root','root');

        private $db_host = 'localhost';
        private $db_name = 'another_sky';
        private $db_user = 'root';
        private $db_pass = 'root';

        private $conn;

        public function __construct()
        {
            $this->connect();
        }

        private function connect()
        {
            try {
                $this->conn = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function updatePost($post_id, $title, $region, $place, $link_path, $text) {
            $pdo = $this->dbConnect();
            $sql = "UPDATE posts
                    SET title = :title, region_id = :region, place = :place, link_path = :link_path, text = :text
                    WHERE post_id = :post_id";
        
            $ps = $pdo->prepare($sql);
            $ps->bindParam(':title', $title, PDO::PARAM_STR);
            $ps->bindParam(':region', $region, PDO::PARAM_INT);
            $ps->bindParam(':place', $place, PDO::PARAM_STR);
            $ps->bindParam(':link_path', $link_path, PDO::PARAM_STR);
            $ps->bindParam(':text', $text, PDO::PARAM_STR);
            $ps->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        
            return $ps->execute();
        }

        function get_post_for_edit($post_id) {
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM posts
                    WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $post_id, PDO::PARAM_INT);
            $ps->execute();
            $post = $ps->fetch();
        
            return $post;
        }

        function max_post_id(){
            $pdo = $this->dbConnect();
            $sql = "SELECT MAX(post_id) AS max_post_id
                    FROM posts";
            $ps = $pdo->query($sql);
            $ps->execute();
            $post_id = $ps->fetch();
            return $post_id["max_post_id"];
        }

        function max_sentence_id1($post_id){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM post_sentences WHERE post_id =?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$post_id,PDO::PARAM_INT);
            $ps->execute();
            $sentence_id = $ps->fetch();
            return $sentence_id["max_sentence_id"];
        }

        /* 元の
        function max_sentence_id(){
            $pdo = $this->dbConnect();
            $sql = "SELECT MAX(sentence_id) AS max_sentence_id
                    FROM post_sentences";
            $ps = $pdo->query($sql);
            $ps->execute();
            $sentence_id = $ps->fetch();
            return $sentence_id["max_sentence_id"];
        }*/
        
        function get_regions(){
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM regions";
            $ps = $pdo->query($sql);
            $ps->execute();
            $regions = $ps->fetchAll();
            return $regions;
        }

        function get_all_posts(){
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM posts";
            $ps = $pdo->query($sql);
            $ps->execute();
            $all_post = $ps->fetchAll();
            
            $sql = "SELECT *
                    FROM post_images
                    WHERE image_order = 0";
            $ps = $pdo->query($sql);
            $ps->execute();
            $first_image = $ps->fetchAll();

            $i = 0;
            $j = 0;
            foreach($all_post as $post) {
                if(isset($first_image[$i]) && $post["post_id"] == $first_image[$i]["post_id"]) {
                    $all_post[$j]["first_image"] = $first_image[$i]["path"];
                    $i++;
                }
                $j++;
            }

            return $all_post;
        }

        function get_my_posts($user_id){
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM posts
                    WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->execute();
            $all_post = $ps->fetchAll();
            
            $sql = "SELECT *
                    FROM post_images
                    WHERE image_order = 0";
            $ps = $pdo->query($sql);
            $ps->execute();
            $first_image = $ps->fetchAll();

            $i = 0;
            $j = 0;
            foreach($all_post as $post) {
                if(isset($first_image[$i]) && $post["post_id"] == $first_image[$i]["post_id"]) {
                    $all_post[$j]["first_image"] = $first_image[$i]["path"];
                    $i++;
                }
                $j++;
            }

            return $all_post;
        }

        function get_user_info($user_id) {
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM users
                    WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->execute();
            $user = $ps->fetch();

            return $user;
        }

        function get_myfavorite_posts($user_id) {
            $pdo = $this->dbConnect();
            $sql = "SELECT p.*
                    FROM keep_posts kp
                    INNER JOIN posts p ON kp.post_id = p.post_id
                    WHERE kp.user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->execute();
            $myfavorite_posts = $ps->fetchAll();
            
            $sql = "SELECT *
                    FROM post_images
                    WHERE image_order = 0";
            $ps = $pdo->query($sql);
            $ps->execute();
            $first_image = $ps->fetchAll();

            $i = 0;
            $j = 0;
            foreach($myfavorite_posts as $post) {
                if(isset($first_image[$i]) && $post["post_id"] == $first_image[$i]["post_id"]) {
                    $myfavorite_posts[$j]["first_image"] = $first_image[$i]["path"];
                    $i++;
                }
                $j++;
            }

            return $myfavorite_posts;
        }

        function keep_post($user_id,$post_id){
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    From keep_posts
                    WHERE user_id=? AND post_id=?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$user_id,PDO::PARAM_INT);
            $ps->bindValue(2,$post_id,PDO::PARAM_STR);
            $ps->execute();
            $post = $ps->fetch();
            if(!empty($post)){
                $sql = "DELETE FROM keep_posts
                        WHERE  user_id=? AND post_id=?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$user_id,PDO::PARAM_INT);
                $ps->bindValue(2,$post_id,PDO::PARAM_STR);
                $ps->execute();
                echo "fuck";
            }else{
                $sql = "INSERT INTO keep_posts(user_id,post_id)
                        VALUES(?,?)";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$user_id,PDO::PARAM_INT);
                $ps->bindValue(2,$post_id,PDO::PARAM_STR);
                $ps->execute();
                echo "fucking";
            }

        }
        //post/keep
        function get_posts_by_keep_id($keep_id) {
            $pdo = $this->dbConnect();
            $sql = "SELECT p.*
                    FROM keep_posts kp
                    INNER JOIN posts p ON kp.post_id = p.post_id
                    WHERE kp.user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $keep_id, PDO::PARAM_INT);
            $ps->execute();
            $posts = $ps->fetchAll();
        
            $sql = "SELECT *
                    FROM post_images
                    WHERE image_order = 0";
            $ps = $pdo->query($sql);
            $ps->execute();
            $first_images = $ps->fetchAll();
        
            $i = 0;
            $j = 0;
            foreach ($posts as $post) {
                if (isset($first_images[$i]) && $post["post_id"] == $first_images[$i]["post_id"]) {
                    $posts[$j]["first_image"] = $first_images[$i]["path"];
                    $i++;
                }
                $j++;
            }
        
            return $posts;
        }
            //post/user
            function get_posts_by_user_id($user_id) {
                $pdo = $this->dbConnect();
                $sql = "SELECT p.*
                        FROM keep_posts kp
                        INNER JOIN posts p ON kp.post_id = p.post_id
                        WHERE kp.user_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $user_id, PDO::PARAM_INT);
                $ps->execute();
                $posts = $ps->fetchAll();
            
                $sql = "SELECT *
                        FROM post_images
                        WHERE image_order = 0";
                $ps = $pdo->query($sql);
                $ps->execute();
                $first_images = $ps->fetchAll();
            
                $i = 0;
                $j = 0;
                foreach ($posts as $post) {
                    if (isset($first_images[$i]) && $post["post_id"] == $first_images[$i]["post_id"]) {
                        $posts[$j]["first_image"] = $first_images[$i]["path"];
                        $i++;
                    }
                    $j++;
                }
            
                return $posts;
            }
        
        function get_region_posts($region_id){
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM posts
                    WHERE region_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $region_id, PDO::PARAM_INT);
            $ps->execute();
            $all_post = $ps->fetchAll();
            
            $sql = "SELECT *
                    FROM post_images
                    WHERE image_order = 0";
            $ps = $pdo->query($sql);
            $ps->execute();
            $first_image = $ps->fetchAll();

            $i = 0;
            $j = 0;
            foreach($all_post as $post) {
                if(isset($first_image[$i]) && $post["post_id"] == $first_image[$i]["post_id"]) {
                    $all_post[$j]["first_image"] = $first_image[$i]["path"];
                    $i++;
                }
                $j++;
            }

            return $all_post;
        }
        
        
    }

?>