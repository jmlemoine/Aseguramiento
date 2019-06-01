<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">


<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page-top" class="index">
<?php $this->beginBody() ?>
<div class="container">
		        <div class="row">       
		          <div class="repdom visible-xs col-xs-12">
		             	<a> <!--href="https://www.presidencia.gov.do/">--><img src="<?=Yii::$app->request->baseUrl ?>/img/escudo-rd.png" alt="Republica Dominicana" class="img-responsive escudoRD" width="100%" height="80%"></a>
		          </div>
		          <!-- MESCyT Logo Section -->
		          <div class="col-xs-12 col-sm-7 logo-header">
		            <a> <!--href="/">--><img src="<?=Yii::$app->request->baseUrl ?>/img/logo.png" alt="MESCyT" class="img-responsive logoImg" width="auto"></a>
		          </div>
		          <!-- /MESCyT Logo Section -->
		          <!-- Search Section >sm-->
		          <div class="col-xs-12 col-sm-5 hidden-xs search-controls">
		            <div class="escudo pull-right">
		              <a> <!--href="https://www.presidencia.gov.do/">--><img src="<?=Yii::$app->request->baseUrl ?>/img/escudo-rd.png" alt="Republica Dominicana" class="image-fluid escudoImg" width="200px"></a>
		            </div>
		          </div>
		          <!-- /Search Section >sm-->
		        </div>
	</div>


<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
