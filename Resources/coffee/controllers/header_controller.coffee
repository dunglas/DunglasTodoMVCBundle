define [
  'chaplin'
  'views/header_view'
], (Chaplin, HeaderView) ->
  'use strict'
  
  class HeaderController extends Chaplin.Controller
    initialize: (params) ->
      super
      @view = new HeaderView collection: Chaplin.mediator.todos
