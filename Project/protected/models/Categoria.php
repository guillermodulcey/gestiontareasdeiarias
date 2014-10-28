<?php

/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property integer $ID_CATEGORIA
 * @property string $CORREO
 * @property string $NOMBRE_CATEGORIA
 */
class Categoria extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'categoria';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NOMBRE_CATEGORIA', 'required',
                'message' => 'Este campo no puede estar vacio.'),
            array('NOMBRE_CATEGORIA', 'match',
                'pattern' => '/^[a-zA-Z0-9[:space:]\süÜáéíóúÁÉÍÓÚñÑ]*$/',
                'message' => 'Este campo solo puede contener letras, tildes, números y espacios.'),
            array('CORREO', 'required'),
            array('CORREO, NOMBRE_CATEGORIA', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ID_CATEGORIA, CORREO, NOMBRE_CATEGORIA', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ID_CATEGORIA' => 'Id Categoria',
            'CORREO' => 'Correo',
            'NOMBRE_CATEGORIA' => 'Nombre Categoria'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ID_CATEGORIA', $this->ID_CATEGORIA);
        $criteria->compare('CORREO', $this->CORREO, true);
        $criteria->compare('NOMBRE_CATEGORIA', $this->NOMBRE_CATEGORIA, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Categoria the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function eliminarCategoria() {
        $idCategoria = $this->ID_CATEGORIA;
        $actividades = Actividad::model()->findAll("ID_CATEGORIA={$idCategoria}");
        if ($actividades !== NULL) {
            foreach ($actividades as $actividad) {
                $actividad->eliminarActividad();
            }
        }
        return $this->delete();
    }

}
