<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 15.03.2017
 * Time: 23:42
 */
class Model_News extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get_one($id)
    {
        $query = $this->db->prepare('SELECT * FROM news WHERE id = :id');
        $query->execute(array('id' => $id));
        return $query->fetch();
    }

    /**
     * @param $id
     * @return array
     */
    public function get_commentaries($id)
    {

        $query = $this->db->prepare('SELECT * FROM commentaries c INNER JOIN news_commentaries nc ON  c.id = nc.commentaries_id INNER JOIN news n ON news_id = n.id WHERE news_id = :id');
        $query->execute(array('id' => $id));
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * @param $text
     * @param $date
     * @param $news_id
     * @return bool
     */
    public function new_comment($text, $date, $news_id)
    {
        $this->db->beginTransaction();
        $query = $this->db->prepare("INSERT INTO commentaries (text, date) VALUES (:text, :date)");
        $query->bindParam(':text', $text);
        $query->bindParam(':date', $date);
        $query->execute();
        $commentaries_id = $this->db->lastInsertId();
        $query1 = $this->db->prepare('INSERT INTO news_commentaries (news_id, commentaries_id) VALUES (:news_id, :commentaries_id)');
        $query1->bindParam(':news_id', $news_id);
        $query1->bindParam(':commentaries_id', $commentaries_id);
        $query1->execute();
        return $this->db->commit();
    }
}