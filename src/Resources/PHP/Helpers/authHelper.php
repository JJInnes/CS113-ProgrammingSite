<?php
    function createRawToken($id, $name, $issued){
        $hashingKey = "1234";
        return json_encode(["id"=>$id, "name"=>$name, "issued"=>$issued, "hash"=>hash("sha256", $id.$name.$issued.$hashingKey)]);
    }

    function encodeToken($rawToken){
        return base64_encode(serialize($rawToken));
    }

    function decodeToken($encodedToken){
        return unserialize(base64_decode($encodedToken));
    }

    function generateToken($id, $name, $issued){
        return encodeToken(createRawToken($id, $name, $issued));
    }

    function verifyTokenUntampered($token){
        $hashingKey = "1234";
        $token = json_decode(decodeToken($token), true);
        return $token["hash"] == hash("sha256", $token["id"].$token["name"].$token["issued"].$hashingKey);
    }
?>