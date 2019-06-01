   <?php

    Yii::$app->layout='homepage';
    $this->params['breadcrumbs'][] = $this->title='Inicio';

   $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web');
   ?>

   <?= $this->render('_about.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_service.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_portfolio.php',['directoryAsset'=>$directoryAsset ]) ?>
