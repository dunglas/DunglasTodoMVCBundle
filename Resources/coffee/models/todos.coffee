# This file is part of the DunglasTodoMVCBundle package.
#
# (c) Kévin Dunglas <dunglas@gmail.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.

define [
  'chaplin',
  'models/base/collection',
  'models/todo'
], (Chaplin, Collection, Todo) ->
  'use strict'
  
  class Todos extends Collection
    model: Todo
    url: window.Api.get_todos
    
    initialize: () ->
      super
      this.reset(window.Data.todos)
    
    allAreCompleted: ->
      @getCompleted().length is @length

    getCompleted: ->
      @where completed: yes

    getActive: ->
      @where completed: no