<?php

$errors = array();
if (isset($_POST['action']) && $_POST['action'] == 'addComment') {

    if (!isset($_POST['email']) || !$_POST['email']) {
        $errors['email'] = 'Вы не заполнили поле Email!';
    }

    $comment = array(
        'name' => isset($_POST['name']) ? $_POST['name'] : 'unknown',
        'email' => isset($_POST['email']) ? $_POST['email'] : 'email@your.email',
        'message' => isset($_POST['message']) ? $_POST['message'] : 'Your message'
    );
}

if (isset($comment)) { ?>
    <div>
        <b><?php echo $comment['name']?> (<?php echo $comment['email'] ?>)</b>:
        <p><?php echo $comment['message'] ?></p>
    </div>
<?php } ?>


<form method="POST">
    <input type="hidden" name="action" value="addComment">

    <div style="clear: both;"></div>
    <label for="name">Имя:</label>
    <input type="text" name="name" id="name">

    <div style="clear: both;"></div>
    <label for="email">Емайл:</label>
    <input type="text" name="email" id="email">
    <?php if(isset($errors['email'])) { ?>
        <p><?php echo $errors['email'] ?></p>
    <?php } ?>

    <div style="clear: both;"></div>
    <label for="message">Сообщение:</label>
    <textarea name="message" id="message"></textarea>

    <input type="submit" value="Отправить">
</form>
