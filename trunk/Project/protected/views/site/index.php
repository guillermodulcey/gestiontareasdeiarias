<?php
/* @var $this SiteController */
?>

<div id="contentIzq">
    <?php
    $form = '../categoria/_form';
    $modelCategoria = new Categoria;
    $modelCategoria->CORREO = Yii::app()->user->getId();
    $this->renderPartial($form, array('model' => $modelCategoria));
    ?> 
    <div id="itemsCategoria">
        <?php
        $dataProvider = new CActiveDataProvider('Categoria', array(
            'criteria' => array(
                'condition' => 'CORREO=\'' . $modelCategoria->CORREO . '\''),
            'pagination' => false
        ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '../categoria/_view',
            'enablePagination' => false,
            'id' => 'categoria-list-view'
        ));
        ?>  
    </div>
</div>

<div class="fluida">
    <div id="contentDer">
        <div id="cargando-principal"></div>
        <div id="error-principal"></div>

        <div id="actividad_progress_bar" class="progreso">
            Progreso: 
            <div id="progressbar" style="width:91%; float: right; margin-top: 5px;">
                <?php
                $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                    'value' => 1000,
                    'htmlOptions' => array(
                        'id' => 'progress-bar-real'
                    )
                ));
                ?>
            </div>
        </div>

        <div class="menu">
            <ul id="menu">
                <li class="lista">
                    <?php
                    $text = "Hoy";
                    $url = Yii::app()->createUrl("tarea/vistaDiaria");
                    $htmlOptions = array();
                    echo CHtml::link($text, $url, $htmlOptions);
                    ?>
                </li>
                <li class="calendario">
                    <?php
                    $text = "Calendario";
                    $url = Yii::app()->urlManager->createUrl("calendario");
                    $htmlOptions = array();
                    echo CHtml::link($text, $url, $htmlOptions);
                    ?>
                </li>
                <li class="reportes">
                    <a href="#">Reportes</a>
                </li>
            </ul> 
        </div>

        <div id="content-princ-izq">
            <?php
            if (isset($vistaIzquierda)) {
                echo $vistaIzquierda;
            }
            ?>
        </div>
        <div id = "content-princ-der">
            <?php
            if (isset($vistaDerecha)) {
                echo $vistaDerecha;
            }
            ?>
        </div>
    </div>
</div>