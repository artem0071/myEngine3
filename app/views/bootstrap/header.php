<!DOCTYPE html>
<html>
<head>

    <title><?= $title ?></title>

    <? foreach ($myCSS as $CSS) : ?>

        <link href="<?= CSS.$CSS.'.css'?>" rel="stylesheet">

    <? endforeach; ?>

    <? foreach ($myJS as $js) : ?>

        <script src="<?= JS.$js.'.js' ?>"></script>

    <? endforeach; ?>

</head>
<body>