<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecieveMoney;

/**
 * RecieveMoneySearch represents the model behind the search form about `app\models\RecieveMoney`.
 */
class RecieveMoneySearch extends RecieveMoney
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'amount', 'tye_receive_id', 'user_id'], 'integer'],
            [['description', 'date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = RecieveMoney::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'amount' => $this->amount,
            'date' => $this->date,
            'tye_receive_id' => $this->tye_receive_id,
        ]);
        if (Yii::$app->session['user']->user_type == "User") {
            $query->andFilterWhere([ 'user_id' => Yii::$app->session['user']->id]);
        } else {
            $users = User::find()->where(['user_role_id' => Yii::$app->session['user']->user_role_id])->all();
            $user_id = [];
            foreach ($users as $user) {
                $query->orFilterWhere([ 'user_id' => $user->id]);
            }
        }
        $query->andFilterWhere(['like', 'description', $this->description]);
        $query->orderBy('date DESC');
        $query->limit(8);
        return $dataProvider;
    }

}
