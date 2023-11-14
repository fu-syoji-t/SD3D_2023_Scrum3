const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3080;

// MySQL接続情報
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'root',
  database: 'another_sky',
});

// MySQL接続
connection.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    throw err;
  }

  console.log('Connected to MySQL');
});

// フォームでpost_idを入力し、該当のデータを取得するエンドポイント
app.get('/getPostData', (req, res) => {
  // フォームで入力されたpost_id
  const postIdToRetrieve = req.query.post_id;

  // post_idが一致するデータを取得するクエリ
  const query = `SELECT * FROM posts WHERE post_id = ${postIdToRetrieve}`;

  // クエリを実行
  connection.query(query, (error, results, fields) => {
    if (error) {
      console.error('Error executing query:', error);
      res.status(500).send('Internal Server Error');
      return;
    }

    // 取得したデータをJSON形式で返す
    res.json(results);
  });
});

// サーバーを起動
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
