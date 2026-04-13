<?php

namespace Controllers;

use Core\Controller;
use helpers\Auth;
use helpers\StringUtils;
use Models\PageModel;

class AdminPageController extends Controller {

    public function listPages() {
        Auth::checkRole(["ADMIN", "EDITOR"]);
        $pageModel = PageModel::getInstance();
        $pages = $pageModel->getAllPages();
        $this->render('admin/pages', ['pages' => $pages, 'title' => 'Gestion des pages admin']);
    }

    public function viewPage($slug) {
        $slug = urldecode($slug);
        $pageModel = PageModel::getInstance();
        $page = $pageModel->getPageBySlug($slug);

        if (!$page) {
            echo "Page introuvable";
            return;
        }

        $this->render('page/page', ['page' => $page, 'title' => $page['title']]);
    }

    public function viewNewPage() {
        Auth::checkRole(["ADMIN", "EDITOR"]);
        $this->render('admin/newPage', ['title' => 'Nouvelle page']);
    }

    public function viewPageToUpdate() {
        Auth::checkRole(["ADMIN", "EDITOR"]);

        if (!isset($_GET['slug'])) {
            echo "Page introuvable";
            return;
        }

        $slug = $_GET['slug'];
        $pageModel = PageModel::getInstance();
        $page = $pageModel->getPageBySlug($slug);

        $this->render('admin/updatePage', ['page' => $page, 'title' => 'Mettre à jour la page']);
    }

    public function createNewPage() {
        Auth::checkRole(["ADMIN", "EDITOR"]);

        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $authorName = $_POST['author'] ?? '';
        $status = $_POST['status'] ?? 'draft';

        if (!$title || !$content) {
            echo "Merci de remplir l'ensemble des champs";
            return;
        }

        $slug = StringUtils::slugify($title);
        $date = date("Y-m-d H:i:s");

        $pageModel = PageModel::getInstance();
        $pageModel->createPage($title, $slug, $content, $authorName, $status, $date);

        header("Location: /admin/pages");
        exit;
    }

    public function deletePage() {
        Auth::checkRole(["ADMIN", "EDITOR"]);

        if (!isset($_GET['id'])) {
            echo "Page introuvable";
            return;
        }

        $id = $_GET['id'];
        $pageModel = PageModel::getInstance();
        $pageModel->deletePageById($id);

        header("Location: /admin/pages");
        exit;
    }

    public function updatePage() {
        Auth::checkRole(["ADMIN", "EDITOR"]);

        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $authorName = $_POST['author'] ?? '';
        $status = $_POST['status'] ?? 'draft';

        if (!$title || !$content) {
            echo "Merci de remplir l'ensemble des champs";
            return;
        }

        if (!isset($_GET['slug'])) {
            echo "Slug manquant";
            return;
        }

        $newSlug = StringUtils::slugify($title);

        $pageModel = PageModel::getInstance();
        $pageModel->updatePageBySlug($title, $content, $_GET['slug'], $newSlug, $status, $authorName);

        header("Location: /admin/update-page-view?slug=" . urlencode($newSlug));
        exit;
    }
}