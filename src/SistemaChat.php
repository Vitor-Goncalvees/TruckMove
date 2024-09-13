<?php

namespace Api\Websocket;

use Ratchet\ConnectionInterface;
use Ratchet\Websocket\MessageComponentInterface;


class SistemaChat implements MessageComponentInterface
{

    protected $user; 

    public function _construct()
    {
        $this ->user = new \SplObjectStorage;
    }


    public function onOpen(ConnectionInterface $conn)
    {
        $this->user->attach($conn);

        echo "Nova conexão: {$conn -> resourceId} \n\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        foreach($this->user as $user){

            if($from !== $user)
            {
                $user->send($msg);
            }
          
        }

        echo "Usuario {$from->resourceId} enviou uma mensagem \n\n";
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->user->detach($conn);
        echo "Usuario {$conn->resourceId} desconectou \n\n";    
    }
} 

?>