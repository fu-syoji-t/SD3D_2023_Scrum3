<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Element Between Existing Elements</title>
    <style>
        .box {
            border: 1px solid #ccc;
            margin: 5px 30px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div class="spot">
            <button type="button" onclick="insertNewElement(this.parentNode)">＋</button>
        </div>
        <div class="spot">
            <button type="button" onclick="removeElement(this.parentNode)">－</button>
            <div class="box">child</div>
            <button type="button" onclick="insertNewElement(this.parentNode)">＋</button>
        </div>
        
    </div>
<script>
function insertNewElement(element) {

    // 親要素を作成
    var newElement = document.createElement('div');
    newElement.className = 'spot';

    // 子要素を作成
    var newBox = document.createElement('div');
    newBox.className = 'box';
    newBox.textContent = '新しい要素'+Math.random();

    // 子要素を作成
    var newInsertButton = document.createElement('button');
    newInsertButton.textContent = '＋';
    newInsertButton.onclick = function() {
        insertNewElement(this.parentNode);
    };

    // 子要素を作成
    var newRemoveButton = document.createElement('button');
    newRemoveButton.textContent = '－';
    newRemoveButton.onclick = function() {
        removeElement(this.parentNode);
    };

    // 子要素を親要素へ挿入
    newElement.appendChild(newRemoveButton);
    newElement.appendChild(newBox);
    newElement.appendChild(newInsertButton);

    // 親要素を挿入する位置の要素を取得
    var position = getPosition(element);
    console.log('要素の位置:', position);
    var container = document.getElementById('container');
    var existingElement = container.children[position];

    // 特定の位置に新しい要素を挿入
    container.insertBefore(newElement, existingElement.nextSibling);
}

function removeElement(element) {
    var container = document.getElementById('container');
    container.removeChild(element);
}

// 特定の要素の位置を取得
function getPosition(element) {
    var parent = element.parentNode;
    var children = Array.from(parent.children);

    var index = children.indexOf(element);
    return index;
}

</script>

</body>
</html>