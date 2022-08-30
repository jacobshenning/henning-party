<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

class SocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $server = new Server('henning-party.test', 6001);

        $server->on('Start', function (Server $server) {
            echo "Server started at http://{$server->host}:{$server->port}\n";
        });

        $server->on('Message', function (Server $server, Frame $frame) {
            echo "received message: {$frame->data}\n";
            $server->push($frame->fd, json_encode(['message' => 'hello']));
        });

        $server->on('Close', function (Server $server, int $fd, int $reactorId) {
            echo "Close: {$fd}\n";
        });

        $server->start();

        return 0;
    }
}
