<h2>TABELEAU DE BORD</h2>
<table>
    <thead> <!-- l'en-tête -->

        <div style="margin-bottom: 15px;">
            <a href="?action=showMonitoring" class="submit">↺ Réinitialiser le tri</a>
        </div>

        <tr>
            <th>
                <a href="?action=showMonitoring&sort=title&order=<?= ($sort == 'title' && $order == 'asc') ? 'desc' : 'asc' ?>">
                    Titre <?= ($sort == 'title') ? (($order == 'asc') ? '↑' : '↓') : '↕' ?>
                </a>
            </th>
            <th>
                <a href="?action=showMonitoring&sort=views&order=<?= ($sort == 'views' && $order == 'asc') ? 'desc' : 'asc' ?>">
                    Vues <?= ($sort == 'views') ? (($order == 'asc') ? '↑' : '↓') : '↕' ?>
                </a>
            </th>

            <th>
                <a href="?action=showMonitoring&sort=commentCount&order=<?= ($sort == 'commentCount' && $order == 'asc') ? 'desc' : 'asc' ?>">
                    Commentaires <?= ($sort == 'commentCount') ? (($order == 'asc') ? '↑' : '↓') : '↕' ?>
                </a>
            </th>

            <th>
                <a href="?action=showMonitoring&sort=dateCreation&order=<?= ($sort == 'dateCreation' && $order == 'asc') ? 'desc' : 'asc' ?>">
                    Date <?= ($sort == 'dateCreation') ? (($order == 'asc') ? '↑' : '↓') : '↕' ?>
                </a>
            </th>
        </tr>
    </thead>

    <tbody>
        <?php $i = 0; ?>
        <?php foreach ($articles as $article): ?>
            <tr class="tr" style="background-color: <?= ($i % 2 == 0) ? '#f9f9f9' : '#EDE1BB' ?>">
                <td><?= htmlspecialchars($article['title']) ?></td>
                <td><?= $article['views'] ?></td>
                <td><?= $article['commentCount'] ?></td>
                <td><?= date("d/m/Y", strtotime($article['dateCreation'])) ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>