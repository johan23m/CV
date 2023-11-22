<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SocialMediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administración de Redes Sociales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-media-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Red Social', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cargar Redes Sociales', ['load'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'icon',
            'link',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>