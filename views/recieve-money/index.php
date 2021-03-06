<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\alert\Alert;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->session->hasFlash('su')) {
    echo Alert::widget([
        'type' => Alert::TYPE_SUCCESS,
        'title' => Yii::$app->session->getFlash('action'),
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => Yii::$app->session->getFlash('su'),
        'showSeparator' => false,
        'delay' => 2000
    ]);
}

?>
<?php Pjax::begin() ?>
<div class="payment-index">
    <div class="row">
        <div class="col-md-8 col-xs-8 col-sm-8 ">
            <div class="line_bottom">
                ລາຍ​ການ​ລາຍ​ຮັບຜ່ານ​ມາ
            </div>
        </div>
        <div class="col-md-4 col-xs-4 col-sm-4">
            <p align='right'>
                <?= Html::a('<span class="fa fa-plus-circle"></span> ປ້ອນ​ລາຍ​ຮັບ', ['create'], ['class' => 'btn ' . Yii::$app->session['bg_buttoon'] . ' btn-sm', 'onclick' => "onclick_loadimg()"]) ?>
            </p>
        </div>
    </div>
    <div class="table-responsive" style="padding-top: 2px;">

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            //    'filterModel' => $searchModel,
            'pager' => [
                'maxButtonCount' => 9, // Set maximum number of page buttons that can be displayed
            ],
            'summary' => '',
            'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'type_recieve_id',
                    'header' => 'ປະ​ເພດ​ລ​າຍ​ຮັບ',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'min-width: 100px;'],
                    'value' => function ($data) {
                    return $data->tyeReceive->name;
                },
                ],
                [
                    'attribute' => 'amount',
                    'header' => 'ຈຳ​ນວນ​ເງີນ',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'min-width: 100px;'],
                    'value' => function ($data) {
                    return number_format($data->amount, 2);
                },
                ],
                [
                    'attribute' => 'date',
                    'header' => 'ວັນ​ທີ່​ຈ່າຍ',
                    'contentOptions' => ['style' => 'min-width: 100px;']
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a(
                                    '<span class="glyphicon glyphicon-edit"></span>', ['recieve-money/update', 'id' => $model->id], [
                                    'class' => 'btn btn-success btn-xs',
                                    'onclick' => "onclick_loadimg()",
                                    ]
                            );
                        },
                            'delete' => function ($url, $model) {
                            return Html::a(
                                    '<span class="glyphicon glyphicon-remove"></span>', $url, [
                                    'title' => 'Delete',
                                    'data-pjax' => '0',
                                    'data-method' => "post",
                                    'data-confirm' => Yii::t('app', 'ທ່ານ​ຕ້ອງ​ການ​ຈະ​ລືບ​ລາຍ​ຮັບແຖວນີ້​ແທ້​ບໍ.?'),
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "onclick_loadimg()",
                                    ]
                            );
                        },
                        ],
                        'contentOptions' => ['align' => 'right', 'style' => 'min-width: 75px'],
                    ],
                ],
            ]);

            ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
