<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Presentaciones';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->layout='page_header';
//$model =  new \backend\admin\models\form\Signup(); 
use backend\models\PresentacionUser;
?>

<div class="section ">
    <div class="section_wrapper clearfix">

        <div class="column one column_blog">
		<div id="presentacion_ver">
            <div class="blog_wrapper isotope_wrapper">
            <?php if($dataProvider->getCount()==0):?>
            <h1 style="color:red">
            No hay nuevas actualizaciones pendientes
            </h1>
            <?php endif;?>
                  <!--                 -->
                  <ul>
                  <?php 
                        
                        foreach ($dataProvider->getModels() as $presentacion):?> 
<li>
Nueva Actualizaci&oacute;n en Presentaci&oacute;n :
<a href="/mescyt/frontend/web/index.php/view?id=<?php echo $presentacion->presentacion->id;?> "><strong><?php echo $presentacion->presentacion->Titulo;?></strong></a>
</li>
<?php /*
                           <div class="post-item isotope-item clearfix author-lencarnacion post-1735 post type-post status-publish format-standard has-post-thumbnail hentry category-noticias">
                               <div class="post-desc-wrapper">
                                   <div class="post-desc">
                                       <div class="post-head"></div>
                                            <h1 ><a href="/mescyt/frontend/web/index.php/view?id=<?php echo $presentacion->presentacion->id;?> "><strong><?php echo $presentacion->presentacion->Titulo;?></strong></a></h1>
                                       <div class="post-footer">
									   <?php
									   // $presentacion_user = PresentacionUser::findAll(['user_id'=>Yii::$app->user->identity->id,'presentacion_id'=>$presentacion->presentacion->id]);
										
									   ?>
                                       </div>
                                   </div>
                               </div>
                           </div>*/?>
                        
                    <?php endforeach;?>
               
                <!--                 -->

            </div>
			</div>
        </div>

    </div>
</div>
