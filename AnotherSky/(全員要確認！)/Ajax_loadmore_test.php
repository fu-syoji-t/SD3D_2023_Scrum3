<!-- index.html -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get Post Data</title>
</head>
<body>
  <h1>Get Post Data</h1>
  <form id="getPostForm">
    <label for="postId">Enter Post ID:</label>
    <input type="text" id="postId" name="post_id" required>
    <button type="button" onclick="getPostData()">Get Data</button>
  </form>
  <div id="result"></div>

  <script>
    // フォームデータを取得し、サーバーサイドに送信してデータを取得する関数
    function getPostData() {
      const postId = document.getElementById('postId').value;

      fetch(`http://localhost:3000/getPostData?post_id=${postId}`)
        .then(response => response.json())
        .then(data => {
          displayResult(data);
        })
        .catch(error => {
          console.error('Error fetching data:', error);
          displayResult({ error: 'Failed to fetch data' });
        });
    }

    // 取得したデータを表示する関数
    function displayResult(data) {
      const resultContainer = document.getElementById('result');
      resultContainer.innerHTML = '';

      if (data.error) {
        resultContainer.innerHTML = `<p>Error: ${data.error}</p>`;
      } else {
        resultContainer.innerHTML = `<p>Post Title: ${data[0].title}</p>`;
        // 他のデータも表示する場合は適宜追加
      }
    }
  </script>
</body>
</html>
