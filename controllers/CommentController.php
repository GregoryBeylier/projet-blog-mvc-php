<?php

class CommentController
{
    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment(): void
    {
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }

    // Vérifie que l'utilisateur est connecté. Si ce n'est pas le cas, on le redirige vers la page de connexion.
    private function checkIfUserIsConnected(): void
    {
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
        }
    }

    public function deleteComment()
    {
        // Vérifie que l'utilisateur est admin
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
            return;
        }

        $this->checkIfUserIsConnected();

        // Récupération de l'id du commentaire à supprimer.
        $id = Utils::request("id");

        // On vérifie que le commentaire existe.
        $commentManager = new CommentManager();
        $comment = $commentManager->getCommentById($id);
        if (!$comment) {
            throw new Exception("Le commentaire demandé n'existe pas.");
        }

        // On supprime le commentaire.
        $result = $commentManager->deleteComment($id);

        // On vérifie que la suppression a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de la suppression du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $comment->getIdArticle()]);
    }
}
