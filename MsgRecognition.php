<?php

class MsgRecognition
{
    public function recognition($msgStr)
    {
        $res = [];
        $data = $msgStr;
        if (isset($data)) {
            if (preg_match('/(\D)([0-9]{4,5})([^.,][^р.]\D)/ui', $data, $match)) {
                $res['password'] = $match[2];
            }
            if (preg_match('/41001[0-9]{8,10}/ui', $data, $match)) {
                $res['account'] = $match[0];
            }
            if (preg_match('/([0-9]*[.,]?[0-9]+)(\sр|р)\./ui', $data, $match)) {
                $res['cost'] = $match[1];
            }
        }
        
        return $res;
    }
}