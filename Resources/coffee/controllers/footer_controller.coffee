define [
  'chaplin'
  'views/footer_view'
], (Chaplin, FooterView) ->
  'use strict'
  
  class FooterController extends Chaplin.Controller
    initialize: (params) ->
      super
      @view = new FooterView collection: Chaplin.mediator.todos
