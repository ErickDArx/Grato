<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Inicio
Breadcrumbs::for('Principal', function ($trail) {
    $trail->push('Inicio', route('Principal'));
});

Breadcrumbs::for('Perfil', function ($trail) {
    $trail->push('Perfil', route('Perfil'));
});

