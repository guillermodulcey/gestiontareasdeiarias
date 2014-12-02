<?php
/* @var $this TareaController */
/* @var $data Tarea */
/* @var $form CActiveForm */

$idTarea = $data->id_tarea;
$nombreTarea = $data->nombre_tarea;
?>

<div id="tarea-view-pool-<?php echo $idTarea; ?>" class="view" draggable="true" ondragstart="drag(event)">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => "tarea-mostrar-form-{$idTarea}",
        'enableAjaxValidation' => false,
        'action' => Yii::app()->homeUrl,
        'htmlOptions' => array(
            'class' => 'form-tarea'
        )
    ));

    echo $form->hiddenField($data, 'id_tarea');
    echo $form->hiddenField($data, 'fecha_inicio');
    echo CHtml::hiddenField('FECHA_HOY', Calendario::getFechaFormato());

    echo CHtml::tag('p', array(
        'id' => "p-tarea-nombre-{$idTarea}",
        'onclick' => 'return tareaMostrarPoolAjax(this)',
            ), $nombreTarea);


    echo CHtml::link("Menú Tarea", "#",  array(
        'class' => "menu-tarea",
        'onclick' => 'return tareaMenu(this)'
    ));
    ?>
    <ul class="tarea">
        <li class="eliminar">
            <?php
            echo CHtml::link("Eliminar", "#", array(
                'id' => 'lnk-tarea-eliminar-' . $idTarea,
                'onclick' => 'return tareaEliminarPoolModal(this)'
            ));
            ?>
        </li>
    </ul>

    <div class="clearFix"></div>
    <br />
    <?php
    $this->endWidget();
    ?>
</div>