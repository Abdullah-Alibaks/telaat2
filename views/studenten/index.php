<?php

use app\models\Studenten;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StudentenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Overzicht studenten die te laat waren';
$this->params['breadcrumbs'][] = $this->title;
//dd($hoogste)
?>

    
</body>
<div class="studenten-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            //'id',
            'name',
            'klas',
            [ 
                'label' => 'Minuten te laat',
                'attribute' => 'minuten',
                'contentOptions' => ['style' => 'color:red; font-weight:bold;'],
            ],
            
            'reden',
            [

                'class' => 'yii\grid\ActionColumn',
             'template' => '{delete} {update}',   
             'buttons' => [
                 'delete' => function($url, $model) {
                      return Html::a('<button class="btn btn-danger">Verwijder<i class="glyphicon glyphicon-trash"></i></button>', $url, 
                             ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' =>'POST']
                          );
                    },
                'update' => function(){
                    return html::a('<button class="btn btn-primary">Wijzig</button>');
                },
                'urlCreator' => function($action, $model, $key, $index) {
                      if ($action == 'delete') {
                          return Html::a('Action', $url);
                      }
                    } 
             ]
            ],
        ],
    ]); ?>
    <?//Abdullah
    

        //hieronder de button voor een nieuwe telaat komer
        //en daaronder de tabel om de statistieken te weergeven 
        
        ?>
     <p>
        <?= Html::a('Weer eentje telaat!', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">
        <thead>
            <tr><th>Statistieken</th><th></th></tr>
        </thead>
        <tbody>

            <tr><td>Hoogste aantal minuten te laat</td><td><?php echo $hoogste; ?></td></tr>
            <tr><td>Gemiddeld aantal minuten</td><td><?php echo $gemiddelde; ?></td></tr>
            <tr><td>Totaal aantal minuten</td><td><?php echo $totaal; ?></td></tr>
            
        </tbody>
    </table>


</div>
