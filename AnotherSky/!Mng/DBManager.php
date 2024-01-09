<?php
    class DBManager{

        /* 関数一覧
            
            dbConnect

            mail_check
            sign_up
            sign_in

            get_regions
            create_post
            create_post_images
            create_post_sentences

            get_posts
            get_post
            get_keep_post_flag //
            delete_post
            updatePost
            get_post_for_edit
            get_user
            get_myfavorite_posts
            get_myfavorite_posts2
            keep_post
            get_posts_by_keep_id
            get_posts_by_user_id

        */
        

        /* 投稿画面のスポット数の上限 */
        public $spot_limit = 10;

        private function dbConnect(){
            //$pdo = new PDO('mysql:host=mysql215.phy.lolipop.lan;dbname=LAA1570577-anothersky;charset=utf8mb4','LAA1570577','I7RnRX7MhP7QeRP');
            $pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8mb4','root','root');
            return $pdo;
        }


        /*  mail_check

            メールアドレスの存在確認をする関数

            引数
                mail       メールアドレス
            
            戻り値
                メールアドレスに該当するユーザのレコード　１行
        */
        function mail_check($mail) {
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM users WHERE mail=? LIMIT 1"; // テーブル名を修正
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $mail, PDO::PARAM_STR);
            $ps->execute();
            $mailcheck = $ps->fetch();

            return $mailcheck;
        }


        /*  sign_up

            アカウントを登録する関数

            引数
                mail       メールアドレス
                pass       パスワード
                name       ユーザー名
            
            戻り値
                なし
        */
        function sign_up($mail, $pass, $name) {
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO users(mail, password, name) VALUES(?,?,?)"; // テーブル名を修正
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $mail, PDO::PARAM_STR);
            $ps->bindValue(2, password_hash($pass, PASSWORD_DEFAULT), PDO::PARAM_STR);
            //$ps->bindValue(2, $pass, PDO::PARAM_STR);
            $ps->bindValue(3, $name, PDO::PARAM_STR);
            $ps->execute();
        }


        /*  sign_in

            ログイン処理をする関数

            引数
                mail       メールアドレス
                pass       パスワード
            
            戻り値
                メールアドレス及びパスワードに該当するユーザのレコード　１行
        */
        function sign_in($mail, $pass) {
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM users WHERE mail = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$mail,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetch();
            if(!empty($search)){
                if(password_verify($pass,$search["password"]) == true){
                    return $search;
                }
                /*if($pass == $search["password"]){
                    return $search;
                }*/
            }
            return $search = [];
        }


        /*  get_regions

            全ての地方を取得する関数

            引数
                なし
            
            戻り値
                地方の全レコード
        */
        function get_regions(){
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM regions";
            $ps = $pdo->query($sql);
            $ps->execute();
            $regions = $ps->fetchAll();
            return $regions;
        }


        /*  create_post

            投稿を保存する関数

            引数
                user_id    ユーザID
                title      投稿のタイトル
                region_id  地方ID
                place      場所
                link_path  youtubeのリンク
                text       投稿の紹介文

            戻り値
                
        */
        function create_post($user_id,$title,$region_id,$place,$link_path,$text){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO posts (user_id,title,region_id,place,link_path,text)
                                VALUES(?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$user_id,PDO::PARAM_INT);
            $ps->bindValue(2,$title,PDO::PARAM_STR);
            $ps->bindValue(3,$region_id,PDO::PARAM_INT);
            $ps->bindValue(4,$place,PDO::PARAM_STR);
            $ps->bindValue(5,$link_path,PDO::PARAM_STR);
            $ps->bindValue(6,$text,PDO::PARAM_STR);
            $ps->execute();
        }


        /*  create_post_images

            投稿に関する画像を保存する関数

            引数
                order      画像の並び順
                path       画像のパス

            戻り値
                なし
        */
        function create_post_images($order,$path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO post_images (post_id,image_order,path)
                                VALUES((SELECT MAX(post_id) FROM posts),?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$order,PDO::PARAM_INT);
            $ps->bindValue(2,$path,PDO::PARAM_STR);
            $ps->execute();
        }


        /*  create_post_sentence

            投稿に関する画像を保存する関数

            引数
                order      文の並び順
                sentence   文

            戻り値
                なし
        */
        function create_post_sentence($order,$sentence){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO post_sentences (post_id,sentence_order,sentence)
                                VALUES((SELECT MAX(post_id) FROM posts),?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$order,PDO::PARAM_INT);
            $ps->bindValue(2,$sentence,PDO::PARAM_STR);
            $ps->execute();
        }


        /*  get_posts

            全ての投稿を取得する関数

            引数
                なし

            戻り値
                投稿の全レコード
        */
        function get_posts(){
            $pdo = $this->dbConnect();
            
            $sql = "SELECT posts.post_id AS post_id, user_id, region_id, place,
                            link_path, text, date, image_id, image_order, path
                    FROM posts
                    LEFT JOIN post_images 
                        ON posts.post_id = post_images.post_id 
                            AND post_images.image_order = 0;";
            $ps = $pdo->query($sql);
            $ps->execute();
            $posts = $ps->fetchAll();

            return $posts;
        }


        /*  get_post

            投稿の詳細を取得する関数

            引数
                post_id     投稿ID

            戻り値
                post_idに該当する投稿、及び該当する画像と文章を付随させたレコード　１行
        */
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


        /*  get_keep_post_flag

            保存投稿から該当するレコードを取得する関数

            引数
                post_id     投稿ID
                user_id     ユーザID

            戻り値
                post_id及びuser_idに該当する保存投稿のレコード　1行または空値
        */
        function get_keep_post_flag($post_id, $user_id) {
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM keep_posts
                    WHERE post_id = ? AND user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$post_id,PDO::PARAM_INT);
            $ps->bindValue(2,$user_id,PDO::PARAM_INT);
            $ps->execute();
            $row = $ps->fetch();

            return $row;
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


        //投稿削除（画像削除も）
        public function delete_post_and_images_ignore_constraints($post_id) {
            try {
                $this->dbConnect(); // データベースへの接続
        
                // 強制的に削除するために外部キー制約を無視する
                $sql = "SET foreign_key_checks = 0";
                $stmt = $this->dbConnect()->prepare($sql);
                $stmt->execute();
        
                // 画像を削除
                $this->delete_post_images($post_id);
        
                // 投稿を削除
                $sql = "DELETE FROM posts WHERE post_id = :post_id";
                $stmt = $this->dbConnect()->prepare($sql);
                $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
                $stmt->execute();
        
                // 外部キー制約を元に戻す
                $sql = "SET foreign_key_checks = 1";
                $stmt = $this->dbConnect()->prepare($sql);
                $stmt->execute();
        
                return true; // 削除成功
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false; // 削除失敗
            }
        }
        
            
        private function delete_post_images($post_id) {
            try {
                $sql = "DELETE FROM post_images WHERE post_id = :post_id";
                $stmt = $this->dbConnect()->prepare($sql);
                $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error deleting images: " . $e->getMessage();
            }
        }
        /*public function delete_post_ignore_constraints($post_id) {
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
        private function delete_post_images($post_id) {
            try {
                $sql = "DELETE FROM post_images WHERE post_id = :post_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error deleting images: " . $e->getMessage();
            }
        }*/
        //$pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8mb4','root','root');


        /*  update_post

            投稿の内容を更新する関数

            引数
                post_id
                title      投稿のタイトル
                region_id  地方ID
                place      場所
                link_path  youtubeのリンク
                text       投稿の紹介文

            戻り値
                true
        */
        function updatePost($post_id, $title, $region_id, $place, $link_path, $text) {
            $pdo = $this->dbConnect();
            $sql = "UPDATE posts
                    SET title = :title, region_id = :region_id, place = :place, link_path = :link_path, text = :text
                    WHERE post_id = :post_id";
        
            $ps = $pdo->prepare($sql);
            $ps->bindParam(':title', $title, PDO::PARAM_STR);
            $ps->bindParam(':region_id', $region_id, PDO::PARAM_INT);
            $ps->bindParam(':place', $place, PDO::PARAM_STR);
            $ps->bindParam(':link_path', $link_path, PDO::PARAM_STR);
            $ps->bindParam(':text', $text, PDO::PARAM_STR);
            $ps->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        
            $ps->execute();
            return true;
        }



        function get_user($user_id) {
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

        function get_keep_posts($user_id) {
            $pdo = $this->dbConnect();
            $sql = "SELECT keep_id, kp.user_id, kp.post_id, title, region_id,
                            place, link_path, text, date, image_id, image_order, path
                    FROM keep_posts AS kp
                    LEFT JOIN posts AS p ON p.post_id = kp.post_id
                    LEFT JOIN post_images AS pi ON kp.post_id = pi.post_id AND image_order = 0
                    WHERE kp.user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $user_id, PDO::PARAM_INT);
            $ps->execute();
            $posts = $ps->fetchAll();

            return $posts;
        }

        function get_myfavorite_posts2($user_id) {
            $pdo = $this->dbConnect();
            $sql = "SELECT p.*
                    FROM keep_posts kp
                    INNER JOIN posts p ON kp.post_id = p.post_id
                    WHERE kp.user_id = ?
                    ORDER BY p.post_id ASC";
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
                echo $post["post_id"];
            }
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

            }else{

                $sql = "INSERT INTO keep_posts(user_id,post_id)
                        VALUES(?,?)";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$user_id,PDO::PARAM_INT);
                $ps->bindValue(2,$post_id,PDO::PARAM_STR);
                $ps->execute();

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
            

    //     function favorite_post($post_id, $user_id){
    //         $pdo = new PDO('mysql:host=localhost;dbname=another_sky;charset=utf8mb4','root','root');
    //         $pdo = $this->dbConnect();
    //         $sql = "SELECT * FROM keep_posts WHERE post_id = $post_id AND user_id = 2";
    //         $ps = $pdo->prepare($sql);
    //         $ps->execute();
    //         $resultFavorite = $ps->fetchAll();
    //         return $resultFavorite;
    //     }
    }

?>