<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vyzyz Projects</title>
    <link rel="icon" href="https://www.pngkey.com/png/full/139-1391859_clouds-clipart-clear-background-cloud-vector-transparent-background.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a class="logo">
            <h2>Vyzyz's Projects</h2>
        </a>
        <nav>
            <ul class="nav__links">
                <li><a href="http://localhost/phpmyadmin/">PhpMyAdmin</a></li>
                <li><a href="https://github.com/alvinzf">About</a></li>
            </ul>
        </nav>
        <a class="cta" href="#searchBar">Search</a>
        <p class="menu cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="http://localhost/phpmyadmin/">PhpMyAdmin</a>
            <a href="https://github.com/alvinzf">About</a>
        </div>
    </div>

    <script type="text/javascript" src="mobile.js"></script>
    <div class="center" style="margin-left: 100px;">
        <input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Search for projects..">
        <div id="cover">

            <div>
                <?php
                //Scan working directory
                $cwd_path = getcwd();
                $cwd = scandir($cwd_path);

                //Filter and only keep the directories
                function is_directory($value)
                {
                    if ($value == '.' || $value == '..') {
                        return;
                    }

                    $path = getcwd() . '\\' . $value;
                    return is_dir($path);
                }

                $directories = array_filter($cwd, 'is_directory');

                //show directories on screen
                function directory_html($value)
                {
                ?>
                    <div class="directory">
                        <a href="/<?php echo $value; ?>">
                            <h3 class="bold"><?php echo $value; ?></h3>
                        </a>
                    </div>
                <?php
                }
                ?>
                <div class="wrapper"><?php array_map(
                                            'directory_html',
                                            $directories
                                        ); ?> </div>

            </div>
        </div>
</body>

</html>

<script>
    function myFunction() {
        let input = document.getElementById('searchBar').value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('directory');

        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else {
                x[i].style.display = "list-item";
            }
        }
    }
</script>