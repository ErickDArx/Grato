<?php

namespace App\Charts;


use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class Principal extends Chart
{

    public function __construct()
    {
        // Instanciamos el objeto gráfico 
        $chart = new SampleChart();

        // Añadimos las etiquetas del eje X
        $chart->labels([DB::table('t_producto')->count()]);
        1
2
$chart->dataset('My dataset 1', 'line', [1, 2, 3, 4]);
$chart->dataset('My dataset 2', 'line', collect([3, 4, 5, 6]));
        return view('Principal', compact('chart'));
    }
}
