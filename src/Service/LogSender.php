<?php


namespace Moka\ProcessingSync\Service;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogSender
{
    public static function sendLogInfo($channel, $message, $additional = [])
    {
        $user = null;

        if (Auth::check()) {
            $user = Auth::user();
        }

        $resultMessage = empty($user) ? '' : '[ User ID - ' . $user->id . ' ] ';
        $resultMessage .= empty(url()->current()) ? '' : '[ ' . url()->current() . ' ] ';
        $resultMessage .= $message;

        foreach (is_array($channel) ? $channel : [$channel] as $channelName) {
            Log::channel($channelName)->info($resultMessage, is_array($additional)
                ? $additional
                : [$additional]);
        }
    }
}
