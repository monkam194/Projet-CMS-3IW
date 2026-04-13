<?php

namespace Models;

use Core\Database;

class PageModel {

    private static ?PageModel $instance = null;
    private $db;

    private function __construct() {
        $this->db = Database::getInstance();
    }

    public static function getInstance(): PageModel {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getAllPages() {
        $stmt = $this->db->prepare("SELECT * FROM pages ORDER BY date DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createPage($title, $slug, $content, $authorName, $status, $date) {
        $baseSlug = $slug;
        $i = 1;

        $stmt = $this->db->prepare("SELECT COUNT(*) FROM pages WHERE slug = ?");

        while (true) {
            $stmt->execute([$slug]);
            if ((int)$stmt->fetchColumn() === 0) {
                break;
            }
            $slug = $baseSlug . '-' . $i++;
        }

        $stmt = $this->db->prepare(
            "INSERT INTO pages (title, slug, content, status, author, date) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$title, $slug, $content, $status, $authorName, $date]);
    }

    public function getPageBySlug($slug) {
        $stmt = $this->db->prepare("SELECT * FROM pages WHERE slug = ?");
        $stmt->execute([$slug]);
        $page = $stmt->fetch();

        if ($page && $page['status'] === "draft" && (!isset($_SESSION['user']) || $_SESSION['user']['role'] === 'USER')) {
            header("Location: /");
            exit;
        }

        return $page;
    }

    public function deletePageById($id) {
        $stmt = $this->db->prepare("DELETE FROM pages WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function updatePageBySlug($title, $content, $formerSlug, $newSlug, $status, $authorName) {
        $stmt = $this->db->prepare(
            "UPDATE pages SET title = ?, slug = ?, content = ?, status = ?, author = ? WHERE slug = ?"
        );
        $stmt->execute([$title, $newSlug, $content, $status, $authorName, $formerSlug]);
    }

    public function getAllPublishedPages() {
        $stmt = $this->db->prepare("SELECT * FROM pages WHERE status = ?");
        $stmt->execute(["published"]);
        return $stmt->fetchAll();
    }
}