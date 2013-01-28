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