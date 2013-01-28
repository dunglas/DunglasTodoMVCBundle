define [
  'chaplin'
  'views/todos_view'
], (Chaplin, TodosView) ->
  'use strict'
  
  class TodosController extends Chaplin.Controller

    initialize: ->
      @view = new TodosView collection: Chaplin.mediator.todos
