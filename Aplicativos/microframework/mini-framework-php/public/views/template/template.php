<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= (empty($titleHTML) ? TITLE_NAME : $titleHTML) ?></title>
    </head>
    <body>

         <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    </body>
</html>
