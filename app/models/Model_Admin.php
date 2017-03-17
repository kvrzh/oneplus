<?php

/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.03.2017
 * Time: 15:32
 */
class Model_Admin extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_admin($email, $password)
    {
        $query = $this->db->prepare('SELECT id FROM admin WHERE email = :email and password = :password');
        $query->execute(array('email' => $email, 'password' => $password));
        if ($query->fetch()['id'] > 0) {
            return true;
        }
        return false;
    }

    public function get_news()
    {
        $query = $this->db->query('SELECT * FROM news');
        return $query->fetchAll();
    }

    public function add_news($text, $more, $date, $image)
    {
        $query = $this->db->prepare("INSERT INTO news (more, Text, date, image) VALUES (:more, :text, :date, :image)");
        $query->bindParam(':text', $text);
        $query->bindParam(':date', $date);
        $query->bindParam(':image', $image);
        $query->bindParam(':more', $more);
        if ($query->execute() === true) {
            echo 'Новость успешно добавлена';
        } else {
            echo 'Ошибка добавления';
        }
    }

    public function update_news($id, $array)
    {
        $sql = "UPDATE news SET ";
        foreach ($array as $k => $v) {
            $sql .= $k . ' = :' . $k . ', ';
        }
        $sql = substr($sql, 0, strlen($sql) - 2);
        $sql .= " WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':Text', $array['Text']);
        $query->bindParam(':Date', $array['Date']);
        $query->bindParam(':image', $array['image']);
        $query->bindParam(':more', $array['more']);
        $query->bindParam(':id', $id);
        if ($query->execute()) {
            echo 'Запись успешно обновлена';
        } else {
            echo 'Ошибка обновления';
        }
    }

    public function delete_news($id)
    {
        $this->db->beginTransaction();
        $query = $this->db->prepare('DELETE FROM news WHERE id =  :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query1 = $this->db->prepare('DELETE FROM news_commentaries WHERE commentaries_id = :id');
        $query1->bindParam(':id', $id, PDO::PARAM_INT);
        if ($query->execute() && $query1->execute()) {
            echo 'Пользователь с id ' . $id . ' успешно удален';
        } else {
            echo 'Ошибка';
        }
        $this->db->commit();
    }

    public function get_news_by_id($id)
    {
        $query = $this->db->prepare('SELECT * FROM news WHERE id = :id');
        $query->execute(array('id' => $id));
        return $query->fetch();
    }

    public function get_commentaries($id)
    {
        $query = $this->db->prepare('SELECT * FROM commentaries c INNER JOIN news_commentaries nc ON  c.id = nc.commentaries_id INNER JOIN news n ON news_id = n.id WHERE news_id = :id');
        $query->execute(array('id' => $id));
        $result = $query->fetchAll();
        return $result;
    }

    public function deletecomment($id)
    {
        $this->db->beginTransaction();
        $query = $this->db->prepare('DELETE FROM commentaries WHERE id =  :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query1 = $this->db->prepare('DELETE FROM news_commentaries WHERE commentaries_id = :id');
        $query1->bindParam(':id', $id, PDO::PARAM_INT);
        if ($query->execute() && $query1->execute()) {
            echo 'Пользователь с id ' . $id . ' успешно удален';
        } else {
            echo 'Ошибка';
        }
        $this->db->commit();
    }
}