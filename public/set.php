<?php
// Load composer
require __DIR__ . '/../vendor/autoload.php';

$bot_api_key  = '639457169:AAHhal3bTQJeVZrsFX4eFUurnjPLRieYLpo';
$bot_username = 'hellotcdBot';
$hook_url     = 'https://your-domain/path/to/hook.php';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);
    $commands = $telegram->getLastUpdateId();
    var_dump($commands);exit;
    //\Longman\TelegramBot\Conversation::update();
    $result = \Longman\TelegramBot\Request::getUpdates();
    var_dump($result);exit;

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}
