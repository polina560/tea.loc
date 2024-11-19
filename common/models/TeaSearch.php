<?php

namespace common\models;

use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TeaSearch represents the model behind the search form of `common\models\Tea`.
 */
final class TeaSearch extends Tea
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'id_collection', 'buy_button', 'API_priority'], 'integer'],
            [['title', 'en_title', 'subtitle', 'en_subtitle', 'description', 'en_description', 'background_image', 'image', 'en_image', 'weight', 'en_weight', 'brewing_temperature', 'en_brewing_temperature', 'brewing_time', 'en_brewing_time', 'shop_link', 'en_shop_link'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios(): array
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with a search query applied
     *
     * @throws InvalidConfigException
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Tea::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_collection' => $this->id_collection,
            'buy_button' => $this->buy_button,
            'API_priority' => $this->API_priority,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'en_title', $this->en_title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'en_subtitle', $this->en_subtitle])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'en_description', $this->en_description])
            ->andFilterWhere(['like', 'background_image', $this->background_image])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'en_image', $this->en_image])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'en_weight', $this->en_weight])
            ->andFilterWhere(['like', 'brewing_temperature', $this->brewing_temperature])
            ->andFilterWhere(['like', 'en_brewing_temperature', $this->en_brewing_temperature])
            ->andFilterWhere(['like', 'brewing_time', $this->brewing_time])
            ->andFilterWhere(['like', 'en_brewing_time', $this->en_brewing_time])
            ->andFilterWhere(['like', 'shop_link', $this->shop_link])
            ->andFilterWhere(['like', 'en_shop_link', $this->en_shop_link]);

        return $dataProvider;
    }
}
