<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="localhost-custom/style.css">
    <title>Localhost</title>
</head>

<body>
    <div class="wrapper">
        <header>
            Workspace

        </header>
        <hr>
        <div class="content">
            <?php
            function scan_dir($dir_lm)
            {
                $ignored = array('.', '..', '.svn', '.htaccess');
                $files = array();
                foreach (scandir($dir_lm) as $file) {
                    if (in_array($file, $ignored)) continue;
                    $files[$file] = filemtime($dir_lm . '/' . $file);
                }
                arsort($files);
                $files = array_keys($files);
                return ($files) ? $files : false;
            }
            $dir = scan_dir(getcwd());
            ?>
            <table border="1" cellspacing="0" class="scroll">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dir as $file) : ?>
                        <?php if ($file != "." && $file != ".." && $file != "index.php") : ?>
                            <tr>
                                <td><?php echo $file; ?></td>
                                <td> <a href="<?php echo $file; ?>">Open</a></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="http://localhost/phpmyadmin/" target="_blank"><small>phpmyadmin</small></a><br>
        </div>
    </div>
</body>

</html>