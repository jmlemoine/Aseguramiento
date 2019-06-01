   <?php

    Yii::$app->layout='homepage';
    $this->params['breadcrumbs'][] = $this->title='Inicio - MESCyT';

   $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/themes/agency/dist');
   ?>
   
   <?= $this->render('_about.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_service.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_portfolio.php',['directoryAsset'=>$directoryAsset ]) ?>
    
    