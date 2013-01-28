define [
  'chaplin'
], (Chaplin) ->
  'use strict'
  
  class IndexController extends Chaplin.Controller
    title: 'Todo list'
    
    test: (options) ->
      console.log 'you are here'

    list: (options) ->
      @publishEvent 'todos:filter', options.filterer?.trim() ? 'all'