<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شناسایی متمم</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .motamem {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>شناسایی متمم در متن</h1>
    <form method="post">
        <textarea name="inputText" rows="4" cols="50" placeholder="متن خود را اینجا وارد کنید..."><?php echo isset($_POST['inputText']) ? htmlspecialchars($_POST['inputText']) : ''; ?></textarea><br>
        <button type="submit">شناسایی متمم</button>
    </form>
    
    <div id="output">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['inputText'])) {
            $text = $_POST['inputText'];
            //with Preposition
            // $regex = '/(به\s+\S+|از\s+\S+|در\s+\S+|با\s+\S+)/u';
            // $highlightedText = preg_replace($regex, '<span class="motamem">$0</span>', $text);

            $regex = '/(?:به|از|در|با)\s+(\S+)/u'; // فقط متمم را گروه‌بندی می‌کنیم
            $highlightedText = preg_replace($regex, '<span class="motamem">$1</span>', $text);

            echo $highlightedText;
        }
        ?>
    </div>
</body>
</html>