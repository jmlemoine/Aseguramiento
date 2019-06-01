<?php
$name = Yii::$app->user->identity->username;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->request->baseUrl . '/perfil/' . Yii::$app->user->identity->Foto ?>" class="img-circle" />
            </div>
            <div class="pull-left info">
                <p><?php echo $name ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu administrativo', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Tus salas', 'visible' => Yii::$app->user->identity->tipo_user_id == 2, 'icon' => 'cube', 'url' => ['/sala'],],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Usuarios', 'visible' => Yii::$app->user->identity->tipo_user_id == 1,
                                'icon' => 'users',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Registrar', 'icon' => 'sign-in', 'url' => ['/admin/user/signup'],],
                                    ['label' => 'Participante', 'icon' => 'user', 'url' => ['/tipo-user/view?id=4'],],
                                    ['label' => 'Presentador', 'icon' => 'user', 'url' => ['/tipo-user/view?id=3'],],
                                    ['label' => 'Moderador', 'icon' => 'user', 'url' => ['/tipo-user/view?id=2'],],
                                    ['label' => 'Usuarios', 'icon' => 'user', 'url' => ['/user'],],
                                ],
                            ],

                            ['label' => 'Programa', 'visible' => Yii::$app->user->identity->tipo_user_id == 1,
                                        'icon' => 'building',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Congreso', 'icon' => 'building-o', 'url' => ['/congreso'],],
                                            ['label' => 'Salas', 'icon' => 'cube', 'url' => ['/sala'],],
                                            ['label' => 'Presentaciones', 'icon' => 'comments-o', 'url' => ['/presentacion'],],
                                            ['label' => 'Afiliaciones', 'icon' => 'credit-card', 'url' => ['/afiliacion'],],
                                        ],
                                    ],

                            ['label' => 'Estudios', 'visible' => Yii::$app->user->identity->tipo_user_id == 1,
                                        'icon' => 'institution',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Area de especializacion', 'icon' => 'book', 'url' => ['/area-especializacion'],],
                                            ['label' => 'Grado academico', 'icon' => 'book', 'url' => ['/grado-academico'],],
                                        ],
                                    ],
                                    
                            ['label' => 'Ubicacion', 'visible' => Yii::$app->user->identity->tipo_user_id == 1,
                                    'icon' => 'globe',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Pais', 'icon' => 'circle-o', 'url' => ['/pais'],],
                                        ['label' => 'Provincias', 'icon' => 'circle-o', 'url' => ['/provincia'],],
                                    ],
                                ],

                                ['label' => 'Iniciar presentaciones', 'icon' => 'comments-o', 'url' => ['/presentacion/verpres'],],
                                ['label' => 'Ver Retroalimentacion', 'icon' => 'comments-o', 'url' => ['/presentacion-user'],],
                                
                    /*
                    ['label' => 'Administracion',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            
                        ],
                    ],
                    */
                ],
            ]
        ) ?>

    </section>

</aside>
