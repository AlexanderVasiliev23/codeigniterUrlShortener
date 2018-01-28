<!-- Begin page content -->
<main role="main" class="container text-center">
    <h1 class="mt-5">Сокращенные ссылки</h1>
</main>

<div class="container-fluid">
    <table class="table" style="margin-top: 3rem">
        <thead>
        <tr>
            <th>Ссылка</th>
            <th>Сокращенная ссылка</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($data as $link) : ?>
            <tr>
                <td><?= $link['full_url']?></td>
                <td><a href="http://shortener.loc/index.php/go/to/<?= $link['short_key']?>" target="_blank">http://shortener.loc/index.php/go/to/<?= $link['short_key']?></a></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</div>
