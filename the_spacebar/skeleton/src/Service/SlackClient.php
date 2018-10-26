<?php
/**
 * Created by PhpStorm.
 * User: Monica
 * Date: 10/26/2018
 * Time: 5:04 PM
 */

namespace App\Service;


use App\Helper\LoggerTrait;
use Nexy\Slack\Client;


class SlackClient
{

    use LoggerTrait;
    private $slack;



    public function __construct(Client $slack)
    {

        $this->slack = $slack;
    }



    public function sendMessage(string $from, string $message)
    {
        $this->logInfo('Beaming a message to Slack!', [
            'message' => $message
        ]);

        $slackMessage = $this->slack->createMessage()
            ->from($from)
            ->withIcon(':ghost:')
            ->setText($message);
        $this->slack->sendMessage($slackMessage);
    }
}