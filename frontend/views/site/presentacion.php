<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Programa';
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
                  <!--                 -->
                  <?php 
                        
                        foreach ($dataProvider->getModels() as $presentacion):?> 

                           <div class="post-item isotope-item clearfix author-lencarnacion post-1735 post type-post status-publish format-standard has-post-thumbnail hentry category-noticias">
                               <div class="date_label">July 4, 2018</div>
                               <div class="image_frame post-photo-wrapper scale-with-grid image">
                                   <div class="image_wrapper">
                                       <a href="#">
                                           <div class="mask"></div><img width="960" height="720" src="<?= '/' . Yii::$app->urlManagerBackend->baseUrl . '/uploads/' . $presentacion->Archivo?>" class="scale-with-grid wp-post-image" alt=""></a>
                                   </div>
                               </div>
                               <div class="post-desc-wrapper">
                                   <div class="post-desc">
                                       <div class="post-head"></div>
                                        <h1 ><a href="/mescyt/frontend/web/index.php/view?id=<?php echo $presentacion->id;?> "><strong><?php echo $presentacion->Titulo;?></strong></a></h1>
                                       <div class="post-excerpt">Area: <?= $presentacion->Area_Tematica?><span class="excerpt-hellip"></span></div>
                                       <div class="post-excerpt">Fecha de Inicio de La presentación: <?=$presentacion->Fecha_Inicio?><span class="excerpt-hellip"></span></div>
                                       <div class="post-excerpt">Fecha Prevista de Finalización de La presentación: <?=$presentacion->Fecha_Final?><span class="excerpt-hellip"></span></div>
                                       <div class="post-footer">

                                            <?php if(!Yii::$app->user->isGuest):?>

                                                <?php
                                                $presentacion_user = PresentacionUser::findAll(['user_id'=>Yii::$app->user->identity->id,'presentacion_id'=>$presentacion->id]);
                                            
                                                ?>
                                                <?php if(count($presentacion_user)>0):?>
                                                <a style="color:red" href="">Inscrito</a>
                                                <a href="#" onclick="un_cribirse(<?= $presentacion->id ?>)" class="post-more">Cancelar inscripci&oacute;n</a>

                                                <?php endif;?>
                                            <div class="button-love"><span class="love-text">Me gusta</span>
                                            <a href="#" class="mfn-love " data-id="1735"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i>
                                            <i class="icon-heart-fa"></i></span><span class="label">0</span></a></div>
                                            <div class="post-links"><i class="icon-doc-text"></i> 
                                            <?php if(count($presentacion_user)==0):?>
                                            <a href="#" onclick="inscribirse(<?= $presentacion->id ?>)" class="post-more">Inscribirse</a>
                                           
                                           
                                            <?php endif;?>
                                            </div>

                                            <?php else:?>
                                            <a href="#" class="mfn-love " data-id="1735"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i>
                                            <i class="icon-heart-fa"></i></span><span class="label">0</span></a></div>
                                            <div class="post-links"><i class="icon-doc-text"></i> 
                                            <a href="#" onclick="log()" class="post-more">Inscribirse</a>
                                                
                                            </div>
                                            
                                            <?php endif;?>
                                        
                                       </div>
                                   </div>
                               </div>
                           </div>
                        
                    <?php endforeach;?>
               
                <!--                 -->

            </div>
			</div>
        </div>

    </div>
</div>
<!--
<div class="col-lg-12 text-center">
=======
<div class="col-lg-12 text-center" style="background-color: #235288; border-color: #235288">

    <br>
    <br>
    <br>
        <br>
        

    <h1 class="section-subheading text-muted" style="color: white; font-family: arial">P R O G R A M A</h1>

    <h1 class="section-subheading text-muted" style="color: white; font-family: arial">La UASD reinaugura siete laboratorios con aportes del MESCyT y la Universidad Española</h1>
    <br>
>>>>>>> 3284a481e4a4d4c7d9dcf664d1ece672d93ea07e


    <p class="col-lg-12 text-left" style="color: white; font-family: arial">Con la presencia de la Ministra de  Educación Superior, Ciencia y Tecnología, doctora Alejandrina Germán, del Rector de  la Universidad Autónoma de Santo Domingo, doctor Iván Grullón Fernández y de otras autoridades de la UASD,   la Facultad de Ciencias Agronómicas y Veterinarias de esa academia dejó reinaugurados siete laboratorios pertenecientes a dicha facul- tad. El decano de Ciencias Agronómicas y Veteri- narias, doctor Modesto Reyes, explicó que los laboratorios son de: Alimentos, Suelo, Control de Leche  y de Biología Molecular.</p>

    <p class="col-lg-12 text-left" style="color: white; font-family: arial">El decano de Ciencias Agronómicas y Veterinarias, doctor Modesto Reyes, explicó que los laboratorios son de: Alimentos, Suelo, Control de Leche  y de Biología Molecular.</p>

    <div class="col-lg-12 text-center">

        <br>
        <br>


        
                
	                   <a href="http://www.mescyt.gob.do/uasd-reinaugura-siete-laboratorios-con-aportes-del-mescyt-y-universidad-espanola/" title="&nbsp;UASD REINAUGURA SIETE LABORATORIOS CON APORTES DEL MESCYT Y UNIVERSIDAD ESPAÑOLA" class="vc_gitem-link vc-zone-link">
                       </a>
                       <img src="http://www.mescyt.gob.do/wp-content/uploads/2018/07/DSC_7463-1024x683.jpg" class="vc_gitem-zone-img" alt="">

                       <br>
        <br>
        <br>
        
                    
			        </div>
                    


   <p class="col-lg-12 text-left" style="color: black">También fueron reinaugurados los laboratorios de Biotecnología, Control Biológico y de Cría de Depredadores.</p>

   <p class="col-lg-12 text-left" style="color: black">Reyes expuso que el equipamiento y reinauguración de  estos laboratorios fue gracias a los aportes realizados por el Ministerio de Educación Superior, Ciencia y Tecnología, a través del Fondo de Ciencia y Te- cnología, conocido por sus siglas FONDOCyT.</p>

   <p class="col-lg-12 text-left" style="color: white; font-family: arial">Con relación a los usos de dichos laboratorios el funcionario de la UASD precisó  que el Laboratorio de Alimentos permitirá que las empresas que procesan alimentos puedan llevar muestras de su producción para ser examinadas y que una vez se realicen los análisis de las mismas certificar la calidad del producto de que se trate.</p>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>



 </div>

       <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> 



<<<<<<< HEAD
</div></div>	</div>
</div>
</div>
-->

