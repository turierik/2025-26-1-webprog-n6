<?php
include_once('memberstorage.php');
include_once('ideastorage.php');
$ms = new MemberStorage();
$is = new IdeaStorage();

$id = $_GET['id'];
$member = $ms->findById($id);

if (count($_POST) > 0) {
  if (isset($_POST['function-add'])) {
    $is->add([
      'idea'      => $_POST['idea'],
      'status'    => 'new',
      'member_id' => $id,
    ]);
    header("Location: member.php?id=${id}");
    exit();
  }
  else if (isset($_POST['function-ok'])) {
    $idea_id = $_POST['idea-id'];
    $idea = $is->findById($idea_id);
    $idea['status'] = 'ok';
    $is->update($idea_id, $idea);
    header("Location: member.php?id=${id}");
    exit();
  }
  else if (isset($_POST['function-discard'])) {
    $idea_id = $_POST['idea-id'];
    $idea = $is->findById($idea_id);
    $idea['status'] = 'discarded';
    $is->update($idea_id, $idea);
    header("Location: member.php?id=${id}");
    exit();
  }
}

$ideas_ok = $is->findAll([
  'member_id' => $id,
  'status'    => 'ok',
]);
$ideas_new = $is->findAll([
  'member_id' => $id,
  'status'    => 'new',
]);
$ideas_discarded = $is->findAll([
  'member_id' => $id,
  'status'    => 'discarded',
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gift list</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <h1>Ideas for <?= $member['name'] ?></h1>
  <a href="index.php">Back to main page</a>
  <form action="" method="post">
    <fieldset>
      <legend>New idea</legend>
      Idea: <input type="text" name="idea" required> <br>
      <button name="function-add" type="submit">Add new idea</button>
    </fieldset>
  </form>
  <ul>
    <?php foreach($ideas_ok as $idea) : ?>
      <li class="ok">
        <?= $idea['idea'] ?>
      </li>
    <?php endforeach ?>
    <?php foreach($ideas_new as $idea) : ?>
      <li class="new">
        <?= $idea['idea'] ?>
        <form action="" method="post">
          <input type="hidden" name="idea-id" value="<?= $idea['id'] ?>">
          <button type="submit" name="function-ok">Got it!</button>
          <button type="submit" name="function-discard">Discard it!</button>
        </form>
      </li>
    <?php endforeach ?>
    <?php foreach($ideas_discarded as $idea) : ?>
      <li class="discarded">
        <?= $idea['idea'] ?>
      </li>
    <?php endforeach ?>
  </ul>
</body>
</html>