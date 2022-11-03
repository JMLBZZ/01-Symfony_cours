<?php

namespace App\EventEntityListener;

use App\Entity\User;
Use Doctrine\Persistence\Event\LifecycleEventArgs;

class UserLoadEventListener{
    private $encryptSecret;

    public function __construct(string $encryptSecret){
        $this->encryptSecret = $encryptSecret;
    }

    public function postLoad(User $user, LifecycleEventArgs $event) {
        // On déclare l'algorithme de cryptage
        $cipher = "aes-256-gcm";
        // On déclare la clé de cryptage
        $key = $this->encryptSecret;
        // On déclare le vecteur d'initialisation
        // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $iv = base64_decode($user->getSecretIV());
        // On mémorise le vecteur d'initialisation
        // $user->setSecretIV(base64_encode($iv));
        // On crypte le nom de l'utilisateur
        if(!is_null($user->getName())){
            $data = base64_decode($user->getName());
            $tag = substr($data, 0, 16);
            $encodedName = substr($data, 16);
            $decodedName = openssl_decrypt($encodedName, $cipher, $key, 0, $iv, $tag);
            $user->setName($decodedName);
        }
    }
}