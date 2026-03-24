<h2>TABELEAU DE BORD</h2>
<table>
    <thead> <!-- l'en-tête -->
        <tr>
            <th>Titre</th>

            <th>Vues</th>

            <th>Commentaires</th>

            <th>Date de création</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr class="monitoringLine">
                <td class="title"><?= $article->getTitle() ?></td>
                <td class="views"><?= $article->getViews() ?></td>
                <td class="commentCount"><?= $commentCounts[$article->getId()] ?></td>
                <td class="dateCreation"><?= $article->getDateCreation()->format("d/m/Y") ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>