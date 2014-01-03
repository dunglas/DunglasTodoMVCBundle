# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'chaplin'
  'views/todos_view'
], (Chaplin, TodosView) ->
  'use strict'
  
  class TodosController extends Chaplin.Controller

    initialize: ->
      @view = new TodosView collection: Chaplin.mediator.todos
