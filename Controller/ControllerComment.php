<?php


require __DIR__."/../Model/DataComment.php";

class ControllerComment
{
    public function getAllComment(){
        $length = getLengthComment();
        return getCommnets(0, $length);
    }

    public function getComments($a, $b){
        return getCommnets($a, $b);
    }

    public function addComment($comment){
        addCommnet($comment->getEMAIL(), $comment->getIDPHIM(), $comment->getTHOIGIAN(), $comment->getNOIDUNG());
    }

    public function getLengthCommenstPhim($id){
        return getLengthCommentsPhim($id);
    }

    public function getCommentsPhim($idphim, $a, $b){
        return getCommentsPhim($idphim, $a, $b);
    }
}