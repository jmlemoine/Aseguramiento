<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Presentaciones';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->layout='page_header';
//$model =  new \backend\admin\models\form\Signup(); 
use backend\models\PresentacionUser;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
?>

<div class="section ">
    <div class="section_wrapper clearfix">

        <div class="column one column_blog">
		<div id="presentacion_ver">
            <div class="blog_wrapper isotope_wrapper">
                  <!--                 -->
                  <?php 
                        
                        foreach ($dataProvider->getModels() as $presentacion):?> 

                           <div class="post-item isotope-item clearfix author-lencarnacion post-1735 post type-post status-publish format-standard has-post-thumbnail hentry category-noticias">
                               <div class="post-desc-wrapper">
                                   <div class="post-desc">
                                       <div class="post-head"></div>
                                            <h1 ><a href="/mescyt/frontend/web/index.php/view?id=<?php echo $presentacion->presentacion->id;?> "><strong><?php echo $presentacion->presentacion->Titulo;?></strong></a></h1>
                                         <b>Actualizar Comentario/Sugerencia</b>
                                          <input rows="50" cols="20"
                                           type = "textarea" id="com<?= $presentacion->presentacion_id; ?>"/> 
                                          <a onclick="guardar_coment(<?= $presentacion->presentacion_id; ?>,$('#com<?= $presentacion->presentacion_id; ?>').val())" 
                                          href= "#"
                                          > Enviar <a/>
                                          <br>
                                          <b>Comentario realizado</b>
                                          <?=$presentacion->comentario;?>  
                                       <div class="post-footer">
									   <?php
									   // $presentacion_user = PresentacionUser::findAll(['user_id'=>Yii::$app->user->identity->id,'presentacion_id'=>$presentacion->presentacion->id]);
										
									   ?>
                                       </div>
                                   </div>
                               </div>
                               </hr>
                           </div>
                        
                    <?php endforeach;?>
               
                <!--                 -->

            </div>
			</div>
        </div>

    </div>
</div>
<script type="text/javascript">
function guardar_coment(id,coment){
   // alert("here");
var url="/mescyt/frontend/web/index.php/guardarretro?id="+id+"&coment="+coment;
window.location.href=url;
//";
}
</script>