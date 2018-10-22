<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/iblocks'], function (Router $router) {
    $router->bind('block', function ($id) {
        return app('Modules\Iblocks\Repositories\BlockRepository')->find($id);
    });
    $router->get('blocks', [
        'as' => 'admin.iblocks.block.index',
        'uses' => 'BlockController@index',
        'middleware' => 'can:iblocks.blocks.index'
    ]);
    $router->get('blocks/create', [
        'as' => 'admin.iblocks.block.create',
        'uses' => 'BlockController@create',
        'middleware' => 'can:iblocks.blocks.create'
    ]);
    $router->post('blocks', [
        'as' => 'admin.iblocks.block.store',
        'uses' => 'BlockController@store',
        'middleware' => 'can:iblocks.blocks.create'
    ]);
    $router->get('blocks/{block}/edit', [
        'as' => 'admin.iblocks.block.edit',
        'uses' => 'BlockController@edit',
        'middleware' => 'can:iblocks.blocks.edit'
    ]);
    $router->put('blocks/{block}', [
        'as' => 'admin.iblocks.block.update',
        'uses' => 'BlockController@update',
        'middleware' => 'can:iblocks.blocks.edit'
    ]);
    $router->delete('blocks/{block}', [
        'as' => 'admin.iblocks.block.destroy',
        'uses' => 'BlockController@destroy',
        'middleware' => 'can:iblocks.blocks.destroy'
    ]);
// append

});
