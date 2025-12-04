<?php
    $num_children = $_GET['num_children'] ?? '';
    $children_names = $_GET['children_names'] ?? '';
    $music_url = $_GET['music_url'] ?? '';
    $performance_type = $_GET['performance_type'] ?? '';
    $ready = $_GET['ready'] ?? false;
    $ready = filter_var($ready, FILTER_VALIDATE_BOOLEAN);
    $errors = [];
    if (count($_GET)){
        if (trim($num_children) === '')
            $errors['num_children'] = 'Number of children must be specified.'; 
        else if (filter_var($num_children, FILTER_VALIDATE_INT) === false)
            $errors['num_children'] = 'Number of children must be an integer.';
        else if ($num_children < 1)
            $errors['num_children'] = 'Number of children must be positive.';

        if (trim($children_names) === '')
            $errors['children_names'] = 'Children\'s names must be specified.'; 
        else if (!isset($errors['num_children']) && count(explode(',', $children_names)) != $num_children)
            $errors['children_names'] = 'Number of names must match number of children.';

        if (trim($music_url) === '')
            $errors['music_url'] = 'Music URL must be specified.'; 
        else if (!filter_var($music_url, FILTER_VALIDATE_URL))
            $errors['music_url'] = 'Music URL must be a valid URL.';

        if (trim($performance_type) === '')
            $errors['performance_type'] = 'Performance type must be specified.';
        else if ($performance_type != 'poem' && $performance_type != 'song')
            $errors['performance_type'] = 'Performance type must be either poem or song.';

        if (!$ready)
            $errors['ready'] = 'Someone is not ready yet.';

        $errors = array_map(function($e) { 
            return "<span style='color: red'>$e</span>";
        }, $errors);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Performance</title>
</head>
<body>
    <h1>Performance</h1>
    <form action="index.php" method="get" novalidate>
        <label for="i1">Number of children:</label> <input type="text" name="num_children" id="i1" value="<?= $num_children ?>"> <?= $errors['num_children'] ?? '' ?> <br>
        <label for="i2">Children's names:</label> <input type="text" name="children_names" id="i2" value="<?= $children_names ?>"> <?= $errors['children_names'] ?? '' ?> <br>
        <label for="i3">URL of music to be played:</label> <input type="text" name="music_url" id="i3" value="<?= $music_url ?>"> <?= $errors['music_url'] ?? '' ?> <br>
        <label for="i4">Performance type:</label> <input type="text" name="performance_type" id="i4" value="<?= $performance_type ?>"> <?= $errors['performance_type'] ?? '' ?>  <br>
        <input type="checkbox" name="ready" id="i5" <?= $ready ? 'checked' : '' ?>><label for="i5">Everyone is ready</label> <?= $errors['ready'] ?? '' ?>  <br>
        <button type="submit">Submit</button>
    </form>
    <?php if (count($_GET) > 0 && count($errors) === 0): ?>
        <div class="merry">🎄 MERRY CHRISTMAS AND HAPPY NEW YEAR! 🎄</div>
    <?php endif; ?>
    <h2>Test cases</h2>
        <a href="index.php?num_children=&children_names=&music_url=&performance_type=">num_children=&children_names=&music_url=&performance_type=</a><br>
        <a href="index.php?num_children=n&children_names=&music_url=&performance_type=">num_children=n&children_names=&music_url=&performance_type=</a><br>
        <a href="index.php?num_children=6.7&children_names=&music_url=&performance_type=">num_children=6.7&children_names=&music_url=&performance_type=</a><br>
        <a href="index.php?num_children=0&children_names=&music_url=&performance_type=">num_children=0&children_names=&music_url=&performance_type=</a><br>
        <a href="index.php?num_children=3&children_names=Adam%2CBarbara&music_url=&performance_type=">num_children=3&children_names=Adam%2CBarbara&music_url=&performance_type=</a><br>
        <a href="index.php?num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=&performance_type=">num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=&performance_type=</a><br>
        <a href="index.php?num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=5c3ezwen&performance_type=">num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=5c3ezwen&performance_type=</a><br>
        <a href="index.php?num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=">num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=</a><br>
        <a href="index.php?num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=good">num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=good</a><br>
        <a href="index.php?num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=song">num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=song</a><br>
        <a href="index.php?num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=song&ready=on">num_children=3&children_names=Adam%2CBarbara%2CChloe&music_url=http%3A%2F%2Ftinyurl.com%2F5c3ezwen&performance_type=song&ready=on</a><br>
</body>
</html>
