
<?php
    use backend\models\PresentacionUser;
     $events = array();
     //Testing
    
     $userid = Yii::$app->user->identity->id;
    $models = PresentacionUser::find()->where("user_id=".$userid)->all();
    //var_dump($models);die
    foreach($models as $pres){
        $Event = new \yii2fullcalendar\models\Event(); 
       // echo $pres->presentacion_id.'-';
        $Event->id = $pres->presentacion_id;
        $Event->title = $pres->presentacion->Titulo;
        $Event->start =  $pres->presentacion->Fecha_Inicio;//date('Y-m-d\TH:i:s\Z',$pres->presentacion->Fecha_Inicio);
        $events[] = $Event;
    }
    //die();
    //var_dump($events);die();
     /*
     $event->nonstandard = [
       'field1' => 'Something I want to be included in object #1',
       'field2' => 'Something I want to be included in object #2',
     ];
     */
     
   /*
     $Event = new \yii2fullcalendar\models\Event();
     $Event->id = 2;
     $Event->title = 'Testing';
     $Event->start = date('Y-m-d\TH:i:s\Z',strtotime('tomorrow 6am'));
     $events[] = $Event;
     */
?>

<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
    'events'=> $events,
));
?>