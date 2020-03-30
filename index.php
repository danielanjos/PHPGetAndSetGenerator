<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
    <title>PHP Get and Set Generator</title>
</head>

<body>



    <main class="container">
        <header>
            <h1>PHP get and set generator</h1>
            <span>(for lazy people)</span>
        </header>
        <section class="content">
            <form action="generator.php" method="POST" id="formGenerator">
                <label for="txtClass">Class (<b>Attributes only</b>):</label>

                <textarea name="txtClass" id="txtClass" cols="55" rows="30" placeholder="<?= "private \$id;\nprotected \$type;\npublic \$whatever;" ?>"><?php if (isset($_SESSION["txtClass"])) echo $_SESSION["txtClass"]; ?></textarea>

                <div class="input-group">
                    <input type="checkbox" name="generateConstructor" id="generateConstructor"><label for="generateConstructor"><small>Constructor</small></label>
                    <button type="submit" class="button">Generate</button>
                </div>

            </form>

            <section>
                <label for="btnCopy">Result:</label>
                <textarea name="txtResult" id="txtResult" cols="55" rows="30"><?php if (isset($_SESSION["resultado"])) {
                                                                                    echo $_SESSION["resultado"];
                                                                                } ?></textarea>
                <div class="input-group">
                    <button type="button" id="btnCopy" class="button" id="btnCopy">Copy</button>
                </div>
            </section>
        </section>
    </main>

    <script>
        document.querySelector("#btnCopy").onclick = function() {
            console.log('click');
            document.querySelector("#txtResult").select();
            document.execCommand('copy');
        }
    </script>
</body>

</html>




<?php
session_destroy();
?>