define [
  'chaplin',
  'models/base/model'
], (Chaplin, Model) ->
  'use strict'

  class Todo extends Model
    defaults:
      title: ''
      completed: no

    toggle: ->
      @set completed: not @get('completed')

    isVisible: ->
      isCompleted = @get('completed')