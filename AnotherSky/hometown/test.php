<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Input Fields</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div id="inputContainer">
        <!-- 初期の入力フィールド -->
        <input type="text" name="dynamicInput[]" />
        <button onclick="toggleVisibility(this)">表示/非表示</button>
    </div>

    <script>
        function addInput() {
            var container = document.getElementById('inputContainer');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'dynamicInput[]';

            var newButton = document.createElement('button');
            newButton.textContent = '表示/非表示';
            newButton.onclick = function() {
                toggleVisibility(this);
            };

            container.appendChild(newInput);
            container.appendChild(newButton);
        }

        function toggleVisibility(button) {
            var container = button.parentElement;
            var input = container.querySelector('input');

            // 対応する input 要素の表示状態を切り替える
            if (input.classList.contains('hidden')) {
                input.classList.remove('hidden');
            } else {
                input.classList.add('hidden');
            }
        }
    </script>

    <button onclick="addInput()">新しい入力フィールドを追加</button>
</body>
</html>
