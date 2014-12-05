<div class="grafica-tareas-realizadas">
    <h2>Reporte Tareas Completadas</h2>
    <?php
    $this->widget(
        'chartjs.widgets.ChPie', array(
        'width' => 600,
        'height' => 300,
        'htmlOptions' => array(),
        'drawLabels' => true,
        'datasets' => array(
            array(
                "value" => intval($cantidadTareasFinalizadas[0]['contador']),
                //"value" => 1,
                "color" => "rgba(220,30, 70,1)",
                "label" => "Tareas Finalizadas"
            ),
            array(
                "value" => intval($cantidadTareasPendientes[0]['contador']),
                //"value" => 6,
                "color" => "rgba(66,66,66,1)",
                "label" => "Tareas Pendientes"
            )
        ),
        'options' => array()
            )
    );
    ?>
    <span>
        <?php
        echo "Finalizadas: " . $cantidadTareasFinalizadas[0]['contador'] . "\nPendientes: " . $cantidadTareasPendientes[0]['contador'];
        ?>
    </span>
    
    <br />
    <table>
        <tr>
            <th class="titulo">Finalizadas</th>
        </tr>        
        <?php
        foreach ($tareasFinalizadas as $finalizada) {
            ?>
            <tr>
                <td>
                    <?php
                    $fecha = substr($finalizada['fecha_inicio'],0,10);
                    echo CHtml::link($finalizada['nombre_tarea'], Yii::app()->createUrl("tarea/vistaDiaria?fecha=".$fecha));                    
                }
                ?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <th class="titulo">Pendientes</th>
        </tr>
        <?php
        foreach ($tareasPendientes as $pendiente) {
            ?>
            <tr>
                <td>
                    <?php
                    $fecha = substr($pendiente['fecha_inicio'],0,10);
                    echo CHtml::link($pendiente['nombre_tarea'], Yii::app()->createUrl("tarea/vistaDiaria?fecha=".$fecha));                    
                }
                ?>
            </td>
    </table>   
</div>
<?php echo CHtml::link("Menu Graficas", Yii::app()->createUrl("reportes")); ?>